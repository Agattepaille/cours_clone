/*
Made by @Lorena
 */

document.addEventListener('DOMContentLoaded', function () {
function validateEmail() {
    console.log('Validating email');
    var form = document.getElementById("form");
    var email = document.getElementById('mail');
    var emailtrim = email.value.trim();
    var text = document.getElementById('text-error');
    // Reset previous error message
    text.innerHTML = '';
    //initiate the pattern we want for e-mail
    var pattern = /^[^\s@]+@[^\s@]+\.[a-z]{2,3}$/;

    if (pattern.test(emailtrim)) {
        form.classList.add("valid");
        form.classList.remove("invalid");
    } else {
        form.classList.remove("valid");
        form.classList.add("invalid");
        text.innerHTML = "Please enter a valid email address.";
        text.style.color = "#ff0000";
        text.style.fontSize = "12px";
        email.style.outline = '1px solid red';
    }
    if (emailtrim === "") {
        form.classList.add("valid");
        form.classList.remove("invalid");
        text.innerHTML = "";
        text.style.color = "#00ff00";
    }
}

console.log('Script is running');


    // Select form by ID
    var form = document.getElementById('form');
    if (form ) {
        // Event handler for form submit event
        form.addEventListener('submit', function (event) {
            console.log('Form submitted');
            // Calling the validation function
            validateEmail();
            if (form.classList.contains("invalid")) {
                //If form is invalid, prevent submission
                event.preventDefault();
            }
        });
    } else {
        console.log('Form element not found');
    }

});


