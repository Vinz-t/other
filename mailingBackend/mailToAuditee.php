<?php 

    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    require '../PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../backend/connection.php';

    $connObj = new Connection();
    $conn = $connObj->getConnection();
    $connObj->openConnection();

    // Condition on this block
    $names = $_POST['auditeeNames'] ?? '';
    $model = $_POST['model'] ?? '';
    $processArea = $_POST['processArea'] ?? '';

    $sql = "
            SELECT STRING_AGG(mailing_address, ', ') AS email_addresses
			FROM (
				SELECT u.mailing_address
				FROM users_tbl u
				WHERE u.name IN (
					SELECT TRIM(value) 
					FROM STRING_SPLIT(?, ',')
				)
			) AS unique_emails;
    ";
    $params = [$names];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        //die(print_r(sqlsrv_errors(), true));
        echo json_encode(['status' => 'error', 'message' => 'Database query failed', 'errors' => sqlsrv_errors()]);
        exit;
    }

    $recipientEmails = '';
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row) {
        $recipientEmails = trim($row['email_addresses'] ?? '');
    }

    // Prepare message body (lightweight, no DB access)
    $message = "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>";
    $message .= "<div style='background-color: #2196F3; padding: 20px; text-align: center;'>";
    $message .= "<h2 style='color: #ffffff; margin: 0;'>New Audit Findings</h2>";
    $message .= "</div>";
    $message .= "<div style='background-color: #ffffff; padding: 25px; border: 1px solid #dddddd;'>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Good Day,</p>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>You have new audit findings in your Model and Area / Process:</p>";
    $message .= "<div style='background-color: #e3f2fd; padding: 15px; border-left: 4px solid #2196F3; margin: 15px 0;'>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0;'><strong>" . $model . ", " . $processArea . "</strong></p>";
    $message .= "</div>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Please submit your response by clicking the link below:</p>";
    $message .= "<p style='text-align: center; margin: 20px 0;'>";
    $message .= "<a href='http://192.168.132.170/fophaudit/' style='background-color: #2196F3; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px;'>Audit Management System</a>";
    $message .= "</p>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Kindly complete your response at your earliest convenience.</p>";
    $message .= "<p style='color: #333333; font-size: 14px;'>Thank you!</p>";
    $message .= "</div>";
    $message .= "<div style='background-color: #f5f5f5; padding: 15px; text-align: center; border: 1px solid #dddddd; border-top: none;'>";
    $message .= "<p style='color: #888888; font-size: 11px; margin: 0; font-style: italic;'>This is an automatically generated email. Please do not reply to this message.</p>";
    $message .= "</div>";
    $message .= "</div>";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'foph.dc-noreply@007.fujifilm.com';
    $mail->Password = 'Fujifilm@4';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption (change to SSL if needed)
    $mail->Port = 587;
    $mail->setFrom('foph.dc-noreply@fujifilm.com', 'Fujifilm Audit Team');

    //$theEmails = 'royvincent.paring@007.fujifilm.com, royvincent.paring@007.fujifilm.com'; // data here

    $emailArray = explode(',', $recipientEmails);
    foreach ($emailArray as $email) {
        $email = trim($email);
        if (!empty($email)) {
            $mail->addAddress($email);
        }
    }

    //$mail->addAddress($theEmails);
    //$mail->addCC($proposerEmail);
   
    $mail->isHTML(true);
    $mail->Subject = "Action Required: New Audit Findings (Audit MS Notification)";
    $mail->Body = $message;
 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
       
    try {
        if ($mail->send()) {
            // Email sent successfully
            // echo "Email sent successfully to $recipientEmails";
            echo json_encode(["status" => "success", "message" => "Email sent successfully to: " . $recipientEmails]);
            //$insertResponse = array("success" => true, "message" => "submitted successfully and with Email.");
        } else {
            // Email sending failed
            echo "Email sending failed: " . $mail->ErrorInfo;
            throw new Exception('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    } catch (Exception $e) {
        // Handle email sending exception: log and return JSON error
        error_log('Mail error: ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Email could not be sent: " . $e->getMessage()]);
        exit;
    }

    // free and close
    if ($stmt) { @sqlsrv_free_stmt($stmt); }

    $connObj->closeConnection();
 
    exit;




















































































    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // // Include database connection
    // date_default_timezone_set('Asia/Manila');
    // include($_SERVER['DOCUMENT_ROOT'] . '/Facility_Request_Center/includes/Config.php');

    // // Include PHPMailer autoloader
    // require '../PHPMailer/src/Exception.php';
    // require '../PHPMailer/src/PHPMailer.php';
    // require '../PHPMailer/src/SMTP.php';

    // $connObj = new Connection();
    // $conn = $connObj->getConnection();
    // $connObj->openConnection();

    // $action = $_POST['action'] ?? '';
    // $work_number = $_POST['work_number'] ?? '';
    // $requestor = $_POST['requestor'] ?? '';
    // $date_submit = $_POST['date_submit'] ?? '';
    // $department = $_POST['department'] ?? '';

    // if ($action === 'mail_to_department') {
        
    //     $sql = "
    //             SELECT name, department, mailing_address
    //             FROM department_accounts_tbl
    //             WHERE department = ?
    //     ";
    //     $params = [$department];
    //     $stmt = sqlsrv_query($conn, $sql, $params);
        
    //     $message = department_message($work_number, $date_submit, $requestor, $department, 'For Approval'); // Department Heads

    // } else if ($action === 'mail_to_facility_personnel') {
    //     $trigger = $_POST['trigger'] ?? '';
    //     $role = $_POST['role'] ?? '';

    //     if ($trigger === 'send_to_personnel') { // Role is Facility Personnel
    //         $sql = "
    //                 SELECT name, role, mailing_address
    //                 FROM facility_accounts_tbl
    //                 WHERE role IN ('$role', 'Facility Supervisor')
    //         ";
    //         $define_msg = 'For Assessment And Assigning'; // Facility Review 
    //     } else if ($trigger === 'send_to_supervisor') {
    //         $sql = "
    //                 SELECT name, role, mailing_address
    //                 FROM facility_accounts_tbl
    //                 WHERE role = '$role'
    //         ";
    //         $define_msg = 'For Approval'; // Facility Supervisor Review 
    //     } else if ($trigger === 'send_to_manager') {
    //         $sql = "
    //                 SELECT name, role, mailing_address
    //                 FROM facility_accounts_tbl
    //                 WHERE role = '$role'
    //         ";
    //         $define_msg = 'For Approval'; // Facility Manager Review
    //     } else if ($trigger === 'send_to_requestor') {
    //         $sql = "
    //                 SELECT name, role, mailing_address
    //                 FROM users_tbl
    //                 WHERE name = '$role'
    //         ";
    //         $define_msg = 'Review For Approval'; // Requestor Review
    //     } else if ($trigger === 'send_to_dept_head') {
    //         $sql = "
    //                 SELECT name, role, mailing_address
    //                 FROM department_accounts_tbl
    //                 WHERE name = '$role'
    //         ";
    //         $define_msg = 'For Approval';
    //     } else {
    //         echo json_encode(['status' => 'error', 'message' => 'Invalid trigger']);
    //         exit;
    //     }

    //     //$params = [$role];
    //     $stmt = sqlsrv_query($conn, $sql);
        
    //     $message = department_message($work_number, $date_submit, $requestor, $department, $define_msg);
    // } else if ($action === 'final_mail') {
    //     $role = $_POST['role'] ?? '';
    //     $sql = "
    //             SELECT name, role, mailing_address
    //             FROM facility_accounts_tbl
    //             WHERE role = '$role' 
    //     ";
    //     $stmt = sqlsrv_query($conn, $sql);
        
    //     $message = department_message($work_number, $date_submit, $requestor, $department, 'Completed');
    // } else {
    //     echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    //     exit;
    // }

    // if ($stmt === false) {
    //     die(print_r(sqlsrv_errors(), true));
    // }

    // $results = [];

    // while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    //     $addr = trim($row['mailing_address'] ?? '');

    //     if ($addr === '') {
    //         $results = ['email' => $addr, 'status' => 'skipped', 'message' => 'Empty address'];
    //         continue;
    //     }

    //     try {
    //         $mail = new PHPMailer(true);
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.office365.com';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'foph.dc-noreply@007.fujifilm.com'; // adjust as needed
    //         $mail->Password = 'Fujifilm@4'; // adjust as needed / secure in env in production
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //         $mail->Port = 587;
    //         $mail->setFrom('foph.dc-noreply@fujifilm.com', 'No-Reply');

    //         // If the field contains multiple comma-separated addresses, send to each
    //         $addresses = array_map('trim', explode(',', $addr));
    //         foreach ($addresses as $single) {
    //             if ($single === '') continue;
    //             $mail->addAddress($single);
    //         }

    //         $mail->isHTML(true);
    //         $mail->Subject = "To Approval Form Request Notification";
    //         $mail->Body = $message;

    //         $mail->send();
    //         $results = ['status' => 'success', 'message' => 'Email sent'];
    //     } catch (Exception $e) {
    //         $results = ['status' => 'error', 'message' => $mail->ErrorInfo ?? $e->getMessage()];
    //     }
    // }

    // echo json_encode($results);

    // // free and close
    // if ($stmt) { @sqlsrv_free_stmt($stmt); }

    // $connObj->closeConnection();

    // function department_message(string $work_number = '', string $date_submit = '', string $requestor = '', string $department = '', string $tag = ''): string 
    // {
    //     // prepare the common message
    //     $message = "<p>Good Day,</p>";
    //     $message .= "<p>You have a pending approval request for the following Approval Form:</p>";
    //     $message .= "<ul>";
    //     $message .= "<li><strong>Work Order Number : </strong> " . $work_number . "</li>";
    //     $message .= "<li><strong>Date Submitted : </strong> " . $date_submit . "</li>";
    //     $message .= "<li><strong>Requestor : </strong> " . $requestor . "</li>";
    //     $message .= "<li><strong>Department : </strong> " . $department . "</li>";

    //     if ($tag === 'Completed') {
    //         $message .= "<li><strong>Request Status : </strong> <span style='color:green;'>" . $tag . "</span></li>";
    //     } else {
    //         $message .= "<li><strong>Request Status : </strong> <span style='color:red;'>" . $tag . "</span></li>";
    //     }

    //     $message .= "</ul>";
    //     $message .= "<p>Please review the request and take action at your earliest convenience.</p>";
    //     $message .= "<p>You can log in here: <a href='http://192.168.132.170/Facility_Request_Center/'>Facility Request Center</a></p>";
    //     $message .= "<p>Thank you!</p>";
    //     $message .= "<p><strong><em>This is an automatically generated email. Please do not reply to this message.</em></strong></p>";
    //     return $message;
    // }




























    // $proposerNames = [];
    // $proposerEmails = [];
    // while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    //     //$proposerNames[] = trim($row['name'] ?? '');
    //     $addr = trim($row['mailing_address'] ?? '');
    //     if ($addr !== '') {
    //         $proposerEmails[] =  $addr;
    //     }
        
    // }

    // // remove duplicates if needed
    // $proposerEmails = array_values(array_unique($proposerEmails));

    // // Example outputs:
    // // 1) as an array for later use
    // // $proposerEmails

    // // 2) as a comma-separated string (useful for addAddress loops or debug)
    // $proposerEmailList = implode(', ', $proposerEmails);
    // //$proposerNameList = implode(', ', $proposerNames);

    // echo $proposerEmailList;
    // //echo $proposerNameList;

    // $connObj->closeConnection();

    // $message = "<p>Good Day,</p>";
    // $message .= "<p>You have a pending approval request for the following Approval Form:</p>";
    // // $message .= "<ul>";
    // // $message .= "<li><strong>Work Order Number : </strong> " . $controlNumber . "</li>";
    // // $message .= "<li><strong>Subject : </strong> " . $subjectInput . "</li>";
    // // $message .= "<li><strong>Requestor : </strong> " . $proposer . "</li>";
    // // $message .= "<li><strong>Department : </strong> " . $division . "</li>";
    // // $message .= "<li><strong>Approver Status : </strong> " . $firstApproverFunction . "</li>";
    // // $message .= "</ul>";
    // $message .= "<p>Please review the request and take action at your earliest convenience.</p>";
    // $message .= "<p>You can log in here: <a href='http://192.168.132.170/Facility_Request_Center'>FOPH FORM</a></p>";
    // $message .= "<p>Thank you!</p>";
    // $message .= "<p><strong><em>This is an automatically generated email. Please do not reply to this message.</em></strong></p>";
  
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    // // Send an email notification
    // try {
    //     $mail = new PHPMailer(true);
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.office365.com'; 
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'foph.dc-noreply@007.fujifilm.com'; 
    //     $mail->Password = 'Fujifilm@4'; 
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption (change to SSL if needed)
    //     $mail->Port = 587; 
    //     $mail->setFrom('foph.dc-noreply@fujifilm.com', 'No-Reply');

    //     //$recipientEmails = 'johnkristofer.jumarang@fujifilm.com';
       
    //     $mail->addAddress($proposerEmailList);
    //     //$mail->addCC($proposerEmail);
       
    //     $mail->isHTML(true);
    //     $mail->Subject = "To Approval Form Request Notification";
    //     $mail->Body = $message;

    //     if ($mail->send()) {
    //         echo json_encode(["status" => "success", "message" => "Email sent successfully to: " . $proposerEmailList]);
    //         //echo "Email sent successfully to: " . $recipientEmails;
    //     } else {
    //         echo json_encode(["status" => "error", "message" => "Failed to send email."]);
    //         //echo "Failed to send email. Error: " . $mail->ErrorInfo;
    //     }
    // } catch (Exception $e) {
    //     echo "Failed to send email. Exception: " . $e->getMessage();
    // }
?>