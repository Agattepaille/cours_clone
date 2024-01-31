// Fonction avec un callback
function effectuerApresDelai(callback) {
    console.log("Début de l'opération");

    // Simule une opération prenant du temps
    setTimeout(function() {
        console.log("Opération terminée après délai");
        // Appelle le callback après le délai
        callback();
    }, 2000); // Délai de 2000 millisecondes (2 secondes)
}

// Utilisation de la fonction avec une fonction anonyme comme callback
effectuerApresDelai(function() {
    console.log("Callback exécuté !");
});