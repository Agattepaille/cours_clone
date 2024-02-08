document.addEventListener("DOMContentLoaded", function () {
    const postcodeInput = document.getElementById("postcode");
    const cityInput = document.getElementById("city");
    //const streetInput = document.getElementById("street");

    // Add event listeners to postcode and city inputs
    postcodeInput.addEventListener("change", fetchCity);
    cityInput.addEventListener("change", fetchStreet);

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
                const cities = response.features.map(feature => feature.properties.label);

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
        fetch("https://api-adresse.data.gouv.fr/search/?q=" + postcode + "%10" + city + "&type=street&autocomplete=1")
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

        // Add new options based on the fetched streets
        streets.forEach(street => {
            const option = document.createElement("option");
            option.value = street;
            option.textContent = street;
            streetDropdown.appendChild(option);
        });
    }
});
