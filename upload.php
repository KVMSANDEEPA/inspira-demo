<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-BEGR0739BZ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-BEGR0739BZ');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>

  <!-- Tailwind CSS for styling -->
  <?php include 'assets/includes/css-links-inc.php'; ?>
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    .form-container {
      width: 100%;
      max-width: 900px; /* Optional: constrain form width on large screens */
      margin: auto;
      /* border: 1px solid #ddd; */
      border-radius: 8px;
      overflow: hidden; /* Ensures clean look if fallback is needed */
      background: rgba(194, 194, 194, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
    }

    iframe {
      width: 100%;
      height: 530px; /* Fallback height */
      border: none;
      display: block;
    }
    .section-title{
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #FFA500; /* Orange color */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
    }
</style>
</head>

<body class="animated-gradient text-white overflow-x-hidden">

  <!-- Main Content Container -->
<?php include 'assets/includes/uheader.php'; ?>
  <main class="w-full max-w-2xl mx-auto text-center flex flex-col items-center fade-in mt-3 mb-3">
<h1 class="section-title">Please fill out the Form</h1>
    <div class="form-container">
      <iframe id="googleForm"
        src="https://docs.google.com/forms/d/e/1FAIpQLSetEqRCaN_Sc2h8R3fleF4Ozd5DUfvae1Y9z6x3Ch7CmnHGpA/viewform?embedded=true"
        allowfullscreen width="640" height="560" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </div>

  </main>
 <script>
    (function () {
      const iframe = document.getElementById("googleForm");

      function adjustIframeHeight() {
        try {
          const doc = iframe.contentDocument || iframe.contentWindow.document;
          const height = Math.max(
            doc.body.scrollHeight,
            doc.documentElement.scrollHeight
          );
          iframe.style.height = height + "px";
        } catch (err) {
          console.warn(
            "Could not auto-resize iframe due to cross-origin policies. Using fallback height."
          );
        }
      }

      iframe.addEventListener("load", adjustIframeHeight);
      window.addEventListener("resize", adjustIframeHeight);
    })();
  </script>
 <?php include 'assets/includes/footer.php'; ?>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/util.js"></script>

</body>

</html>