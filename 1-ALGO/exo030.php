<?php
/* Exercice 30
   Donnez le résultat de la multiplication de deux nombres en ne faisant que des additions.

Algorithme addition des entiers sans multiplication
    Var nb1, nb2, m : Entier
    start
        // saisie des variables    
        nb1 <- 5
        nb2 <- 10
        m <- 0

        // boucle
        pour i allant de 1 à nb1; i++;
        m = nb1 + nb2

        // affichage
        afficher m
    end
*/    

// saisie des variables
$nb1 = -3;
$nb2 = 5;
$m = 0;
// loop processing
for ($i = 1; $i <= $nb1 ; $i++) { 
    if ($nb1 > 0 && $nb2 > 0) {
        $m = $m + $nb2;
    } elseif ($nb1 < 0) { 
        $m = $m + $nb2;
    }
}
// display
echo $m;
?>