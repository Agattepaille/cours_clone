<?php
/*Exercice 11 
    Ecrit un programme qui demande un nombre à l'utilisateur, 
    puis qui calcule et affiche le carré de ce nombre
    
    Algorithme carré
    Var val, carré : Entier
    début
        // variable    
        val <- "entrez un nombre = ";
        
        // calcul carré
        val <- val * val;
                     
        // Affichage
        afficher "carre = ";
    fin
*/    
$val = readline ("entrez un nombre = ");
$carre = $val * $val;

echo "carre = " .$carre;
?>
