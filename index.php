
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPIRA 2025 - The Talent Show</title>

    <?php include 'assets/includes/css-links-inc.php'; ?>
   <!-- Custom Styles -->
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="animated-gradient text-white overflow-x-hidden">

    <?php include 'assets/includes/header.php'; ?>


    <div class="min-h-screen w-full flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 pt-32 sm:pt-40 pb-24" style="padding-top: 150px !important;">

        <main class="w-full max-w-4xl mx-auto text-center flex flex-col items-center">

            <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-black uppercase tracking-wider fade-in-up-2"
                style="text-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                INSPIRA <span style="color: #F28C1A;">2025</span>
            </h1>
            <p class="text-xl sm:text-2xl font-semibold mt-2 text-gray-300 fade-in-up-3">Born to Perform, Inspired
                to&nbsp;Shine</p>

            <div class="mt-4 text-sm sm:text-base text-gray-400 fade-in-up-4">
                <p>Organized by the English Speech Club 23/24</p>
                <p>Faculty of Applied Science, Rajarata University of Sri Lanka</p>
            </div>
            
            <div class="mt-8">
                <a href="ticket.html" target="_self" class="glow-button flex items-center gap-2 btn-zoom text-white font-bold py-2 px-5 rounded-full">
                <i class="bi bi-ticket-detailed-fill"></i>
                <p>Get Your Ticket</p>
                </a>
            </div>
            
            <div id="countdown-container" class="w-full max-w-2xl my-12 sm:my-16 fade-in-up-5">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg">
                        <div id="days" class="text-4xl md:text-5xl font-bold timer-text">00</div>
                        <div class="text-xs md:text-sm uppercase text-gray-300">Days</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg">
                        <div id="hours" class="text-4xl md:text-5xl font-bold timer-text">00</div>
                        <div class="text-xs md:text-sm uppercase text-gray-300">Hours</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg">
                        <div id="minutes" class="text-4xl md:text-5xl font-bold timer-text">00</div>
                        <div class="text-xs md:text-sm uppercase text-gray-300">Minutes</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg">
                        <div id="seconds" class="text-4xl md:text-5xl font-bold timer-text">00</div>
                        <div class="text-xs md:text-sm uppercase text-gray-300">Seconds</div>
                    </div>
                </div>
            </div>
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-wider fade-in-up-2"
                style="text-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                Stay Tuned!
            </h1>
            
            <div class="fade-in-up-5 mt-6">
                <div class="flex flex-wrap justify-center items-center gap-4">
                    <a href="https://youtu.be/2VAp-FvQ9as" target="_blank"
                        class="glow-button flex items-center gap-2 btn-youtube text-white font-bold py-2 px-5 rounded-full">
                        <i class="bi bi-youtube"></i>
                        Watch Trailer On YouTube 
                    </a>
                </div>
            </div>
            
        </main>
        
    </div>

    <?php include 'assets/includes/footer.php'; ?>
    <canvas id="interactiveCanvas" class="fixed top-0 left-0 w-full h-full pointer-events-none z-0"></canvas>
  
<script src="assets/js/main.js"></script>
</body>

</html>