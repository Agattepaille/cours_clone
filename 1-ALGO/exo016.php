<?php
/*Exercice 16 
    Ecrire un algorithme qui demande un nombre à l'utilisateur, 
    et l'informe ensuite si ce nombre est positif ou négatif 
    (on inclut cette fois le traitement du cas où le nombre vaut zéro).
    
    Algorithme positif ou négatif (inclusion du zéro)
    Var nb : Entier
    début
        // saisie des variables    
        nb <- "entrez un nombre"
        
        // vérification positif ou négatif
        si (nb == 0) {
            alors afficher "zéro"
        } ou si (nb > 0) { 
            alors afficher "nombre positif"
        } ou si (nb < 0) {
            alors afficher "nombre négatif"
        }
    fin
*/   

// saisie des variables 
$nb = readline ("entrez un nombre ");

// traitement
if ($nb == 0) {
    echo "le nombre est zéro";
} elseif ($nb > 0) {
    echo "le nombre est positif";
} else {
    echo "le nombre est négatif";
}
?>
