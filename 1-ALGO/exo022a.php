<?php
/* Exercice 22a
    Ecrire un algorithme qui demande successivement 20 nombres à l'utilisateur et 
    qui lui dit ensuite quel était le plus grand parmi ces 20 nombres.

Algorithme nombre max
    Var nb, max, i : Entier
    début
        // initialisation des variables 
        max <- 0
        
        // boucle de saisie des nombres
        pour i allant de 0 à 20, i++;
        nb <- "entrez un nombre"; 

        // enregistrement du nombre max
        si max < nb
        max <- nb
        
        // affichage
        afficher nb max
    fin
*/    

// initialisation de la variable max
$max = 0;

// boucle
for ($i = 0; $i < 20 ; $i++) { 
    $nb = readline ("entrez un nombre");
// enregistrement du nombre max
    if ($max <= $nb) {
        $max = $nb;
    }
}

// affichage
echo "le nombre max est $max";
?>