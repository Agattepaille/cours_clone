document.addEventListener("DOMContentLoaded", function () {
    const postcodeInput = document.getElementById("postcode");
    const cityInput = document.getElementById("city");
    const streetInput = document.getElementById("street");
    const houseNumberInput = document.getElementById("houseNumber");
    const weatherButton = document.getElementById("weatherButton");

    // Add event listeners to postcode and city inputs
    postcodeInput.addEventListener("keyup", fetchCity);
    cityInput.addEventListener("click", fetchStreet);
    weatherButton.addEventListener("click", function (event) {
        event.preventDefault();
        getAddress(cityInput.value, streetInput.value, houseNumberInput.value);
    });

    function fetchCity() {
        const postcode = postcodeInput.value;

        // Fetch address data based on postcode
        fetch("https://api-adresse.data.gouv.fr/search/?q=" + postcode)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(response => {
                // Extract cities from response
                console.log(response);
                const cities = response.features.map(feature => feature.properties.city);
                // Update the city dropdown with the fetched cities
                updateCitiesDropdown(cities);
            })
            .catch(error => {
                console.error("Fetch error:", error);
                // Handle errors
            });
    }

    function fetchStreet() {
        const postcode = postcodeInput.value;
        const city = cityInput.value;

        // Fetch address data based on city
        fetch("https://api-adresse.data.gouv.fr/search/?q=" + postcode + "%10" + city + "&type=street&limit=100")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(response => {
                // Extract streets from response
                console.log(response);
                const streets = response.features.map(feature => feature.properties.name);
                // Update the street dropdown with the fetched streets
                updateStreetsDropdown(streets);
            })
            .catch(error => {
                console.error("Fetch error:", error);
                // Handle errors
            });
    }

    function updateCitiesDropdown(cities) {
        const cityDropdown = document.getElementById("city");
        // Clear previous options from the city dropdown
        cityDropdown.innerHTML = '<option value="">Select a city</option>';
        // Remove duplicate cities
        cities = [...new Set(cities)];
        // Sort cities alphabetically
        cities.sort();
        // Add new options based on the fetched cities
        cities.forEach(city => {
            const option = document.createElement("option");
            option.value = city;
            option.textContent = city;
            cityDropdown.appendChild(option);
        });
    }

    function updateStreetsDropdown(streets) {
        const streetDropdown = document.getElementById("street");
        // Clear previous options from the street dropdown
        streetDropdown.innerHTML = '<option value="">Select a street</option>';
        // Sort streets alphabetically
        streets.sort();
        // Add new options based on the fetched streets
        streets.forEach(street => {
            const option = document.createElement("option");
            option.value = street;
            option.textContent = street;
            streetDropdown.appendChild(option);
        });
    }

    function getAddress(cityInput, streetInput, houseNumberInput) {
        fetch("https://api-adresse.data.gouv.fr/search/?q=" + houseNumberInput + streetInput + cityInput)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(response => {
                // Extract streets from response
                console.log(response.features[0].geometry.coordinates);
                const lat = response.features[0].geometry.coordinates[0];
                const lon = response.features[0].geometry.coordinates[1];
                // Call fetchWeather with coordinates
                fetchWeather(lat, lon);

            })
            .catch(error => {
                console.error("Fetch error:", error);
                // Handle errors
            });
    }

    function fetchWeather(lat, lon) {
        let url = "https://api.openweathermap.org/data/2.5/weather?lat=" + lon + "&lon=" + lat + "&appid=c5edf9ca0173ef5c7781a8ad39e3da94&units=metric&lang=fr";
        fetch(url, { method: 'GET' })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            }).then(response => {
                console.log(response);
                const weatherCard = document.getElementById("weatherCard");
                const temperature = document.createElement("p");
                const weather = document.createElement("p");
                // Set the text content of the weather paragraphs and icon
                var iconCode = response.weather[0].icon;
                var iconurl = "https://openweathermap.org/img/wn/" + iconCode + "@4x.png";
                temperature.textContent = "Température : " + response.main.temp + "°C";
                weather.textContent = "Météo : " + response.weather[0].description;
                // Add new options based on the fetched weather data
                document.getElementById("weatherIcon").src = iconurl;
                weatherCard.appendChild(temperature);
                weatherCard.appendChild(weather);
            }).catch(error => {
                console.error("Fetch error:", error);
                // Handle errors
            });

    }
});
