<?php
/* Exercice 23
    Réécrire l'algo précent, mais cette fois-ci on ne connaît pas d'avance combien l'utilisateur souhaite saisir de nombres.
    La saisie des nombres s'arrête lorsque l'utilisateur entre un Zéro.

Algorithme max number with while loop
    Var max, nb : integer
    start
        // init variables 
        max <- 0;
        position <- 0;
        $nb <- read ("entrez un nombre ");
        
        // loop while
        While (max != 0) 
            Faire {
            nb <- read "entrez un nombre ";
        }

        // position of number max recording
        if max < nb;
        max <- nb;
                
        // display
        afficher nb max;
    end
*/    

// init variables
$i = 1;
$max = -INF;
$nb = 1;
// loop processing
while ($nb != 0) {
    $nb = readline ("entrez le nombre $i ");
// number max recording
        if ($max < $nb) {
            $max = $nb;
            $position = $i;
        }
        $i++;
}
// display result
echo "le nombre max $max est en position $position ";
?>