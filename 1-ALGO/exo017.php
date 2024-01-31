<?php
/*Exercice 17
    Ecrire un algorithme qui demande deux nombres à l'utilisateur, 
    et l'informe ensuite si leur produit est positif ou négatif 
    (on inclut cette fois le traitement du cas où le produit peut être nul).
    Attention : on ne doit pas calculer le produit de ces deux nombres.
    
    Algorithme produit positif ou négatif (inclusion du zéro)
    Var nb1, nb2 : Entier
        début
        // saisie des variables    
        nb1 <- "entrez un premier nombre";
        lire nb2 <- "entre un second nombre";

        // vérification positif ou négatif
        si (nb1 > 0 et nb2 > 0 ou -nb1 < 0 -nb2 < 0) {
            alors afficher "le produit de vos nombres est positif"
        } ou sinon (nb1 * nb2 == 0) {
            alors afficher "le produit de vos nombres est égal à zéro"
        } sinon {
            afficher "le produit de vos nombres est négatif"
        }  
        fin
*/    

// saisie des nombres 
$nb1 = readline ("entrez un premier nombre ");
$nb2 = readline ("entrez un second nombre ");

// traitement
if ($nb1 > 0 and $nb2 > 0 or $nb1 < 0 and $nb2 < 0) {
    echo "le produit de vos nombres est positif";
} elseif ($nb1 * $nb2 == 0) {
    echo "le produit est égal à zéro";
} else {
    echo "le produit de vos nombres est négatif";
}
?>
