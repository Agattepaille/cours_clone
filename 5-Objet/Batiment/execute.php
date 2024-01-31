<?php
include "Maison.class.php";
//
$adresse1 = new Adresse("20 rue du Luxembourg", "Roubaix", 59000);

$maison = new Maison(3,$adresse1,200);
echo $maison -> __toString();

?>