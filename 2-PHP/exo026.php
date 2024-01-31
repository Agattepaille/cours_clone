<?php 
/*
Exercice 3 : Multiplication de deux tableaux
Description : Écrivez un script PHP qui utilise une double boucle pour multiplier chaque élément 
d'un tableau par chaque élément d'un autre tableau, puis affichez les résultats.
$tableau1 = [1, 2, 3];
$tableau2 = [4, 5, 6];
*/

$tableau1 = [1, 2, 3];
$tableau2 = [4, 5, 6];
$m = array();
 
for ($i = 0; $i < sizeof($tableau1) ; $i++) {
    for ($j = 0 ; $j < sizeof($tableau2); $j++) {
        $m[] = $tableau1[$i] * $tableau2[$j];
        print_r($m);
        echo PHP_EOL;
    }
}

?>