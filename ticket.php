<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Your Ticket-INSPIRA 2025</title>

    <?php include 'assets/includes/css-links-inc.php'; ?>
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="animated-gradient text-white">
<?php include 'assets/includes/header.php'; ?>

    <main id="page-content" class="min-h-screen w-full flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8">
        
        <div id="form-container" class="w-full max-w-lg mx-auto">
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl shadow-lg">
                <h2 class="text-3xl font-bold text-center mb-2">Get Your Ticket</h2>
                <p class="text-center text-gray-300 mb-6">Enter your details to generate your ticket.</p>
                <form id="ticket-form" class="space-y-6">
                    <div>
                        <label for="regNumber" class="block mb-2 text-sm font-medium text-gray-200">Registration Number</label>
                        <input type="text" id="regNumber" name="regNumber" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="e.g., ASP/2024/000" required>
                        <p id="reg-error" class="text-red-400 text-sm mt-2 hidden"></p>
                    </div>
                    <div>
                        <label for="fullName" class="block mb-2 text-sm font-medium text-gray-200">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="Enter your full name" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-200">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input w-full px-4 py-3 rounded-lg text-white" placeholder="your.email@example.com" required>
                    </div>
                    <button type="submit" id="submit-btn" class="w-full btn-brand text-white font-bold py-3 px-5 rounded-lg text-lg">
                        <i class="bi bi-ticket-detailed-fill mr-2"></i> Get Ticket
                    </button>
                </form>
                <p style="font-style:inherit"> <br>You will receive a <b>ZOOM LINK</b> via Email.</p>
            </div>
        </div>

        <div id="ticket-container" class="w-full max-w-lg mx-auto hidden">
             <div id="ticket" class="ticket-gradient text-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-6 md:p-8">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl md:text-4xl font-black uppercase tracking-wider">INSPIRA<span class="text-orange-300">'25</span></h1>
                            <p class="text-decoration text-orange-200">English Speech Club 23/24</p>
                            <p class="text-xs text-gray-300">FAS, Rajarata University Of Sri Lanka.</p>
                        </div>
                        <div class="text-right">
                             <img src="assets/img/logo2.jpg" class="h-16 w-16 rounded-full object-cover border-2 border-orange-300 p-1" onerror="this.onerror=null;this.src='https://placehold.co/64x64/FFFFFF/541C1C?text=I25';">
                        </div>
                    </div>
                    <div class="mt-8">
                        <p class="text-gray-300 text-sm uppercase">Admittee:</p>
                        <h2 id="ticket-name" class="text-2xl font-bold"></h2>
                        <p id="ticket-reg" class="text-gray-200"></p>
                    </div>
                    <div class="mt-6 border-t-2 border-dashed border-white/20 pt-6 flex justify-between items-center">
                        <div>
                            <p class="text-gray-300 text-sm uppercase">Date & Time</p>
                            <p class="font-semibold text-lg">Oct 1, 2025 | 09:00 AM</p>
                        </div>
                         <div>
                            <p class="text-gray-300 text-sm uppercase text-right">Venue</p>
                            <p class="font-semibold text-lg text-right">ZOOM</p>
                        </div>
                    </div>
                </div>
                <div class="bg-black/20 px-6 md:px-8 py-4 flex items-center justify-between">
                    <div class="text-left">
                        <p class="text-xs text-gray-300">Ticket ID:</p>
                        <p id="ticket-id" class="font-mono text-sm"></p>
                    </div>
                    <div class="bg-white p-1 rounded-md">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=https://inspira2025web.github.io/inspiraweb" alt="QR Code for INSPIRA 2025" class="w-20 h-20">
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <button id="download-btn" class="btn-brand text-white font-bold py-3 px-8 rounded-lg text-lg">
                    <i class="bi bi-download mr-2"></i> Download Ticket
                </button>
                <button id="new-ticket-btn" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded-lg text-lg mt-4 md:mt-0 md:ml-4">
                    <i class="bi bi-arrow-left-circle mr-2"></i> Go Back
                </button>
            </div>
        </div>

    </main>
    
   <?php include 'assets/includes/footer.php'; ?>
    <?php include 'assets/includes/js-links-inc.php'; ?>
    <script src="assets/js/main.js"></script>
</body>
</html>