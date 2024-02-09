document.addEventListener("DOMContentLoaded", () => {
    const postcodeInput = document.getElementById("postcode");
    const cityInput = document.getElementById("city");
    const streetInput = document.getElementById("street");
    const houseNumberInput = document.getElementById("houseNumber");
    const weatherButton = document.getElementById("weatherButton");

    postcodeInput.addEventListener("keyup", () => fetchAddress(postcodeInput.value));
    cityInput.addEventListener("change", fetchAddress);
    streetInput.addEventListener("change", fetchAddress);
    weatherButton.addEventListener("click", fetchWeather);

    function fetchAddress(postcode, city) {
        const url = `https://api-adresse.data.gouv.fr/search/?q=${postcode}${city ? "%20" + city : ""}&limit=5`;
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(response => {
                const streets = response.features.map(feature => feature.properties.name);
                updateStreetsDropdown(streets);
            })
            .catch(error => console.error("Fetch error:", error));
    }

    function fetchWeather() {
        const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=c5edf9ca0173ef5c7781a8ad39e3da94&units=metric&lang=fr`;
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(response => {
                console.log(response);
                const weatherCard = document.getElementById("weatherCard");
                const weatherText = document.createElement("p");
                weatherText.textContent = `Temperature: ${response.main.temp}°C, Weather: ${response.weather[0].description}`;
                weatherCard.innerHTML = '';
                weatherCard.appendChild(weatherText);
            })
            .catch(error => console.error("Fetch error:", error));
    }

    function updateCitiesDropdown(cities) {
        const cityDropdown = document.getElementById("city");
        cityDropdown.innerHTML = '<option value="">Select a city</option>';
        cities.forEach(city => {
            const option = document.createElement("option");
            option.value = city;
            option.textContent = city;
            cityDropdown.appendChild(option);
        });
    }

    function updateStreetsDropdown(streets) {
        const streetDropdown = document.getElementById("street");
        streetDropdown.innerHTML = '<option value="">Select a street</option>';
        streets.forEach(street => {
            const option = document.createElement("option");
            option.value = street;
            option.textContent = street;
            streetDropdown.appendChild(option);
        });
    }
});
