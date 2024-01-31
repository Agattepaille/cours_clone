<?php 
/*
Exercice 1 : Créez une fonction nommée "calculerCarre" qui prend un nombre en entrée et renvoie le carré de ce nombre.
// Exemple d'utilisation :
$resultat = calculerCarre(5); // Renvoie 25
*/

function calculerCarre(int $val): int {
    $carre = $val * $val;
    return $carre;
}
echo calculerCarre(5); // Renvoie 25

?>