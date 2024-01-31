<?php
$data = file_get_contents('https://api.meteo-concept.com/api/forecast/nextHours?token=3a6cfe2f78bb80db550a3ee770b331dc4cf20d9b243c7ee45b4b39dbaaedeeda&insee=59512');

if ($data !== false) {
	$forecast = json_decode($data)->forecast;
	$city = json_decode($data)->city;

    // Utiliser les donnÃ©es pour afficher le texte dynamique
    $cityName = $city->name;
    $temperature = $forecast[0]->temp2m;
    $windSpeed = $forecast[0]->wind10m;
    $probabilityOfRain = $forecast[0]->probarain;

}
