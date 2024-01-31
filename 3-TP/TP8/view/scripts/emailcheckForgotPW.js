
/*
made by @lorena
*/
document.addEventListener('DOMContentLoaded', function() {
    async function validateMail() {
        var email1 = document.getElementById('mail').value;
        var email2 = document.getElementById('confirm-mail').value;
        var errorElement1 = document.getElementById('email-error');
        // Reset previous error messages
        errorElement1.innerHTML = '';

        // Check if email addresses are the same
        if (email1 !== email2) {
            displayError1('The mail addresses must be identical');
            return false; // Return false to indicate validation failure
        }

        return true; // Return true to indicate successful validation
    }

    function displayError1(message) {
        var errorElement1 = document.getElementById('email-error');
        var errorMessage = document.createElement('p');
        errorMessage.style.color = 'red';
        errorMessage.style.fontSize = '12px';
        errorMessage.textContent = message;
        errorElement1.appendChild(errorMessage);
    }

    async function doesMailExist() {
        // Get the value of the email
        var mail = document.getElementById('mail').value;
        var errorElement2 = document.getElementById('email-error1');
        errorElement2.innerHTML = '';

        try {
            const response = await fetch('../controller/checkMailExist.action.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ mail: mail }),
            });

            const data = await response.json();

            // The server returns a response in JSON format with an "exists" field
            // indicating whether the email exists or not.
            return data.exists;
        } catch (error) {
            console.error('Une erreur s\'est produite lors de la vÃ©rification de l\'e-mail:', error);
            return false;
        }
    }

    // Log that verifies if the script is running
    console.log('Script is running');

    // the function is attached to the submit action of the form
    var formElement = document.getElementById('form');
    if (formElement) {
        formElement.addEventListener('submit', async function(event) {
            console.log('Form is submitted');
            const isValid = await validateMail(); // execute the validation of the e-mail

            if (!isValid) {
                event.preventDefault(); // Prevent form submission
            } else {
                const emailExists = await doesMailExist();

                if (emailExists === false) {
                    // Display the error message directly on the page
                    displayError2('Your e-mail is not known in the database');
                    event.preventDefault(); // Prevent form submission
                    window.location.href = '../view/forgotPasswordBis.php';
                }
            }
        });
    } else {
        console.log('Form element not found');
    }

    function displayError2(message) {
        var errorElement2 = document.getElementById('email-error1');
        var errorMessage = document.createElement('p');
        errorMessage.style.color = 'red';
        errorMessage.style.fontSize = '12px';
        errorMessage.textContent = message;
        errorElement2.appendChild(errorMessage);
    }
});
