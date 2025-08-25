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
if (section) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                section.classList.add('visible');
            }
        });
    }, { threshold: 0.2 });

    observer.observe(section);
}

// --- CONTACT FORM SCRIPT ---
const form = document.getElementById("contact-form");
const status = document.getElementById("form-status");

if (form) {
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
}
