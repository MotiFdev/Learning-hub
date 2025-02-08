import "./bootstrap";
// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
    // Get the button element
    const toggleBtn = document.getElementById("toggleBtn");

    // Add click event listener
    toggleBtn.addEventListener("click", function () {
        const input = this.previousElementSibling;
        const icon = this.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
});
