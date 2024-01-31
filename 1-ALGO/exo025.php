<?php
/* Exercice 25
    Ecrire un algorithme saisissant 2 variables entières qui calcule et affiche leur moyenne.


Algorithme average
    Var nbKm1, nbKm2, average : integer
    start
        // variables
         nbKm1 <- read "entrez nombre de KM semaine 1 :  "
        nbKm2 <- read "entrez nombre de KM semaine 2 :  "

        // average
        average <- (nbKm1 + nbKm2) /2;

        // display result
        print "vous avez fait $average KM en moyenne";

    end
*/    

// init variables
$nbKm1 = readline ("entrez nombre de KM semaine 1 :  ");
$nbKm2 = readline ("entrez nombre de KM semaine 2 :  ");
// processing average
$average = ($nbKm1 + $nbKm2) / 2;
// display result
print "vous avez fait $average KM en moyenne";
?>