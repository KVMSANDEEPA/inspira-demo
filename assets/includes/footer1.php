</div> <!-- close container -->

<script>
async function login() {
    const indexNumber = document.getElementById('index-number').value.trim();
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    errorMessage.style.display = 'none';

    const response = await fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ indexNumber, password })
    });

    const result = await response.json();

    if (result.success) {
        document.getElementById('welcome-message').textContent = `Welcome, ${indexNumber}!`;

        if (result.image) {
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
        } else {
            document.getElementById('profile-pic').src = "https://via.placeholder.com/200?text=No+Photo";
        }

        document.getElementById('login-container').style.display = 'none';
        document.getElementById('result-container').style.display = 'block';
    } else {
        errorMessage.textContent = "Invalid index number or password. Please try again.";
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
