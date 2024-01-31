<?php
include "Livre.class.php";

$titre = "La horde du contrevent";
$auteur = "Alain Damasio";
$prix = 12.5;
$livre1 = new Livre($titre, $auteur, $prix);
echo $livre1->afficher();

print_r($livre1);

$livre2 = new Livre("Les mondes d'Ewilan", "Pierre Bottero", 14.5);
echo $livre2->afficher();
echo "\n";



