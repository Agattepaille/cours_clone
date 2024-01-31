<?php
/* Exercice 21
    Ecrire un algorithme qui demande un nombre de départ, et qui calcule sa factorielle.

Algorithme factorielle
    Var nb : Entier
    début
        // saisie des variables    
        nb <- "entrez un nombre"
        lire nb
        s <- 1

        // boucle
        pour i allant de 0 à nb, i++;
        s <- s * i

        // affichage
        afficher s
    fin
*/    

// saisie des variables
$nb = readline ("entrez un nombre ");
$s = 1;

// traitement de la boucle
for ($i = 1; $i <= $nb ; $i++) { 
    $s = $s * $i;
}

// affichage
echo $s;

// formule maths = n × ( n − 1 )
?>