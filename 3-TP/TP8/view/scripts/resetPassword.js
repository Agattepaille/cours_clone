/*
made by @lorena
*/

document.addEventListener('DOMContentLoaded', function() {
    function validatePassword() {
        var password1 = document.getElementById('password1').value;
        var password2 = document.getElementById('password2').value;
        var errorElement1 = document.getElementById('password-error1');
        var errorElement2 = document.getElementById('password-error2');

        // Reset previous error messages
        errorElement1.innerHTML = '';
        errorElement2.innerHTML = '';

        // Check if the password meets the criteria
        if (!/[A-Z]/.test(password1)) {
            displayError1('Password must contain at least one uppercase letter.');
        }
        if (!/[a-z]/.test(password1)) {
            displayError1('Password must contain at least one lowercase letter.');
        }
        if (!/\d/.test(password1)) {
            displayError1('Password must contain at least one digit.');
        }

        if (password1 !== password2) {
            displayError2('The passwords must be identical');
        }
    }

    function displayError1(message) {
        var errorElement1 = document.getElementById('password-error1');
        var errorMessage = document.createElement('p');
        errorMessage.style.color = 'red';
        errorMessage.style.fontSize = "12px";
        errorMessage.textContent = message;
        errorElement1.appendChild(errorMessage);
    }

    function displayError2(message) {
        var errorElement2 = document.getElementById('password-error2');
        var errorMessage = document.createElement('p');
        errorMessage.style.color = 'red';
        errorMessage.style.fontSize = "12px";
        errorMessage.textContent = message;
        errorElement2.appendChild(errorMessage);
    }

    // Log that verifies if script is running
    console.log('Script is running');

    // the function is attached to the submit action of the form
    var formElement = document.getElementById('form');
    if (formElement) {
        formElement.addEventListener('submit', function(event) {
            console.log('Form is submitted');
            validatePassword(); // execute the validation of the password
            if (document.getElementById('password-error1').innerHTML !== '' || document.getElementById('password-error2').innerHTML !== '') {
                event.preventDefault(); //If form is invalid, prevent submission
            }
        });
    } else {
        console.log('Form element not found');
    }
});