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

if (ticketForm) {
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
                    if (data.result !== 'success') {
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
}

if (downloadBtn) {
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
}

if (newTicketBtn) {
    newTicketBtn.addEventListener('click', function () {
        ticketForm.reset();
        regError.classList.add('hidden');
        ticketContainer.classList.add('hidden');
        formContainer.classList.remove('hidden');
    });
}
