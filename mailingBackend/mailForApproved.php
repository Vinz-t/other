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
    $controlCode = $_POST['controlCode'] ?? '';
    $name = $_POST['auditeeName'] ?? '';

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
    $params = [$name];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // die(print_r(sqlsrv_errors(), true));
        echo json_encode(['status' => 'error', 'message' => 'Database query failed']);
        exit;
    }

    $recipientEmails = '';
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row) {
        $recipientEmails = trim($row['email_addresses'] ?? '');
    }

    // Prepare message body (lightweight, no DB access)
    $message = "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>";
    $message .= "<div style='background-color: #4CAF50; padding: 20px; text-align: center;'>";
    $message .= "<h2 style='color: #ffffff; margin: 0;'>Corrective Response Approved</h2>";
    $message .= "</div>";
    $message .= "<div style='background-color: #ffffff; padding: 25px; border: 1px solid #dddddd;'>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Good Day,</p>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>This is to inform you that the Root Cause Analysis submitted for Control Code No. <strong>" . $controlCode . "</strong> has been <strong style='color: #4CAF50;'>approved</strong>.</p>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>Thank you for your co-operation!</p>";
    $message .= "<p style='color: #333333; font-size: 14px; line-height: 1.6;'>You may view the details by clicking the link below:</p>";
    $message .= "<p style='text-align: center; margin: 20px 0;'>";
    $message .= "<a href='http://192.168.132.170/fophaudit/' style='background-color: #4CAF50; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px;'>Audit Management System</a>";
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

    // $recipientEmails = 'royvincent.paring@007.fujifilm.com'; // data here

    $emailArray = explode(',', $recipientEmails);
    foreach ($emailArray as $email) {
        $email = trim($email);
        if (!empty($email)) {
            $mail->addAddress($email);
        }
    }

    // $mail->addAddress($recipientEmails);
    //$mail->addCC($proposerEmail);
   
    $mail->isHTML(true);
    $mail->Subject = "Approved: Control Code No. " . $controlCode . " (Audit MS Notification)";
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

?>