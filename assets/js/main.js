
  const toggleButton = document.getElementById('nav-toggle');
  const mobileMenu = document.getElementById('nav-menu-mobile');
  const hamburgerIcon = document.getElementById('hamburger');
  const closeIcon = document.getElementById('close');

  toggleButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    hamburgerIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
  });


    
        // --- SCRIPT FOR LOADER ---
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            // Add a small delay for a smoother transition
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 500); // 500ms delay
        });

        // --- SCRIPT FOR COUNTDOWN ---
        const countDownDate = new Date("Oct 1, 2025 00:00:00").getTime();
        const daysEl = document.getElementById("days");
        const hoursEl = document.getElementById("hours");
        const minutesEl = document.getElementById("minutes");
        const secondsEl = document.getElementById("seconds");
        const countdownContainer = document.getElementById("countdown-container");

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
                countdownContainer.innerHTML = '<h2 class="col-span-2 sm:col-span-4 text-3xl font-bold" style="color: #F28C1A;">The Event is LIVE!</h2>';
            }
        }, 1000);
        
        // Interactive Canvas
        const canvas = document.getElementById("interactiveCanvas");
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
     // ✅ Swiper initialization with autoplay
        const swiper = new Swiper('.slider-wrapper', {
            loop: true,
            grabCursor: true,
            spaceBetween: 25,

            autoplay: {
                delay: 2500, // Slide every 2.5s
                disableOnInteraction: false, // Keep autoplay after manual swipe
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
          // ✅ Scroll animation trigger
        const section = document.querySelector('.member-section');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    section.classList.add('visible');
                }
            });
        }, { threshold: 0.2 });

        observer.observe(section);
          // --- CONTACT FORM SCRIPT ---
        const form = document.getElementById("contact-form");
        const status = document.getElementById("form-status");

        async function handleSubmit(event) {
            event.preventDefault();
            const data = new FormData(event.target);

            try {
                const response = await fetch(event.target.action, {
                    method: form.method,
                    body: data,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    status.innerHTML = "Thanks for your message!";
                    status.style.color = "#4CAF50"; // Green for success
                    form.reset();
                } else {
                    const responseData = await response.json();
                    if (Object.hasOwn(responseData, 'errors')) {
                        status.innerHTML = responseData["errors"].map(error => error["message"]).join(", ");
                    } else {
                        status.innerHTML = "Oops! There was a problem submitting your form.";
                    }
                    status.style.color = "red";
                }
            } catch (error) {
                status.innerHTML = "Oops! There was a network error.";
                status.style.color = "red";
            }
        }
        form.addEventListener("submit", handleSubmit);

        // ticket page script
        // IMPORTANT: Replace this URL with your new Google Apps Script URL from Step 3
const formActionUrl = 'https://script.google.com/macros/s/AKfycbythAbAGB9KL_Y5jcQDMYZaVzCClPRKu7QLec54fBEDs1YlJ_A4Nexq0F73M0Xo1d0p/exec';

const ticketForm = document.getElementById('ticket-form');
const formContainer = document.getElementById('form-container');
const ticketContainer = document.getElementById('ticket-container');
const downloadBtn = document.getElementById('download-btn');
const newTicketBtn = document.getElementById('new-ticket-btn');
const submitBtn = document.getElementById('submit-btn');
const regError = document.getElementById('reg-error');

function validateRegNumber(regNumber) {
    const upperRegNumber = regNumber.toUpperCase();
    const parts = upperRegNumber.split('/');

    if (parts.length !== 3) return false;

    const [prefix, year, numStr] = parts;
    const num = parseInt(numStr, 10);

    if (year !== '2024' || isNaN(num)) return false;

    const ranges = {
        'ASB': 146,
        'ASP': 121,
        'HPT': 59,
        'ICT': 143
    };

    if (prefix in ranges && num >= 0 && num <= ranges[prefix]) {
        return true;
    }

    return false;
}

ticketForm.addEventListener('submit', function (e) {
    e.preventDefault();
    regError.classList.add('hidden');

    const regNumberInput = document.getElementById('regNumber');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    
    const regNumber = regNumberInput.value.trim();
    const fullName = fullNameInput.value.trim();
    const email = emailInput.value.trim();

    if (!validateRegNumber(regNumber)) {
        regError.textContent = 'Invalid Registration Number. Please check and try again.';
        regError.classList.remove('hidden');
        return;
    }
    
    if (!fullName || !email) {
        alert('Please fill in all fields.');
        return;
    }

    // Disable button to prevent multiple submissions
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="bi bi-hourglass-split mr-2"></i> Generating...';

    // Populate the ticket with user data
    document.getElementById('ticket-name').textContent = fullName;
    document.getElementById('ticket-reg').textContent = regNumber;
    const ticketId = 'INSP25-' + Date.now().toString().slice(-6);
    document.getElementById('ticket-id').textContent = ticketId;

    // Hide form, show ticket
    formContainer.classList.add('hidden');
    ticketContainer.classList.remove('hidden');

    // Generate ticket image and send data
    const ticketElement = document.getElementById('ticket');
    html2canvas(ticketElement, { scale: 2, useCORS: true }).then(canvas => {
        const imageDataUrl = canvas.toDataURL('image/jpeg', 0.98);

        const payload = {
            regNumber: regNumber,
            fullName: fullName,
            email: email,
            ticketId: ticketId,
            imageData: imageDataUrl
        };

        fetch(formActionUrl, {
            method: 'POST',
            body: JSON.stringify(payload),
            headers: {
                'Content-Type': 'text/plain;charset=utf-8', // Required
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
             if(data.result !== 'success') {
                alert('There was an error sending your ticket via email, Go back and enter valid Email.');
            }
        })
        .catch(error => {
            console.error('Error submitting form data:', error);
            alert('Back again and please enter valid Email Address.');
        })
        .finally(() => {
             // Re-enable button
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="bi bi-ticket-detailed-fill mr-2"></i> Get Ticket';
        });
    });
});

downloadBtn.addEventListener('click', function () {
    const ticketElement = document.getElementById('ticket');
    const studentName = document.getElementById('fullName').value.replace(/ /g, '_');
    const regNumber = document.getElementById('regNumber').value.replace(/\//g, '-');
    
    html2canvas(ticketElement, { scale: 2, useCORS: true }).then(canvas => {
        const dataURL = canvas.toDataURL('image/jpeg', 0.98);
        const downloadLink = document.createElement('a');
        downloadLink.href = dataURL;
        downloadLink.download = `INSPIRA'25_Ticket_${regNumber}_${studentName}.jpg`;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    });
});

newTicketBtn.addEventListener('click', function() {
    ticketForm.reset();
    regError.classList.add('hidden');
    ticketContainer.classList.add('hidden');
    formContainer.classList.remove('hidden');
});