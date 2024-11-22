function sendToWhatsApp() {
    // Get user inputs
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;

    // Create WhatsApp message
    var message = "Nom: " + name + "\nTéléphone: " + phone + "\n\nDemande de rappel";
    
    // Replace 'yourwhatsappphonenumber' with your actual WhatsApp number
    var whatsappLink = "https://wa.me/212630317838?text=" + encodeURIComponent(message);

    // Redirect to WhatsApp with the message
    window.location.href = whatsappLink;

    // Prevent form submission to avoid page reload
    return false;
  }