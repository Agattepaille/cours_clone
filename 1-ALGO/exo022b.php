<?php
/* Exercice 22b
    Ecrire un algorithme qui demande succssivement 20 nombres à l'utilisateur et 
    qui lui dit ensuite quel était le plus grand parmi ces 20 nombres.

Algorithme max number
    Var position, max, i : integer
    start
        // init variables 
        max <- 0;
        position <- 0;
        
        // loop for
        for i from 0 to 20, i++;
        nb <- "entrez le nombre i "; 

        // position of number max recording
        if max < nb;
        max <- nb;
        position <- i;
        
        // display
        print "le nombre max  est en position  ";
    end
*/    

// init variable max
    // attribuer "-inf" à max pour prendre en compte le cas où l'utilisateur ne rentre que des nombres négatifs
$max = -INF;
$position = 0;

// loop for
for ($i = 1; $i <= 20 ; $i++) { 
    $nb = readline ("entrez le nombre $i ");
// recording of position of number max 
    if ($max < $nb) {
        $max = $nb;
        $position = $i; 
    }
}
// display result
echo "le nombre max $max est en position $position ";
?>