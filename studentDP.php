<?php
$title = "Student Profile Picture Generator";
include "assets/includes/header1.php"; 
?>

<div class="container">
    <div class="header">
        <h1><?php echo $title; ?></h1>
        <p>Download your profile picture for Zoom</p>
    </div>

    <!-- Login Container -->
    <div id="login-container">
        <div class="form-container">
            <div class="logo">
                <i class="fas fa-user-graduate"></i>
            </div>

            <div class="input-group">
                <label for="index-number"><i class="fas fa-id-card"></i> Student Registration Number</label>
                <input type="text" id="index-number" placeholder="Enter your student registration number">
            </div>

            <div class="input-group">
                <label for="password"><i class="fas fa-lock"></i> Pin Number</label>
                <input type="password" id="password" placeholder="Enter your pin">
            </div>

            <button class="btn" onclick="login()"><i class="fas fa-sign-in-alt"></i> Get My Picture</button>

            <div id="error-message" class="error-message">
                <i class="fas fa-exclamation-circle"></i> Invalid Student Registration number or password. Please try again.
            </div>

            <div class="info-box">
                <p><i class="fas fa-info-circle"></i> Enter your Student Registration Number and Password to retrieve your profile picture.</p>
            </div>
        </div>
    </div>

    <!-- Result Container -->
    <div id="result-container" class="result-container">
        <div class="logo">
            <i class="fas fa-check-circle" style="color: #00c853;"></i>
        </div>
<div>
        <img id="profile-pic" class="profile-pic" src="" alt="Profile Picture">
        <h2 id="welcome-message">Welcome, Student!</h2>
        <p>Your profile picture is ready for download.</p>
         <br>
            For any changes, please contact Janith. 
            <a href="https://wa.me/94771365944?text=Hello%20Janith%2C%20I%20would%20like%20to%20update%20my%20profile%20picture%20(DP).%20Could%20you%20please%20assist%20me%3F%20Thank%20you." 
               target="_blank" class="whatsapp-btn">
                <i class="fab fa-whatsapp"></i> Contact on WhatsApp
            </a>
</div>  
        <div id="success-message" class="success-message">
            <i class="fas fa-check"></i> Picture downloaded successfully!
        </div>

        <a id="download-link" class="download-btn" href="#" download>
            <i class="fas fa-download"></i> Download Picture
        </a>
        <button class="back-btn " onclick="goBack()"><i class="fas fa-arrow-left"></i> Back to Login</button>
    </div>
</div>

<?php include "assets/includes/footer1.php";  ?>
