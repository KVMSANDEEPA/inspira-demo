// --- SCRIPT FOR LOADER ---
window.addEventListener('load', () => {
    const loader = document.getElementById('loader');
    // Add a small delay for a smoother transition
    setTimeout(() => {
        if (loader) {
            loader.classList.add('hidden');
        }
    }, 500); // 500ms delay
});

// --- SCRIPT FOR NAVIGATION TOGGLE ---
const toggleButton = document.getElementById('nav-toggle');
const mobileMenu = document.getElementById('nav-menu-mobile');
const hamburgerIcon = document.getElementById('hamburger');
const closeIcon = document.getElementById('close');

if (toggleButton && mobileMenu) {
    toggleButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        document.body.classList.toggle('mobile-menu-active');
        if (hamburgerIcon && closeIcon) {
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }
    });

    // Close menu when a link is clicked
    mobileMenu.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            mobileMenu.classList.remove('active');
            document.body.classList.remove('mobile-menu-active');
            if (hamburgerIcon && closeIcon) {
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }
    });
}

// --- SCRIPT FOR COUNTDOWN ---
const countDownDate = new Date("Oct 1, 2025 00:00:00").getTime();
const daysEl = document.getElementById("days");
const hoursEl = document.getElementById("hours");
const minutesEl = document.getElementById("minutes");
const secondsEl = document.getElementById("seconds");
const countdownContainer = document.getElementById("countdown-container");

if (daysEl && hoursEl && minutesEl && secondsEl) {
    const x = setInterval(function () {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        daysEl.innerHTML = days < 10 ? '0' + days : days;
        hoursEl.innerHTML = hours < 10 ? '0' + hours : hours;
        minutesEl.innerHTML = minutes < 10 ? '0' + minutes : minutes;
        secondsEl.innerHTML = seconds < 10 ? '0' + seconds : seconds;

        if (distance < 0) {
            clearInterval(x);
            if (countdownContainer) {
                countdownContainer.innerHTML = '<h2 class="col-span-2 sm:col-span-4 text-3xl font-bold" style="color: #F28C1A;">The Event is LIVE!</h2>';
            }
        }
    }, 1000);
}

// --- INTERACTIVE CANVAS SCRIPT ---
const canvas = document.getElementById("interactiveCanvas");
if (canvas) {
    const ctx = canvas.getContext("2d");
    let particles = [];
    let mouse = { x: 0, y: 0 };
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    function createParticle(x, y) {
        return {
            x: x,
            y: y,
            vx: (Math.random() - 0.5) * 2,
            vy: (Math.random() - 0.5) * 2,
            size: Math.random() * 5 + 2,
            color: `hsl(${Math.random() * 60 + 20}, 70%, 60%)`,
            life: 1,
            decay: Math.random() * 0.02 + 0.005,
        };
    }
    function updateParticles() {
        for (let i = particles.length - 1; i >= 0; i--) {
            const particle = particles[i];
            particle.x += particle.vx;
            particle.y += particle.vy;
            particle.life -= particle.decay;
            particle.size *= 0.98;
            if (particle.life <= 0 || particle.size <= 0.5) {
                particles.splice(i, 1);
            }
        }
    }
    function drawParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((particle) => {
            ctx.save();
            ctx.globalAlpha = particle.life;
            ctx.fillStyle = particle.color;
            ctx.beginPath();
            ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 20;
            ctx.shadowColor = particle.color;
            ctx.fill();
            ctx.restore();
        });
    }
    function animate() {
        updateParticles();
        drawParticles();
        requestAnimationFrame(animate);
    }
    canvas.addEventListener("mousemove", (e) => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
        if (Math.random() > 0.7) {
            particles.push(createParticle(mouse.x, mouse.y));
        }
    });
    canvas.addEventListener("click", (e) => {
        for (let i = 0; i < 15; i++) {
            particles.push(createParticle(e.clientX, e.clientY));
        }
    });
    window.addEventListener("resize", resizeCanvas);
    setInterval(() => {
        if (particles.length < 50) {
            particles.push(
                createParticle(
                    Math.random() * canvas.width,
                    Math.random() * canvas.height
                )
            );
        }
    }, 200);
    // Initialize
    resizeCanvas();
    animate();
    for (let i = 0; i < 20; i++) {
        particles.push(
            createParticle(
                Math.random() * window.innerWidth,
                Math.random() * window.innerHeight
            )
        );
    }
}

function goBack() {
    window.history.back();
}
