// Promise Maker
function getPokemon() {
    return new Promise(function (resolve, reject) {
        // Simulation d'une requête HTTP asynchrone avec fetch
        fetch('https://pokeapi.co/api/v2/pokemon-form/5')
            .then(response => response.json())
            .then(response => {
                // Résolution de la promesse avec les données obtenues
                resolve(response.pokemon.name);
            })
            .catch(error => {
                reject('Failed to fetch Pokemon data');
            });
    });
}

function onSuccess(data) {
    console.log('success ' + data);
}

function onError(error) {
    console.log('error ' + error);
}

// Promise Receiver
getPokemon()
    .then(onSuccess)
    //.then(getPokemonImage)
    //.then(displayPokemonImage)
    .catch(onError)

