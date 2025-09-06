<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Certificate - INSPIRA 2025</title>
<?php include 'assets/includes/css-links-inc.php'; ?>
    <link rel="stylesheet" href="assets/css/verify.css">
    
</head>

<body class="animated-gradient text-white overflow-x-hidden">

<?php include 'assets/includes/vheader.php'; ?>
    <div class="min-h-screen w-full flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 mt-24 sm:mt-28 pb-24">
        <main class="w-full max-w-2xl mx-auto text-center flex flex-col items-center">

            <h1 class="text-4xl sm:text-5xl font-black uppercase tracking-wider" style="text-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                Certificate <span style="color: #F28C1A;">Verification</span>
            </h1>
            <p class="text-lg font-semibold mt-2 text-gray-300">Enter the Certificate ID to verify its authenticity.</p>

            <div class="w-full max-w-md bg-white/10 backdrop-blur-sm p-6 sm:p-8 rounded-2xl mt-10">
                <form id="verify-form" class="flex flex-col sm:flex-row gap-4">
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

