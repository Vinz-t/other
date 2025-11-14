<?php

    session_start();
    require 'connection.php';
    require 'fetching.php';
    require 'deleting.php';

    $connObj = new Connection();
    $conn = $connObj->getConnection();

    $connObj->openConnection();

    $action = $_POST['action'];

    switch ($action) {
        case '_login':
            login_controller($conn);
            break;

        case '_Logout':
            logout_controller($conn);
            break;

        case '_submit_form':
            submit_checklist_controller($conn);
            break;

        case '_load_auditee_list':
            load_auditee_list_controller($conn);
            break;

        case '_load_area_process_list':
            load_area_process_list_controller($conn);
            break;

        case '_load_monitoring_data':
            load_monitoring_data_controller($conn);
            break;

        case '_load_auditor_names':
            load_auditor_names_controller($conn);
            break;

        case '_load_monitoring_checklist':
            load_monitoring_checklist_controller($conn);
            break;

        case '_get_monitoring_info_checklist':
            get_monitoring_info_checklist_controller($conn);
            break;

        case '_get_monitoring_info_data':
            get_monitoring_info_data_controller($conn);
            break;

        case '_delete_monitoring':
            delete_monitoring_data_controller($conn);
            break;

        // Under Auditee Functions
        case '_load_new_corrective_on_division':
            load_new_corrective_on_division_controller($conn);
            break;

        case '_submit_correction_action':
            submit_correction_action_controller($conn);
            break;

        default:
            echo json_encode(['statusCode' => 400, 'message' => 'Invalid Action']);
            break;
    }

    $connObj->closeConnection();

    function login_controller($connection) {
        $eid = $_POST['eid'];
        $password = $_POST['password'];
        $message = '';
        
        $sql = "{CALL sp_UsersLogin(?, ?, ?)}";
        
        $params = array(
            array($eid, SQLSRV_PARAM_IN),
            array($password, SQLSRV_PARAM_IN),
            array(&$message, SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_STRING(SQLSRV_ENC_CHAR))
        );
        
        $stmt = sqlsrv_query($connection, $sql, $params);
        
        if ($stmt === false) {
            echo json_encode(['status' => 'failed', 'message' => 'Database error']);
        }

        if (sqlsrv_has_rows($stmt)) {
            if (sqlsrv_fetch($stmt) === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            
            $employee_id = sqlsrv_get_field($stmt, 1);
            $name = sqlsrv_get_field($stmt, 2);
            $department = sqlsrv_get_field($stmt, 3);
            $role = sqlsrv_get_field($stmt, 5);

            $paths = [
                'master' => 'master/dashboard/content/index.php',
                'admin' => 'admin/dashboard/content/index.php',
                'auditee' => 'auditee/dashboard/content/index.php',
            ];

            $destination = isset($paths[$role]) ? $paths[$role] . '?code=' . urlencode(base64_encode('success_login')) : 'index.php';

            // if ($role === 'master') {
            //     $destination = 'master/dashboard/content/index.php?code=' . urlencode(base64_encode('success_login'));
            // } else if ($role === 'admin') {
            //     $destination = 'admin/dashboard/content/index.php?code=' . urlencode(base64_encode('success_login'));
            // } else if ($role === 'auditee') {
            //     $destination = 'auditee/dashboard/content/index.php?code=' . urlencode(base64_encode('success_login'));
            // } else {
            //     $destination = 'index.php';
            // }

            $_SESSION['login_id'] = $employee_id;
            $_SESSION['login_name'] = $name;
            $_SESSION['login_department'] = $department;
            $_SESSION['login_role'] = $role;

            echo json_encode(['status' => 'success', 'destination' => $destination]);
            exit;
        }
        
        // THEN process remaining result sets to get the output parameter
        sqlsrv_next_result($stmt);

        if ($message === 'ID_NOT_EXISTS') {
            echo json_encode(['status' => 'not_exists', 'message' => 'Employee ID does not exist.']);
            exit;
        } 

        if ($message === 'ID_EXISTS') {
            echo json_encode(['status' => 'invalid', 'message' => 'Invalid Credentials.']);
            exit;
        }

        //sqlsrv_free_stmt($stmt);
    }

    function logout_controller($connection) {

        $sql = "UPDATE users_tbl SET isActive = 'No' WHERE employee_id = ?";
        $params = array($_POST['eid'] ?? '');
        $res = sqlsrv_query($connection, $sql, $params);

        if ($res) {
            // session_unset();
            // session_destroy();
            echo 'success';
        } else {
            echo 'failed';
        }

        // $vals = $_POST['eid'] ?? '';

        // echo $vals;
    }

    function generate_unique_code_controller($connection, $code) {
        
        $message = '';

        $sql = "{CALL sp_UniqueCodeValidation(?, ?)}";
        $params = array(
            array($code, SQLSRV_PARAM_IN),
            array(&$message, SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_STRING(SQLSRV_ENC_CHAR))
        );
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            echo json_encode(['status' => 'failed', 'message' => 'Error in checking the unique code.']);
        }

        if ($message === 'EXISTS') { // catch here if code exists
            // echo 'The code already exists. Please try again.';
            echo json_encode(['status' => 'failed', 'message' => 'The code already exists. Please try again.']);
            exit;
        }

        // echo $unicode;
    }

    function submit_checklist_controller($connection) {
        
        $unicode = strtoupper(substr(bin2hex(random_bytes(5)), 0, 9));
        
        $division = $_POST['division'] ?? '';
        $auditee = $_POST['auditee'] ?? '';
        $areas = $_POST['areas'] ?? '';
        $auditor = $_POST['auditor'] ?? '';
        $category = $_POST['category'] ?? '';

        $title = ($category === 'Patrol Audit' || $category === 'Quality Issue') ? 'Normal Audit' : 'Other Audit';

        $audit_date = isset($_POST['audit_date']) ? date('F j, Y', strtotime($_POST['audit_date'])) : '';
        $shift = $_POST['shift'] ?? '';
        $final = $audit_date . ' - ' . $shift;

        $findings = json_decode($_POST['findings'], true);

        generate_unique_code_controller($connection, $unicode);

        // Insert findings into checklist_tbl
        $sql = "
                INSERT INTO checklist_tbl (unique_code, division, auditee, auditor, category, date_audited, submitted_at, title, area_process) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $params = [
            $unicode,
            $division,
            $auditee,
            $auditor,
            $category,
            $final,
            (new DateTime('now', new DateTimeZone('Asia/Manila')))->format('g:i A'),
            $title,
            $areas
        ];

        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true), 3, 'sql_errors.log');
            echo json_encode(['status' => 'failed', 'message' => 'Database error: ' . $errors[0]['message']]);
            return;
        }

        foreach ($findings as $monitoring) {
            $the_status = '';
            // Only insert when answer is "yes" or "no"; ignore "na" and anything else
            $answer = strtolower(trim($monitoring['answer'] ?? ''));
            if (!in_array($answer, ['yes', 'no'])) {
                continue;
            } 

            $the_status = $monitoring['classification'] === 'P' ? 'Done' : 'Open';

            // Calculate target date based on action_category
            $targetDate = new DateTime('now', new DateTimeZone('Asia/Manila'));
            $actionCategory = $monitoring['actionCategory'] ?? '';
            
            if ($actionCategory === 'Immediate Improvement') {
                $daysToAdd = 1; // 24 hours
            } elseif ($actionCategory === 'For Improvement') {
                $daysToAdd = 7;
            } elseif ($actionCategory === 'Documentation') {
                $daysToAdd = 14;
            } else {
                $daysToAdd = 0; // default
            }
            
            if ($daysToAdd === 0) {
                $target_date = null;
            } else {
                $daysAdded = 0;
                while ($daysAdded < $daysToAdd) {
                    $targetDate->modify('+1 day');
                    $dayOfWeek = $targetDate->format('N'); // 1=Monday, 6=Saturday, 7=Sunday
                    if ($dayOfWeek < 6) { // Not Saturday or Sunday
                        $daysAdded++;
                    }
                }
                $target_date = $targetDate->format('F j, Y');
            }

            $sql = "
                INSERT INTO monitoring_tbl (unique_code, division, type_of_audit, model_process_area, result, classification, incharge, date_audited, question_number, occurrence, status, action_category, target_date, auditee_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'For Comply')
            ";
            $params = [
                $unicode,
                $division,
                $category,
                $areas,
                $monitoring['evidence'],
                $monitoring['classification'],
                $auditee,
                $audit_date,
                $monitoring['questionNumber'],
                $monitoring['occurrence'],
                $the_status,
                $monitoring['actionCategory'],
                $target_date
            ];
            $stmt = sqlsrv_query($connection, $sql, $params);

            if ($stmt === false) {
                $errors = sqlsrv_errors();
                error_log(print_r($errors, true), 3, 'sql_errors.log');
                echo json_encode(['status' => 'failed', 'message' => 'Database error: ' . $errors[0]['message']]);
                return;
            }
        }

        foreach ($findings as $uploadfile) {
            // Only insert when answer is "yes" or "no"; ignore "na" and anything else
            $answer = strtolower(trim($uploadfile['answer'] ?? ''));
            if (!in_array($answer, ['yes', 'no'])) {
                continue;
            }

            $fileName = null;
            $fileStream = null;

            // Check for file using the proof_{questionNumber} format
            $fileKey = "proof_" . $uploadfile['questionNumber'];
            
            if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES[$fileKey]['tmp_name'];
                if (is_uploaded_file($fileTmp) && file_exists($fileTmp)) {
                    $fileName = basename($_FILES[$fileKey]['name']);
                    $fileStream = fopen($fileTmp, "rb");
                    if ($fileStream === false) {
                        $fileStream = null;
                        $fileName = null;
                    }
                }
            }

            $params = [
                $unicode,
                $fileName,
                [
                    &$fileStream,
                    SQLSRV_PARAM_IN,
                    SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY),
                    SQLSRV_SQLTYPE_VARBINARY('max')
                ],
                date('Y-m-d H:i:s', time()),
                $uploadfile['questionNumber'],
                $uploadfile['answer']
            ];

            $sql = "
                    INSERT INTO uploadedFile_tbl (unique_code, file_name, file_data, uploaded_at, question_number, answer) 
                    VALUES (?, ?, ?, ?, ?, ?)
            ";

            $stmt = sqlsrv_query($connection, $sql, $params);

            if ($fileStream !== null) {
                fclose($fileStream);
            }

            if ($stmt === false) {
                $errors = sqlsrv_errors();
                error_log(print_r($errors, true), 3, 'sql_errors.log');
                echo json_encode(['status' => 'failed', 'message' => 'Database error: ' . $errors[0]['message']]);
                return;
            }
        }

        echo json_encode(['status' => 'success', 'message' => 'Findings submitted successfully.', 'unique_code' => $unicode]);
    }

    function submit_correction_action_controller($connection) {
        $monitoringID = $_POST['monitoringID'] ?? '';
        $rootCause = $_POST['rootCause'] ?? '';
        $actionPlan = $_POST['actionPlan'] ?? '';
        $evidenceFile = $_FILES['evidenceFile'] ?? null;

        // Handle file upload
        $fileName = null;
        $fileStream = null;

        if ($evidenceFile && $evidenceFile['error'] === UPLOAD_ERR_OK) {
            $fileTmp = $evidenceFile['tmp_name'];
            if (is_uploaded_file($fileTmp) && file_exists($fileTmp)) {
                $fileName = basename($evidenceFile['name']);
                $fileStream = fopen($fileTmp, "rb");
                if ($fileStream === false) {
                    $fileStream = null;
                    $fileName = null;
                }
            }
        }

        $sql = "
            UPDATE monitoring_tbl 
            SET cause_analysis = ?, corrective_action = ?, auditee_status = 'For Checking', auditee_fileName = ?, auditee_fileData = ? 
            WHERE id = ?
        ";

        $params = [
            $rootCause,
            $actionPlan,
            $fileName,
            $fileStream ? [
                &$fileStream,
                SQLSRV_PARAM_IN,
                SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY),
                SQLSRV_SQLTYPE_VARBINARY('max')
            ] : null,
            $monitoringID
        ];

        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($fileStream !== null) {
            fclose($fileStream);
        }

        if ($stmt === false) {
            $errors = sqlsrv_errors();
            error_log(print_r($errors, true), 3, 'sql_errors.log');
            echo json_encode(['status' => 'failed', 'message' => 'Database error: ' . $errors[0]['message']]);
            return;
        }

        echo json_encode(['status' => 'success', 'message' => 'Correction action submitted successfully.']);
    }

?>

