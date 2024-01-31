<?php
/* Exercice 28
Ecrire un algorithme permettant d'imprimer le triangle suivant, le nombre de lignes étant donné par l'utilisateur :
1
12
123
1234
12345

Algorithme triangle
    Var n, nbLignes : integer
    start
    // init variables
        nbLines <- read "entrez le nombre de lignes du triangle : ";
        
    // double loop for
        pour i allant de 0 à nbLines ; i++; {
            pour j allant de 0 à i; j++; {
                echo j;
            }
        }
    end

Tableau de vérification
nbLines      i   j   
1            1   1   
2            2   1  2
3            3   1  2   3
4            4   1  2   3   4
5            5   1  2   3   4   5

*/    

// variables
$nbLines = readline ("entrez le nombre de lignes du triangle : ");
// loop for
for ($i = 1 ; $i <= $nbLines ; $i++) {
    for ($j = 1 ; $j <= $i; $j++) {
        echo $j ;
    }
}
?>