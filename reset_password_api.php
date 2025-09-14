<?php
session_start();
$title = "Reset Student Password";
include "assets/includes/header1.php"; // brings in your styles

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$STUDENT_FILE = "students.txt";
$OTP_EXPIRY = 300; // 5 minutes

$GMAIL_USER = "inspira2k25.rjt@gmail.com";
$GMAIL_PASS = "wihh muhv bnsj cank"; // Gmail App Password
$GMAIL_FROM = "inspira2k25.rjt@gmail.com";
//iitb zkql ggoa qmjf
function sendOTPEmail($to, $otp) {
    global $GMAIL_USER, $GMAIL_PASS, $GMAIL_FROM;

    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $GMAIL_USER;
        $mail->Password   = $GMAIL_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender & recipient
        $mail->setFrom($GMAIL_FROM, 'INSPIRA\'25 Teachnical Team');
        $mail->addAddress($to);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Verification Code';
        $mail->Body    = "
            <p>Dear Student,</p>
            <p>You requested to reset your password. Please use the following One-Time Password (OTP) to complete the process:</p>
            <h2 style='color:#2d89ef; font-family:Arial;'>$otp</h2>
            <p><i>This code will expire in 5 minutes. If you did not request a password reset, please ignore this email or contact support.</i></p>
            <p>Thank you,<br>Teachnical Team,INSPIRA'25</p>
        ";
        $mail->AltBody = "Your OTP code is: $otp\n\nThis code will expire in 5 minutes. If you did not request this, please ignore the email.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
$action = $_POST['action'] ?? '';

if($action=='send_otp'){
    $index = $_POST['index_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $students = file($STUDENT_FILE);
    $valid = false;
    foreach($students as $line){
        $data = explode(",", trim($line));
        if($data[0]==$index && $data[2]==$email && $data[3]==$phone){
            $valid = true;
            break;
        }
    }

    if($valid){
        $otp = rand(100000,999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['reset_index'] = $index;
        $_SESSION['otp_time'] = time();

        $result = sendOTPEmail($email,$otp);
        if($result===true){
            echo "OTP sent to your email.";
        } else {
            echo "Failed to send OTP: $result";
        }
    } else {
        echo "Invalid student details.";
    }
}

elseif($action=='verify_otp'){
    $otp = $_POST['otp'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    if(isset($_SESSION['otp']) && $otp==$_SESSION['otp'] && (time()-$_SESSION['otp_time'] <= $OTP_EXPIRY)){
        $index = $_SESSION['reset_index'];
        $students = file($STUDENT_FILE);
        foreach($students as &$line){
            $data = explode(",", trim($line));
            if($data[0]==$index){
                $data[1] = $new_password;
                $line = implode(",", $data)."\n";
                break;
            }
        }
        file_put_contents($STUDENT_FILE, implode("",$students));
        session_destroy();
        echo "<div style='color:green;font-weight:bold;text-align:center;'>Password updated successfully! Redirecting to login...</div>";
        echo '<script>setTimeout(()=>{window.location.href="index.php";},3000);</script>';

    } else {
        echo "Invalid or expired OTP.";
    }
}

else {
    echo '
    <div class="container fade-in-up-1">
        <div class="header">
            <h1>'.$title.'</h1>
            <p>Reset your student portal password securely</p>
        </div>
        <div class="form-container">
            <div class="input-group">
                <label>Index Number</label>
                <input type="text" id="index_number" placeholder="E.g. ASP2024001">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" id="email" placeholder="Your registered email">
            </div>
            <div class="input-group">
                <label>Phone</label>
                <input type="text" id="phone" placeholder="Your registered phone">
            </div>
            <button class="btn" onclick="sendOTP()">Send OTP</button>

            <div class="input-group" style="margin-top:20px;">
                <label>OTP</label>
                <input type="text" id="otp" placeholder="Enter OTP">
            </div>
            <div class="input-group">
                <label>New Password</label>
                <input type="password" id="new_password" placeholder="Enter new password">
            </div>
            <button class="btn" onclick="verifyOTP()">Reset Password</button>

            <div id="message" style="margin-top:15px;color:red;"></div>

            <button class="back-btn" onclick="window.location.href=\'index.php\'">
                <i class="fas fa-arrow-left"></i> Back to Login
            </button>

            <a href="https://wa.me/94763279285?text=Hello%20Malith%2C%20my%20account%20is%20not%20working.%20Could%20you%20please%20help%20me%20resolve%20this%20issue%3F" target="_blank" class="whatsapp-btn">
                <i class="fab fa-whatsapp"></i> Contact on WhatsApp
            </a>
        </div>
    </div>


    <script>
    function sendOTP(){
        const index=document.getElementById("index_number").value;
        const email=document.getElementById("email").value;
        const phone=document.getElementById("phone").value;
        fetch("",{
            method:"POST",
            headers:{"Content-Type":"application/x-www-form-urlencoded"},
            body:`action=send_otp&index_number=${index}&email=${email}&phone=${phone}`
        }).then(res=>res.text()).then(data=>{
            document.getElementById("message").innerHTML=data;
        });
    }

    function verifyOTP(){
        const otp=document.getElementById("otp").value;
        const newPass=document.getElementById("new_password").value;
        fetch("",{
            method:"POST",
            headers:{"Content-Type":"application/x-www-form-urlencoded"},
            body:`action=verify_otp&otp=${otp}&new_password=${newPass}`
        }).then(res=>res.text()).then(data=>{
            document.getElementById("message").innerHTML=data;
        });
    }
    </script>
    ';
}

include "assets/includes/footer1.php";
?>
