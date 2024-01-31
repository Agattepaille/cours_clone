<?php
/* Exercice 28b
Ecrire un programme qui affiche :
0 1 2 3 4 5 6 7 8 9
0 1 2 3 4 5 6 7 8 9
0 1 2 3 4 5 6 7 8 9
0 1 2 3 4 5 6 7 8 9
0 1 2 3 4 5 6 7 8 9


Algorithme rectable
    Var n, nbLignes : integer
    start
    // init variables
        lines <- 5;
        column <- 10;
        
    // double loop for
        pour i allant de 0 à lines ; i++; {
            pour j allant de 0 à i; j++; {
                echo j;
            }
        }
    end

Tableau de vérification
Lines        i   j   
1            1   0 1 2 3 4 5 6 7 8 9
2            2   0 1 2 3 4 5 6 7 8 9
3            3   0 1 2 3 4 5 6 7 8 9
4            4   0 1 2 3 4 5 6 7 8 9
5            5   0 1 2 3 4 5 6 7 8 9

*/    

// variables
$lines = 5;
$columns = 9;

// loop for
for ($i = 0 ; $i < $lines ; $i++) {
    for ($j = 0 ; $j <= $columns; $j++) {
        echo " $j " ;
    }
    echo PHP_EOL;
}
?>