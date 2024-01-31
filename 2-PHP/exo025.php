<?php 
/*
Exercice 5 : Recherche d'un élément dans un tableau
Description : Écrivez un script PHP qui prend un tableau de nombres 
et un nombre à rechercher en entrée, puis utilise la fonction native in_array() 
pour déterminer si le nombre se trouve dans le tableau. Affichez un message approprié.
*/

$haystack = array(5, 10, 8, 6, 25);
$needle = 26;

$result = in_array($needle, $haystack);
if ($result == true) {
    echo "le nombre $needle est dans le tableau";
} else {
    echo "le nombre $needle n'est pas dans le tableau";
}


?>