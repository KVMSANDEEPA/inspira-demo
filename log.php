<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ip        = $_SERVER['REMOTE_ADDR']; 
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $time      = date("Y-m-d H:i:s");
    $page      = $_POST['page']   ?? 'Unknown';
    $screen    = $_POST['screen'] ?? 'Unknown';
    $action    = $_POST['action'] ?? 'Unknown';

    $data = "[$time] 
IP: $ip 
Agent: $userAgent 
Page: $page 
Screen: $screen 
Action: $action\n\n";

    // Log into file
    file_put_contents("inspect_log.txt", $data, FILE_APPEND);

    // === Email notification ===
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = '#';  // ✅ your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = '#';   // ✅ your email
        $mail->Password   = '#';          // ✅ your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // safer than "tls"
        $mail->Port       = 587;                    // try 465 with PHPMailer::ENCRYPTION_SMTPS if fails

        // Debugging (0 = off | 2 = full debug)
        $mail->SMTPDebug  = 0;
        $mail->Debugoutput = 'html';

        $mail->setFrom('#', 'Security Bot');
        $mail->addAddress('#'); // ✅ recipient

        $mail->isHTML(true);
        $mail->Subject = "⚠ Security Alert: Inspect Attempt";
        $mail->Body    = nl2br($data);
        $mail->AltBody = $data; // fallback for non-HTML clients

        $mail->send();
        echo "✅ Logged and Email Sent";
    } catch (Exception $e) {
        // Fallback: PHP mail()
        $to      = "#"; 
        $subject = "⚠ Security Alert (Fallback)";
        $headers = "From: #\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $data, $headers)) {
            echo "⚠ Logged, SMTP Failed but mail() Sent";
        } else {
            echo "❌ Logged, but Email Failed: " . $mail->ErrorInfo;
        }
    }
}
?>

