<?php
/* Exercice 32
   Ecrire un algorithme qui déclare un tableau de 9 notes, dont on fait ensuite saisir les valeurs par l'utilisateur.

Algorithme marks in array
    Var tab, array, marks : Entier
    start
        // array declaration   
        tab <- array();
        // loop for
        for 1 from 1 to 10 {
        // read marks
        tab[] <- readline ("Entrez la note i ");
        }
        // display test
        echo tab[8];
    end
*/    

// array
$tab = array();
// loop for
for ($i = 1; $i < 10; $i++) {
// read marks
$tab[] = readline ("Entrez la note $i ");
}
// display test
echo $tab[8];
?>