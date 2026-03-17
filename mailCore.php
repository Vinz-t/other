<?php

    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    require '../PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendEmail($recipientEmail, $subject, $message) {

        if ($recipientEmail === 'systemEmail') {
            $recipientEmail = 'lopezcompoundms@gmail.com';
        }

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = ''; // your email
        $mail->Password   = ''; // your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
                       // your email and name below
        $mail->setFrom('', 'Lopez Compound Management System');

        $mail->addAddress($recipientEmail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        try {
            if ($mail->send()) {
                return ["success" => true, "message" => "Email sent successfully to: $recipientEmail"];
            } else {
                throw new Exception('Mailer Error: ' . $mail->ErrorInfo);
            }
        } catch (Exception $e) {
            error_log('Mail error: ' . $e->getMessage());
            return ["success" => false, "message" => "Email could not be sent: " . $e->getMessage()];
        }
    }

?>

<!-- Usage / Example -->
<!-- $adminMessage = "
<div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 30px; border: 1px solid #e0e0e0; border-radius: 8px;'>

<h2 style='color: #ff9800;'>Property Renewal Request 🔄</h2>

<p style='color: #555; font-size: 15px; line-height: 1.7;'>
    A tenant has submitted a property renewal request and requires your review.
</p>

<p style='color: #555; font-size: 15px; line-height: 1.7;'>
    <strong>Application ID:</strong> $applicationId<br>
    <strong>Property ID:</strong> $propertyId
</p>

<p style='color: #555; font-size: 15px; line-height: 1.7;'>
    <strong>Renewal Message:</strong><br>
    $message
</p>

<p style='color: #555; font-size: 15px; line-height: 1.7;'>
    Please log in to the management system to review and approve or decline the renewal request.
</p>

<br>
<p style='color: #999; font-size: 12px;'>— Lopez Compound Management System</p>

</div>
";

// Send admin notification
$adminEmail = 'systemEmail'; // Update with actual admin email
$emailResult = sendEmail($adminEmail, "Property Renewal Request - Admin Notification", $adminMessage);

if (!$emailResult['success']) {
// Log the email sending error but do not fail the account creation
error_log($emailResult['message']);
echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully, but failed to send admin notification email.']);
return;
} -->