<?php
/*Exercice 13 
    Ecrire un algorithme qui demande un nombre à l'utilisateur, 
    et l'informe ensuite si ce nombre est positif ou négatif (on laisse de côté le cas où le nombre vaut zéro).
    
    Algorithme positif ou négatif
    Var nb : Entier
    début
        // saisie des variables    
        nb <- "entrez un nombre";
        
        // vérification positif ou négatif
        si (nb > 0) {
            alors afficher "nombre positif";
        } sinon {
            afficher "nombre négatif";
        }                
    fin
*/    

$nb = readline ("entrez un nombre ");
if ($nb > 0) {
    echo "le nombre est positif";}
    else {
        echo "le nombre est négatif";
    }
?>
