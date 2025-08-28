<?php
// header.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "My Website"; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

      .animated-gradient {
            background: linear-gradient(-45deg, #541C1C, #6B2E2E, #874C1B, #541C1C);
            background-size: 600% 600%;
            animation: waveFlag 10s ease infinite;
        }
         :root {
            --primary: #D78600;
            --primary-dark: #B56D3A;
            --secondary: #9E5B2E;
            --dark: #511D16;
            --burgundy: #6B3A3E;
            --light-brown: #B56D3A;
            --light-gray: #c2c2c2;
        }
        @keyframes waveFlag {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Keyframes for fade-in-up animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Applying animations with delays */
        .fade-in-up-1 {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .fade-in-up-2 {
            animation: fadeInUp 0.8s 0.2s ease-out forwards;
            opacity: 0;
        }

        .fade-in-up-3 {
            animation: fadeInUp 0.8s 0.4s ease-out forwards;
            opacity: 0;
        }

        .fade-in-up-4 {
            animation: fadeInUp 0.8s 0.6s ease-out forwards;
            opacity: 0;
        }

        .fade-in-up-5 {
            animation: fadeInUp 0.8s 0.8s ease-out forwards;
            opacity: 0;
        }


        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(194, 194, 194, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.21);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
        }

        .header {
            background: var(--primary);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .form-container {
            padding: 25px;
            
        }
        

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--light-gray);
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--light-gray);
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            border-color: var(--light-gray);
            outline: none;
        }

        .btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .result-container {
            display: none;
            text-align: center;
            padding: 25px;
            color: var(--light-gray);
        }

        .profile-pic {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #f0f0f0;
            margin: 0 auto 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .download-btn {
            background: var(--primary);
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .download-btn:hover {
            background: var(--primary-dark);
        }
        #welcome-message {
            color: var(--light-gray);
            margin-bottom: 10px;
        }
        .error-message {
            color: var(--light-gray);
            text-align: center;
            margin-top: 15px;
            font-weight: 500;
            display: none;
        }

        .back-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-weight: 600;
            margin-top: 15px;
        }

        .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo i {
            font-size: 42px;
            color: var(--dark);
        }

        .success-message {
            color: var(--secondary);
            text-align: center;
            margin-top: 15px;
            font-weight: 500;
            display: none;
        }

        .info-box {
            background-color: #f9f1e7;
            border-left: 4px solid var(--primary);
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }

        .info-box p {
            margin: 5px 0;
            color: var(--dark);
            font-size: 14px;
        }
    </style>
</head>

<body class="animated-gradient">