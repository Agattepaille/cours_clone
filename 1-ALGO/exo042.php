<?php
/* Exercice 42
Ecrire l'algorithme triant un tableau par sélection.
- on cherche l'élément de plus petite valeur dans le tableau
- le placer en tête du tableau
- recommencer avec le tableau moins la première case
    14  3   9   2   5
    2   3   9   14  5

    2   3   9   14  5
    2   3   5   14  9

    2   3   5   9   14

Algorithme sorting array
    Var array, max : Integer
    start
    // init variables
    tab <- array()
    min <- 0;
    //  loop "for" to find min value
    for i from 0 to size of array ; i++) {
        if tab[i] < min {
            min < tab[i];
        }
    // shift min value to first cell of array
    min <- tab[0];
    // display min
    echo "La plus petite valeur est ".tab[0];
    end
*/    

// init variables
$tab  = array(14, 3, 9, 2, 5);
$temp = +INF;
// double loop "for" to reorder min value in array
for ($i = 0; $i < sizeof($tab)-1; $i++) {
    for ($j = 0; $j < sizeof($tab)-1; $j++) {
        if ($tab[$j] > $tab[$j+1]) {
            $temp = $tab[$j+1];
            $tab[$j+1] = $tab[$j];
            $tab[$j] = $temp;
        }
    }
}
// display array
for ($i=0; $i < count($tab); $i++) { 
    echo $tab[$i]." "; 
}
?>