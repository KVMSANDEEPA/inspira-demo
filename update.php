<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BEGR0739BZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BEGR0739BZ');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Soon! - INSPIRA 2025</title>
    
    <!-- Tailwind CSS for styling -->
<?php include 'assets/includes/css-links-inc.php'; ?>    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="animated-gradient text-white overflow-x-hidden">

    <!-- Main Content Container -->
    <div class="min-h-screen w-full flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8">
        
        <main class="w-full max-w-2xl mx-auto text-center flex flex-col items-center fade-in">

            <!-- Logo -->
            <div class="mb-8">
                 <img src="assets/img/logo2.jpg" alt="Site Logo" class="h-24 w-24 rounded-full object-cover border-4 border-orange-400 p-1">
            </div>

            <!-- Message -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black uppercase tracking-wider" style="text-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                Update <span style="color: #F28C1A;">Soon!</span>
            </h1>
            <p class="text-lg sm:text-xl font-semibold mt-4 text-gray-300">
                We are working hard to bring you this content. Please check back later.
            </p>
            
            <!-- Go Back Button -->
            <div class="mt-12">
                <button onclick="goBack()" class="glow-button flex items-center gap-2 bg-[#874C1B] hover:bg-[#6e3d15] text-white font-bold py-3 px-8 rounded-full text-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Go Back
                </button>
            </div>

        </main>
    </div>

    <script>
        // Function to go back to the previous page in history
        function goBack() {
            window.history.back();
        }
    </script>
<script>
// Disable right-click
window.addEventListener('contextmenu', function (e) {
  e.preventDefault();
  alert("Came here to Inspect, huh? You little sneaky thief! 🚫");
}, false);

// Disable shortcuts
window.addEventListener('keydown', function (e) {
  if (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "J")) {
    e.preventDefault();
  }
  if (e.ctrlKey && e.key.toLowerCase() === "u") {
    e.preventDefault();
  }
});

// Detect DevTools (works for F12 too)
(function() {
  let devtools = /./;
  devtools.toString = function() {
    // alert("Developer Tools detected! 🚨 No sneaky peeking allowed.");
    // Optional: redirect or close page
    // window.location.href = "about:blank";
  };
  console.log('%c', devtools);
})();
</script>

</body>
</html>
