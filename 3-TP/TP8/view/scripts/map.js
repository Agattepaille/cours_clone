/*
made by @Amelie
*/

// sets map location
const lat = 50.69093322753906;
const lng = 3.1560921669006348;
// creates map
var map = L.map('map').setView([lat, lng], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// marker
var marker = L.marker([lat,lng]).addTo(map);
// creates popup & popup content
var popupContent = "AFPA<br/>20 rue du Luxembourg<br/>59100 Roubaix";
var popup = L.popup().setContent(popupContent);
marker.bindPopup(popup);
// Event on click
marker.on('click', function () {
    marker.openPopup();
});
