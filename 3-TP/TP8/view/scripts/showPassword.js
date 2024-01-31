/*
author @dylan
*/
function togglePasswordVisibility(passwordId, eyeId) {
    var passwordInput = document.getElementById(passwordId);
    var eyeIcon = document.getElementById(eyeId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}
