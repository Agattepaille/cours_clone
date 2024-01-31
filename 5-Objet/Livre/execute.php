<?php
include "Livre.class.php";

$titre = "La horde du contrevent";
$auteur = "Alain Damasio";
$prix = 12.5;
$livre1 = new Livre($titre, $auteur, $prix);
$livre1->afficher();
echo "\n";


$livre2 = new Livre("Les mondes d'Ewilan", "Pierre Bottero", 14.5);
$livre2->afficher();
echo "\n";



