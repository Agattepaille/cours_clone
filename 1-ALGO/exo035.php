<?php
/* Exercice 35
   Ecrivez un algorithme constituant un tableau, à partir de deux tableaux de même longueur préalablement saisis.
   Le nouveau tableau sera la somme des éléments des deux tableaux de départ.

Algorithme sum with two arrays
    Var array : Integer
    start
    // init variables    
        tab1 <- array(4, 8, 7, 9, 1, 5, 4, 6);
        tab2 <- array(7, 6, 5, 2, 1, 3, 7, 4);
        tab3 <- 0

    // loop for
        pour i allant de 0 à 8; i++;
        tab3[] <- tab1[i] + tab2[i];

    // display
        for i from 0 to size of tab3; i++;
        echo tab3[i];
    end
*/    

// init of array
$tab1 = array (4, 8, 7, 9, 1, 5, 4, 6);
$tab2 = array (7, 6, 5, 2, 1, 3, 7, 4);
$tab3 = array ();
 
for ($i=0; $i < sizeof($tab1) ; $i++) {
    $tab3[] = $tab1[$i] + $tab2[$i]; 
}
 
for ($i=0; $i < count($tab3); $i++) { 
    echo $tab3[$i]." "; 
}
?>