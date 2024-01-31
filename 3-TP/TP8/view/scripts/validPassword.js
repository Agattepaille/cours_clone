//@Author Abdelkarim
//Bad password Prevention
if (typeof errorMessage !== 'errorMessage') {
    document.addEventListener('DOMContentLoaded', function() {
        var errorContainer = document.createElement('div');
        errorContainer.className = 'error-message';
        errorContainer.textContent = errorMessage;
        errorContainer.style.color = 'red';
        errorContainer.style.fontSize = "12px"; 
        document.body.appendChild(errorContainer);
        
        var passwordInput = document.querySelector('input[name="password"]');
        
        // Ajouter la classe "temp" à l'élément input de la classe "password"
        passwordInput.classList.add('temp');
        
        passwordInput.parentNode.insertBefore(errorContainer, passwordInput.nextSibling);
        passwordInput.style.color = 'red';
        passwordInput.style.fontSize = "12px"; 
        passwordInput.style.outline = '1px solid red';
        passwordInput.style.width = '98%'
    });
}
