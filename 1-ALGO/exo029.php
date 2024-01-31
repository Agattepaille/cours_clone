<?php
/* Exercice 29
    Ecrire un algorithme qui demande un nombre, calcule et affiche la somme Σ indice 1 ³

Algorithme sigma cube
    Var nb : Entier
    sart
        // saisie des variables    
        nb <- "entrez un nombre"
        lire nb
        s <- 0

        // boucle
        pour i allant de 0 à nb; i++;
        nb = nb + 1

        // affichage
        afficher s
    end
*/    

// saisie des variables
$nb = readline ("entrez un nombre ");
$s = 0;
$sumCube = 0;
// traitement de la boucle
for ($i = 0; $i <= $nb ; $i++) { 
    $s = $s + $i;
}
// sum Cube
$sumCube = $s * $s;
// affichage
echo $sumCube;
?>