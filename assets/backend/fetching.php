<?php

    function load_auditee_list_controller($connection) {
        $division = $_POST['division'];
        
        $sql = "
                SELECT * FROM users_tbl
                WHERE department = ?
        ";
        $params = array($division);
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $options = '<option selected disabled>Select Auditee</option>';

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $name = htmlspecialchars($row['name']);
            $options .= "<option value=\"{$name}\">{$name}</option>";
        }

        echo $options;
    }

    function load_area_process_list_controller($connection) {
        $division = $_POST['division'] ?? null;
        $final = $division . '_tbl';

        $sql = "
                SELECT DISTINCT 
                    CONCAT(model, ' - ', area) AS model_area,
                    area 
                FROM $final
                ORDER BY area ASC
        ";
        $stmt = sqlsrv_query($connection, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $area_name = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $area_name[] = $row['model_area'];
        }

        echo json_encode(['area_name' => $area_name]);
    }

    function load_monitoring_data_controller($connection) {
        $trigger = $_POST['trigger'] ?? '';

        if ($trigger === 'apply_filter') {
            $start_date = $_POST['start_date'] ?? '';
            $end_date = $_POST['end_date'] ?? '';
            $audit_category = $_POST['audit_category'] ?? '';
            $division = $_POST['division'] ?? '';

            $sql = "
                SELECT
                    m.*,
                    c.auditor,
                    c.division
                FROM monitoring_tbl m
                LEFT JOIN checklist_tbl c ON (SELECT DISTINCT m.unique_code) = c.unique_code
                WHERE 
                    (m.date_audited BETWEEN '$start_date' AND '$end_date')
                    AND c.title = '$audit_category'
                    AND c.division = '$division'
                ORDER BY id DESC
            ";
        } else {
            $sql = "
                SELECT
                    m.*,
                    c.auditor,
                    c.division
                FROM monitoring_tbl m
                LEFT JOIN checklist_tbl c ON (SELECT DISTINCT m.unique_code) = c.unique_code
                ORDER BY id DESC
            ";
        }
        
        $stmt = sqlsrv_query($connection, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = [
                'id'                        => $row['id'],
                'questionNumber'            => $row['question_number'],
                'uniqueCode'                => $row['unique_code'],
                'typeAudit'                 => $row['type_of_audit'],
                'modelProcessArea'          => $row['model_process_area'],
                'resultEvidence'            => $row['result'],
                'classification'            => $row['classification'],
                'status'                    => $row['status'],
                'dateAudited'               => $row['date_audited'],
                'auditor'                   => $row['auditor'],
                'division'                  => $row['division']
            ];
        }

        echo json_encode($data);
    }

    function load_auditor_names_controller($connection) {
        $division = $_POST['division'] ?? '';

        $sql = "
                SELECT DISTINCT auditor FROM checklist_tbl
                WHERE division = ?
                ORDER BY auditor ASC
        ";
        $params = array($division);
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $output = '';

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $auditor = htmlspecialchars($row['auditor']);
            $output .= "<span class=\"badge rounded-pill bg-success fw-bold\">{$auditor}</span> ";
        }

        echo $output;
    }

    function load_monitoring_checklist_controller($connection) {
        $sql = "
                SELECT * FROM checklist_tbl
                ORDER BY id DESC
        ";
        $stmt = sqlsrv_query($connection, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = [
                'id'              => $row['id'],
                'uniqueCode'      => $row['unique_code'],
                'division'        => $row['division'],
                'auditee'         => $row['auditee'],
                'auditor'         => $row['auditor'],
                'category'        => $row['category'],
                'dateAudited'     => $row['date_audited'],
                'submittedAt'     => $row['submitted_at']
            ];
        }

        echo json_encode($data);
    }

    function get_monitoring_info_checklist_controller($connection) {
        $unique_code = $_POST['uniqueCode'] ?? '';

        $sql = "
                SELECT
					c.*,
					m.result,
					m.classification,
					m.question_number,
					m.occurrence,
                    p.id,
					p.file_name,
					p.answer
				FROM checklist_tbl c WITH (INDEX(idx_checklist_unique_code))
				LEFT JOIN monitoring_tbl m WITH (INDEX(idx_monitoring_unique_code))
					ON c.unique_code = m.unique_code
				LEFT JOIN uploadedFile_tbl p WITH (INDEX(idx_uploadedfile_unique_question))
					ON c.unique_code = p.unique_code 
					AND m.question_number = p.question_number
				WHERE c.unique_code = ?
				OPTION (RECOMPILE)
        ";
        $params = array($unique_code);
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = array();

        // Use a while loop to handle multiple rows
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            // Base checklist data (only set once)
            if (empty($data)) {
                $data = array(
                    'id'          => $row['id'],
                    'uniqueCode'  => $row['unique_code'],
                    'division'    => $row['division'],
                    'auditee'     => $row['auditee'],
                    'auditor'     => $row['auditor'],
                    'category'    => $row['category'],
                    'dateAudited' => $row['date_audited'],
                    'submittedAt' => $row['submitted_at'],
                    'areaProcess' => $row['area_process'],
                    'result'      => $row['result']
                );
            }

            // Collect monitoring results (if present)
            if (!empty($row['result'])) {
                $data['monitoring'][] = $row['result'];
            }

            // Handle file data
            if (!empty($row['file_name']) || !empty($row['answer'])) {
                // Encode file_data if it exists
                // $fileData = null;
                // if (!empty($row['file_data'])) {
                //     $fileData = base64_encode($row['file_data']);
                // }

                // data of the table
                $data['uploads'][] = array(
                    'fileID'            => $row['id'],
                    'questionNumber'    => $row['question_number'],
                    'result'            => $row['result'],
                    'classification'    => $row['classification'],
                    'occurrence'        => $row['occurrence'],
                    'fileName'          => $row['file_name'],
                    //'fileData'          => $fileData,
                    'answer'            => $row['answer']
                );
            }
        }

        // If no rows were found, return an empty array
        if (empty($data)) {
            $data = array();
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function get_monitoring_info_data_controller($connection) {
        $unique_code = $_POST['uniqueCode'] ?? '';
        $question_number = $_POST['questionNumber'] ?? '';

        // $sql = "
        //         SELECT * FROM monitoring_tbl
        //         WHERE unique_code = ? AND question_number = ?
        // ";
        $sql = "
                SELECT mt.*, 
                    ut.id as file_id,
                    ut.file_name
                FROM monitoring_tbl mt
                LEFT JOIN uploadedFile_tbl ut
                ON mt.unique_code = ut.unique_code AND mt.question_number = ut.question_number
                WHERE mt.unique_code = ? AND mt.question_number = ?
        ";
        $params = array($unique_code, $question_number);
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data = [
                'id'                        => $row['id'],
                'questionNumber'            => $row['question_number'],
                'uniqueCode'                => $row['unique_code'],
                'division'                  => $row['division'],
                'typeAudit'                 => $row['type_of_audit'],
                'modelProcessArea'          => $row['model_process_area'],
                'resultEvidence'            => $row['result'],
                'classification'            => $row['classification'],
                'incharge'                  => $row['incharge'],
                'dateAudited'               => $row['date_audited'],
                'status'                    => $row['status'],
                'actionCategory'            => $row['action_category'],
                'targetDate'                => $row['target_date'],
                'closureDate'               => $row['date_closed'],
                'fileID'                    => $row['file_id'],
                'fileName'                  => $row['file_name']
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function load_new_corrective_on_division_controller($connection) {
        $division = $_POST['division'] ?? '';
        $status = $_POST['status'] ?? '';

        $sql = "
                SELECT 
                    mt.*, 
                    ut.id as file_id, 
                    ut.file_name
                FROM monitoring_tbl mt
                LEFT JOIN uploadedFile_tbl ut
                ON mt.unique_code = ut.unique_code AND mt.question_number = ut.question_number
                WHERE mt.division = ? AND mt.auditee_status = ?
        ";
        $params = array($division, $status);
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $data = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = [
                'id'                        => $row['id'],
                'uniqueCode'                => $row['unique_code'],
                'modelProcessArea'          => $row['model_process_area'],
                'AuditResult'               => $row['result'],
                'classification'            => $row['classification'],
                'dateAudited'               => $row['date_audited'],
                'targetDate'                => $row['target_date'],
                'fileID'                    => $row['file_id'],
                'fileName'                  => $row['file_name']
            ];
        }

        echo json_encode($data);
    }

?>