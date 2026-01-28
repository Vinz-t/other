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

    $model = $_POST['model'] ?? '';
    $areaProcess = $_POST['areaProcess'] ?? '';
    $classification = $_POST['classification'] ?? '';
    $auditResult = $_POST['auditResult'] ?? '';

    // Condition on this block
    $name = $_POST['auditorName'] ?? '';
    $controlCode = $_POST['controlCode'] ?? '';
    $rootCause = $_POST['rootCause'] ?? '';
    $actionPlan = $_POST['actionPlan'] ?? '';

    // $sql = "
    //         SELECT name, mailing_address FROM users_tbl
    //         WHERE name = ?
    // ";
    $sql = "
            SELECT name, mailing_address 
            FROM users_tbl
            WHERE 
                (
                    name = ? 
                    AND role = 'admin' 
                    AND accountLevel IN ('High', 'Average')
                )
                OR 
                (
                    role = 'admin' AND
                    accountLevel = 'High'
                );
    ";
    $params = [$name];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
        echo json_encode(['status' => 'error', 'message' => 'Database query failed']);
        exit;
    }

    $recipientEmails = '';

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $addr = trim($row['mailing_address'] ?? '');
        if ($addr !== '') {
            $recipientEmails .= ($recipientEmails === '' ? '' : ', ') . $addr;
        }
    }

    // $recipientEmails = '';
    // while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    //     $addr = trim($row['mailing_address'] ?? '');
    //     if ($addr !== '') {
    //         $recipientEmails =  $addr;
    //     }
    // }

    // Prepare message body (lightweight, no DB access)
    $message = "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>";
    $message .= "<div style='background-color: #FF9800; padding: 20px; text-align: center;'>";
    $message .= "<h2 style='color: #ffffff; margin: 0;'>For Review</h2>";
    $message .= "</div>";
    $message .= "<div style='background-color: #ffffff; padding: 25px; border: 1px solid #dddddd;'>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Good Day,</p>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Please see below the Root Cause Analysis and Corrective Action submitted for Control Code No. <strong>" . $controlCode . "</strong></p>";
    
    $message .= "<div style='background-color: #cbefff; padding: 15px; border-left: 4px solid #00aeff; margin: 15px 0;'>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0 0 10px 0;'><strong>Model:</strong><br>" . $model . "</p>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0 0 10px 0;'><strong>Area / Process:</strong><br>" . $areaProcess . "</p>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0 0 10px 0;'><strong>Audit Findings Classification:</strong><br>" . $classification . "</p>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0;'><strong>Audit Result:</strong><br>" . $auditResult . "</p>";
    $message .= "</div>";
    
    $message .= "<div style='background-color: #fff8e1; padding: 15px; border-left: 4px solid #FF9800; margin: 15px 0;'>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0 0 10px 0;'><strong>Root Cause Analysis:</strong><br>" . $rootCause . "</p>";
    $message .= "<p style='color: #333333; font-size: 14px; margin: 0;'><strong>Corrective Action Plan:</strong><br>" . $actionPlan . "</p>";
    $message .= "</div>";
    
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Please review the submission by clicking the link below:</p>";
    $message .= "<p style='text-align: center; margin: 20px 0;'>";
    $message .= "<a href='http://192.168.132.170/fophaudit/' style='background-color: #FF9800; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px;'>Audit Management System</a>";
    $message .= "</p>";
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

    $emailArray = explode(',', $recipientEmails);
    foreach ($emailArray as $email) {
        $email = trim($email);
        if (!empty($email)) {
            $mail->addAddress($email);
        }
    }

    //$mail->addAddress($recipientEmails);
    //$mail->addCC($proposerEmail);
   
    $mail->isHTML(true);
    $mail->Subject = "Response for Control Code: " . $controlCode . " (Audit MS Notification)";
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
    } catch (\Exception $e) {
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

?>