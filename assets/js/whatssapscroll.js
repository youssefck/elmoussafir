let isChatboxVisible = false;
const chatbox = document.querySelector(".WA_Chat_Widget .WA_ChatBox");
const overlay = document.createElement("div");

// Add overlay for better focus
overlay.className = "overlay";
document.body.appendChild(overlay);

function hideChatbox() {
    isChatboxVisible = false;
    chatbox.style.display = "none";
    overlay.style.display = "none"; // Hide overlay
}

function toggleChatbox() {
    isChatboxVisible = !isChatboxVisible;
    chatbox.style.display = isChatboxVisible ? "block" : "none";
    overlay.style.display = isChatboxVisible ? "block" : "none"; // Show/hide overlay
}
