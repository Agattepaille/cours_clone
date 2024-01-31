<?php
/*Exercice 12 
    Ecrire un programme qui lit le prix HT d'un article, le nombre d'articles et le taux de TVA, 
    et qui fournit le prix total TTC correspondant. 
    Faire en sorte que des libellés apparaissent clairement. (TTC=NA*HT*(1+TVA))
    
    Algorithme TTC
    Var ht, nA, tva, ttc : Entier
    début
        // Déclarations des variables    
        ht <- "entrez le prix HT = ";
        nA <- "entrez le nombre d'articles = ";
        tva <- "entrez le montant de la TVA = " / 100;
            
        // Calcul du TTC
        ttc <- nA*ht*(1+tva)
            
        // Affichage
        afficher ttc
    fin
*/    

// entrée des données
$ht = readline ("entrez le prix HT = ");
$nA = readline ("entrez le nombre d'articles = ");
$tva = readline ("entrez le montant de la TVA = ");

// traitement
$tva = $tva / 100;
$ttc = $nA*$ht*(1+$tva);

// affichage
echo "Le montant TTC est de $ttc euros";
?>
