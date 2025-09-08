</div> <!-- close container -->

<script>
    async function login() {
        const indexNumber = document.getElementById('index-number').value.trim();
        const password = document.getElementById('password').value;
        const errorMessage = document.getElementById('error-message');

        errorMessage.style.display = 'none';

        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                indexNumber,
                password
            })
        });

        const result = await response.json();

        if (result.success) {
            // ✅ Show result if photo exists
            document.getElementById('welcome-message').textContent = `Welcome, ${indexNumber}!`;
            document.getElementById('profile-pic').src = result.image;

            const downloadLink = document.getElementById('download-link');
            downloadLink.href = result.image;
            downloadLink.download = `${indexNumber}_profile_picture.jpg`;
            downloadLink.onclick = function() {
                document.getElementById('success-message').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('success-message').style.display = 'none';
                }, 3000);
            };

            document.getElementById('login-container').style.display = 'none';
            document.getElementById('result-container').style.display = 'block';

        } else {
            // ❌ Invalid login
            if (result.reason === "invalid_credentials") {
                errorMessage.innerHTML = `
        <i class="fas fa-exclamation-circle"></i> 
        Invalid Student Registration number or password. Please try again.
        <br><br>
        <a href="https://wa.me/94763279285?text=Hello%20Malith%2C%20my%20account%20is%20not%20working.%20Could%20you%20please%20help%20me%20resolve%20this%20issue%3F%20Thank%20you." target="_blank" class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i> Contact on WhatsApp
        </a>
    `;
            }

            // ⚠️ Valid login, missing photo
            if (result.reason === "missing_photo") {
                errorMessage.innerHTML = `
        <i class="fas fa-exclamation-circle"></i> 
        Hello <b>${result.index}</b>, your account is valid but your profile picture is missing.
        <br><br>
        <a href="https://wa.me/94771365944?text="Hello%20Janith%2C%20my%20DP%20has%20not%20been%20created.%20My%20registration%20number%20is%20ASB%2F2024%2F123.%20Please%20assist%20me."${result.index}" 
           target="_blank" class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i> Contact on WhatsApp
        </a>
    `;
            }
            errorMessage.style.display = 'block';
        }
    }

    function goBack() {
        document.getElementById('index-number').value = '';
        document.getElementById('password').value = '';
        document.getElementById('success-message').style.display = 'none';
        document.getElementById('login-container').style.display = 'block';
        document.getElementById('result-container').style.display = 'none';
    }

    // Press Enter to submit
    document.getElementById('password').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') login();
    });
</script>
</body>

</html>