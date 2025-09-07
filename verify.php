<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Certificate - INSPIRA 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
     <link rel="icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.webp">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.webp">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.webp">
    <link rel="android-chrome-icon" sizes="192x192" href="assets/img/favicon/android-chrome-192x192.webp">
    <link rel="android-chrome-icon" sizes="512x512" href="assets/img/favicon/android-chrome-512x512.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-657T267K9B"></script>
    

   <style>
     body {
            font-family: 'Poppins', sans-serif;
        }

        .animated-gradient {
            background: linear-gradient(-45deg, #541C1C, #6B2E2E, #874C1B, #541C1C);
            background-size: 600% 600%;
            animation: waveFlag 10s ease infinite;
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
        
        .glow-button {
            transition: all 0.3s ease;
            box-shadow: 0 0 5px rgba(242, 140, 26, 0.3), 0 0 10px rgba(242, 140, 26, 0.2);
        }

        .glow-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 15px rgba(242, 140, 26, 0.6), 0 0 25px rgba(242, 140, 26, 0.4);
        }

        .btn-verify {
            background-color: #874C1B;
        }

        .btn-verify:hover {
            background-color: #6e3d15;
        }

        .btn-clear {
            background-color: #541C1C;
        }

        .btn-clear:hover {
            background-color: #3d1414;
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #F28C1A;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            display: block;
            margin-top: 5px;
            right: 0;
            background: #F28C1A;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        .input-hover-effect {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-hover-effect:hover {
            border-color: #F28C1A; 
            box-shadow: 0 0 10px rgba(242, 140, 26, 0.3);
        }
   </style>
    
</head>

<body class="animated-gradient text-white overflow-x-hidden">


   
    <!-- End Header -->
    <div class="min-h-screen w-full flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8  sm:mt-28">
        <main class="w-full max-w-2xl mx-auto text-center flex flex-col items-center">

            <h1 class="text-4xl sm:text-5xl font-black uppercase tracking-wider" style="text-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                Certificate <span style="color: #F28C1A;">Verification</span>
            </h1>
            <p class="text-lg font-semibold mt-2 text-gray-300">Enter the Certificate ID to verify its authenticity.</p>

            <div class="w-full max-w-md bg-white/10 backdrop-blur-sm p-6 sm:p-8 rounded-2xl ">
                <form id="verify-form" class="flex flex-col sm:flex-row ">
                    <input type="text" id="certificate-id"
                        class="w-full bg-gray-900/50 text-white border-2 border-orange-400/50 rounded-full px-5 py-3 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:outline-none placeholder-gray-400 input-hover-effect"
                        placeholder="Enter Certificate ID (e.g., fas001)" required>
                    <button type="submit"
                        class="glow-button btn-verify text-white font-bold py-3 px-8 rounded-full flex-shrink-0">
                        Verify
                    </button>
                </form>
            </div>

            <div id="result-container" class="w-full max-w-2xl mt-10 hidden">
            </div>

        </main>
    </div>
    
    <!-- CHANGE: Removed external data file. Data is now embedded in the script below. -->
    <script>
        // This variable contains the student data in an encoded format (Base64).
        // This makes it harder for users to view or modify the data directly.
        const encodedStudentData = 'WwogIHsgCiAgICAicmVnTnVtYmVyIjogIkFTUC8yMDIvMDAxIiwgCiAgICAibmFtZSI6ICJBLkIuUy5XaXRoYW5hZ2UiLCAKICAgICJjZXJ0aWZpY2F0ZUlkIjogImZhczAwMSIgCiAgfSwKICB7IAogICAgInJlZ051bWJlciI6ICJBU1AvMjAyLzAwMiIsIAogICAgIm5hbWUiOiAiU3JpcGFsYSIsIAogICAgImNlcnRpZmljYXRlSWQiOiAiZmFzMDAyIiAKICB9LAogIHsgCiAgICAicmVnTnVtYmVyIjogIkFTUC8yMDIvMDAzIiwgCiAgICAibmFtZSI6ICJBLkIuQy4gTmFtYSIsIAogICAgImNlcnRpZmljYXRlSWQiOiAiZmFzMDAzIiAKICB9Cl0=';

        document.addEventListener('DOMContentLoaded', function() {
            // Verification logic
            const verifyForm = document.getElementById('verify-form');
            const certificateIdInput = document.getElementById('certificate-id');
            const resultContainer = document.getElementById('result-container');

            // --- SECURITY ENHANCEMENT ---
            // The 'encodedStudentData' variable is defined above.
            // We decode it from Base64 to get the original JSON string, then parse it into an object.
            // This makes it harder for people to simply read the data.
            let studentData = [];
            try {
                studentData = JSON.parse(atob(encodedStudentData));
            } catch (e) {
                console.error("Error decoding or parsing student data:", e);
                // Optionally display an error message to the user
                resultContainer.classList.remove('hidden');
                resultContainer.innerHTML = `<div class="bg-red-900/50 p-6 rounded-2xl"><h2 class="text-xl font-bold text-red-200">Error</h2><p>Could not load verification data. Please contact support.</p></div>`;
            }

            // --- VERIFY FUNCTION ---
            // Moved the core logic into a reusable function
            const performVerification = (searchId) => {
                 if (!searchId) {
                    return; 
                }

                const student = studentData.find(s => s.certificateId.toLowerCase() === searchId.toLowerCase());
                
                resultContainer.classList.remove('hidden');

                if (student) {
                    // --- SUCCESS ---
                    resultContainer.innerHTML = `
                        <div class="bg-green-900/50 backdrop-blur-sm border-2 border-green-400 p-6 rounded-2xl text-left">
                            <div class="flex items-center gap-4">
                                <i class="bi bi-patch-check-fill text-5xl text-green-300"></i>
                                <div>
                                    <h2 class="text-2xl font-bold text-green-200">Certificate Verified</h2>
                                    <p class="text-green-300">This is an authentic certificate issued by INSPIRA '25.</p>
                                </div>
                            </div>
                            <div class="mt-6 border-t border-green-400/50 pt-4 space-y-2 text-white">
                                <p><strong class="font-semibold text-gray-300 w-40 inline-block">Certificate ID:</strong> ${student.certificateId}</p>
                                <p><strong class="font-semibold text-gray-300 w-40 inline-block">Student Name:</strong> ${student.name}</p>
                                <p><strong class="font-semibold text-gray-300 w-40 inline-block">Registration No:</strong> ${student.regNumber}</p>
                                <p><strong class="font-semibold text-gray-300 w-40 inline-block">Event:</strong> INSPIRA 2025 - The Talent Show</p>
                                <p><strong class="font-semibold text-gray-300 w-40 inline-block">Organizer:</strong> English Speech Club 23/24, Faculty of Applied Science, RUSL</p>
                            </div>
                            <div class="mt-6 text-center">
                                <button id="clear-result-button" class="glow-button btn-clear text-white font-bold py-2 px-6 rounded-full">
                                    Back
                                </button>
                            </div>
                        </div>
                    `;
                } else {
                    // --- FAILURE ---
                    resultContainer.innerHTML = `
                        <div class="bg-red-900/50 backdrop-blur-sm border-2 border-red-400 p-6 rounded-2xl text-left">
                            <div class="flex items-center gap-4">
                                 <i class="bi bi-x-octagon-fill text-5xl text-red-300"></i>
                                <div>
                                    <h2 class="text-2xl font-bold text-red-200">Verification Failed</h2>
                                    <p class="text-red-300">The Certificate ID you entered is invalid or not found.</p>
                                </div>
                            </div>
                            <div class="mt-6 text-center">
                                <button id="clear-result-button" class="glow-button btn-clear text-white font-bold py-2 px-6 rounded-full">
                                    Back
                                </button>
                            </div>
                        </div>
                    `;
                }

                document.getElementById('clear-result-button').addEventListener('click', () => {
                    resultContainer.classList.add('hidden');
                    resultContainer.innerHTML = '';
                    certificateIdInput.value = '';
                    // Also clear the URL parameter if you want
                    history.pushState(null, "", window.location.pathname);
                });
            }


            // --- FORM SUBMISSION ---
            verifyForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const searchId = certificateIdInput.value.trim();
                performVerification(searchId);
            });


            // --- NEW FEATURE: INDIVIDUAL VERIFICATION LINKS ---
            // This code runs when the page loads to check for a certificate ID in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const certIdFromUrl = urlParams.get('id');

            if (certIdFromUrl) {
                // If an 'id' is found in the URL, put it in the input box and automatically verify it.
                certificateIdInput.value = certIdFromUrl;
                performVerification(certIdFromUrl);
            }
        });
    </script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/util.js"></script>
</body>

</html>

