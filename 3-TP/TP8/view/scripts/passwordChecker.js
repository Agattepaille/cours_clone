/*
made by @dylan
*/

document.addEventListener('DOMContentLoaded', function() {
    function validatePassword() {
        var password = document.getElementById('password').value;
        var errorElement = document.getElementById('password-error');

        // Reset previous error message
        errorElement.innerHTML = '';

        // Check if the password meets the criteria
        if (!/[A-Z]/.test(password)) {
            displayError('Password must contain at least one uppercase letter.');
        }
        if (!/[a-z]/.test(password)) {
            displayError('Password must contain at least one lowercase letter.');
        }
        if (!/\d/.test(password)) {
            displayError('Password must contain at least one digit.');
        }
    }

    function displayError(message) {
        var errorElement = document.getElementById('password-error');
        var errorMessage = document.createElement('p');
        var passwordInput = document.querySelector('input[name="password"]');
        errorMessage.style.color = 'red';
        errorMessage.style.fontSize = "12px";
        passwordInput.style.outline = '1px solid red';
        errorMessage.textContent = message;
        errorElement.appendChild(errorMessage);
    }

    // Log pour vérifier si le script est exécuté
    console.log('Script is running');

    // Attachez la fonction validatePassword à l'événement 'submit' du formulaire
    var formElement = document.getElementById('form');
    if (formElement) {
        formElement.addEventListener('submit', function(event) {
            console.log('Form is submitted');
            validatePassword(); // Exécute la validation du mot de passe
            if (document.getElementById('password-error').innerHTML !== '') {
                event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
            }
        });
    } else {
        console.log('Form element not found');
    }
});
