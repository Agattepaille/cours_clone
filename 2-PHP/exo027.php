<?php 
/*
Exercice 1 : Affichage d'un tableau en 2D
Description : Écrivez un script PHP qui utilise une double boucle pour afficher un tableau en 2D sous forme de tableau .

*/

$tab2D = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

$newTab = array();

foreach ($tab2D as $tab) {
    foreach ($tab as $number) {
        $newTab[] = $number;
        echo $number; 
    }
echo PHP_EOL;
}

?>