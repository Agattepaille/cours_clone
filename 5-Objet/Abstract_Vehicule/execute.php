<?php
include_once "Voiture.class.php";
include_once "Camion.class.php";

// instanciation d'un camion et d'une voiture
$voiture1 = new Voiture('2000',12000);
$camion1 = new Camion('2021',20000);

echo $voiture1;
echo PHP_EOL;
echo $camion1 ;
?>