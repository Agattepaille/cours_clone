<?php
/* Exercice 34
   Ecrivez un algorithme calculant la somme des valeurs d'un tableau (on suppose que le tableau a été préalablement saisi).

Algorithme sum with array
    Var array, nb : Entier
    start
    // init variables    
        array <- array(1,2,3,4,5);
        sum <- 0

    // loop for
        pour i allant de 0 à 5; i++;
        sum = sum + i

    // display
        echo sum
    end
*/    

// init of array
$array = array(1,2,3,4,5);
$sum = 0;
// loop for
for ($i = 0; $i <= 5; $i++) {
    $sum = $sum + $i;
}
// display result sum
echo $sum
?>