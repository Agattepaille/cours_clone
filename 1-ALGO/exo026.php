<?php
/* Exercice 26
Saisir 3 entiers a, b, c et déterminer dans R les racines ax² + bx + c = 0.

Algorithme second degree equation
    Var a, b, c : integer
    start
        // init variables
        a <- read "entrez la valeur de a";
        b <- read "entrez la valeur de b";
        c <- read "entrez la valeur de c";

        // equation
        ax² + bx + c = 0;
        delta <- b² - 4ac;
        if (delta > 0) {
            x1 <- (-b √delta / 2a) and x2 <- (-b+√delta /2a)
            r <- x1 and x2;
        } elseif (delta = 0) {
            x <- -b / 2a;
            r <- x;
        } elsif (delta < 0) {
            r <- echo "l'équation n'admet pas de solutions réelles";
        }

        // display result
        echo R ;
    end
*/    

// init variables
$a = readline ("entrez la valeur de a ");
$b = readline ("entrez la valeur de b ");
$c = readline ("entrez la valeur de c ");
$x = -($b /( 2 * $a));
$delta = ($b * $b) - (4 * ($a * $c));
$x1 = ((-$b - sqrt($delta)) / (2*$a));
$x2 = ((-$b + sqrt($delta)) / (2*$a));


// processing equation       
        if ($delta > 0) {
            $x1 & $x2;
            echo "les racines de l'équation sont $x1 & $x2 ";
        } elseif ($delta == 0) {
            $x;
            echo "la racine de l'équation est $x ";
        } else {
            echo "l'équation n'admet pas de solutions réelles";
        }      
?>