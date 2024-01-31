<?php 
/*
Exercice 7 : Conversion de date en format lisible
Description : Écrivez un script PHP qui prend une date au format "Y-m-d" en entrée 
et utilise la fonction native date() pour convertir la date en un format lisible, puis l'affiche.
*/

$today = " ";
function displayDate($today): string{
    $today = date('l jS \of F Y h:i:s A');
    return $today;
}
echo displayDate($today);


?>