// Promise Maker
function getWeather() {
    return new Promise(function (resolve, reject) {
        // Simulation d'une requête HTTP asynchrone avec fetch
        fetch('https://api.example.com/weather')
            .then(response => response.json())
            .then(data => {
                // Résolution de la promesse avec les données obtenues
                resolve(data.weather);
            })
            .catch(error => {
                // Rejet de la promesse en cas d'erreur
                reject('Error fetching weather: ' + error);
            });
    });
}

function onSuccess(data) {
    console.log('success' + data);
}

function onError(error) {
    console.log('error' + error);
}

// Promise Receiver
getWeather()
    .then(onSuccess, onError);
//.then(getWeatherIcon)
//.then(displayWeatherIcon)
//.catch(onError)
