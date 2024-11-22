
const whatsappIcon = document.querySelector('#whatsapp-icon');

whatsappIcon.addEventListener('click', () => {
if (window.scrollY > 0) {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
});

