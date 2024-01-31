<?php
/* Exercice 20
    Ecrire un algorithme qui demande un nombre de départ, et qui calcule la somme des entiers jusqu'à ce nombre.
    Par exemple, si l'on entre 5, le programme doit calculer : 1+ 2 + 3 + 4 + 5 = 15

Algorithme addition des entiers jusqu'à un nombre
    Var nb : Entier
    début
        // saisie des variables    
        nb <- "entrez un nombre"
        lire nb
        s <- 0

        // boucle
        pour i allant de 0 à nb; i++;
        s = s + i

        // affichage
        afficher s
    fin
*/    

// saisie des variables
$nb = readline ("entrez un nombre ");
$s = 0;

// traitement de la boucle
for ($i = 0; $i <= $nb ; $i++) { 
    $s = $s + $i;
}

// affichage
echo $s;
?>