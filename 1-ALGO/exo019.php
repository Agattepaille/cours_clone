<?php
/*Exercice 19
    Ecrire un algorithme qui demande un nombre de départ, et qui ensuite affiche les dix nombres suivants. 
    Par exemple, si l'utilisateur entre le nombre 17, le programme affichera les nombres de 18 à 27.
    
    Algorithme boucle +10
    Var nb : Entier
    début
        // saisie des variables    
        nb <- "entrez un nombre"

        // boucle
        pour i allant de 0 à 10; i++;
    fin
*/    

// saisie du nombre
$nb = readline ("entrez un nombre ");

// traitement de la boucle
for ($i = 0; $i < 10 ; $i++) { 
    $nb++;
    echo $nb." ";
}
?>
