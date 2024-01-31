<?php
/* Exercice 41
Ecrire l'algorithme effectuant le décalage des éléments.
Tableau initial D E C A L A G E
Tableau modifié (décalage à gauche) E C A L A G E

Algorithme decalage
    Var array, max : Integer
    start
    // init variables
    array  = [
        [1, 2, 4, 8, 16, 5, 4, 8, 20, 56, 2, 8],
        [1, 3, 9, 27, 81, 6, 9, 4]
    ];
    max = 0;
    // double loop "for" to find max value
    for i from 0 to size of array ; i++) {
        values[i] <- read ("entrez une valeur : ");
        values[i] <- values[i] + 1;
        for j from 0 to size of array[i] ; j++ {
            if (array[i][j] > max) {
            max = array[i][j];
            }
        }
    }
    // display max
    echo "La plus grande valeur est ".max;
    end
*/    

// init variables
$tab = array ("D", "E", "C", "A", "L", "A", "G", "E");
$temp = $tab[0];

// double loop "for" to find max value
for ($i = 0; $i < sizeof($tab)-1; $i++) {
    $tab[$i] = $tab[$i+1];
}
$tab[7] = $temp;
// display max
print_r ($tab);
?>