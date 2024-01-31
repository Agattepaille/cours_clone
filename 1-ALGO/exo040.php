<?php
/* Exercice 40
Soit un tableau T à deux dimensions (12,8) préalablement rempli de valeurs numériques. 
Ecrire un algorithme qui recherche la plus grande valeur au sein de ce tableau.

Algorithme 2D array
    Var array, max : Integer
    start
    // init array
    array  = [
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 1000, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 8, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 15, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 20, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 80, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 2, 4, 8, 16, 5, 4, 90, 20, 56, 2, 8]
    ];
    max = 0;
    // double loop "for" to find max value
    for i from 0 to sizeof(array) ; i++) {
        for j from 0 to sizeof(array[i]) ; j++) {
            if (array[i][j] > max) {
            max = array[i][j];
            }
        }
    }
    // display max
    echo "La plus grande valeur est ".max;
    end
*/    

// init array
$array  = [
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 1000, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 8, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 15, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 20, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 80, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
    [1, 2, 4, 8, 16, 5, 4, 90, 20, 56, 2, 8]
];
$max = 0;
// double loop "for" to find max value
for ($i = 0 ; $i < sizeof($array) ; $i++) {
    for ($j = 0 ; $j < sizeof($array[$i]) ; $j++) {
        if ($array[$i][$j] > $max) {
        $max = $array[$i][$j];
        }
    }
}
// display max
echo "La plus grande valeur est ".$max;
?>