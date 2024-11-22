const form = document.getElementById('contactForm');

    form.addEventListener('submit', async (event) => {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(form); // Gather form data
        const response = await fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            // Redirect to your custom "Thank You" page
            window.location.href = 'thankyou.html';
        } else {
            alert('Une erreur est survenue. Veuillez réessayer plus tard.');
        }});