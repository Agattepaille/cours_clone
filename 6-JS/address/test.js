function fetchAddress() {
    return new Promise(function (resolve, reject) {
        // Simulation d'une requête HTTP asynchrone avec fetch
        fetch("https://api-adresse.data.gouv.fr/search/?q=")
            .then(response => response.json())
            .then(response => {
                // Résolution de la promesse avec les données obtenues
                resolve(response.);
            })
            .catch(error => {
                reject('Failed to fetch data');
            });
    });
}