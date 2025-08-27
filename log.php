<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$ip        = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$time      = date(format: "Y-m-d H:i:s");
$action    = $_POST['action'] ?? 'Unknown Action';
$page      = $_POST['page'] ?? 'Unknown Page';
$referrer  = $_POST['referrer'] ?? 'Unknown Referrer';
$screen    = $_POST['screen'] ?? 'Unknown Screen';
$coords    = $_POST['coords'] ?? 'Unknown Coordinates';

$logEntry = "[$time] IP: $ip | Agent: $userAgent | Page: $page | Referrer: $referrer | Screen: $screen | Coords: $coords | Action: $action\n";
file_put_contents(filename: "inspect_log.txt", data: $logEntry, flags: FILE_APPEND);

$mail = new PHPMailer(exceptions: true);
try {
    $mail->isSMTP();
    $mail->Host       = 'mail.inspira.x10.mx';            // your SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rjt@inspira.x10.mx';    // your site email
    $mail->Password   = '#';
    $mail->SMTPSecure = 'ssl';                          // or 'ssl'
    $mail->Port       = 465;                            // or 465 for ssl

    $mail->setFrom(address: 'rjt@inspira.x10.mx', name: 'Inspira Security');
    $mail->addAddress(address: 'malithsandeepa1081@gmail.com');
    $mail->Subject = 'Suspicious Activity Detected!';
    $mail->Body    = $logEntry;

    $mail->send();
} catch (Exception $e) {
    error_log(message: "Mail Error: {$mail->ErrorInfo}");
}
?>


