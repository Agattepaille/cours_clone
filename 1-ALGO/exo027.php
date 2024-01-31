<?php
/* Exercice 27
Ecrire un algorithme qui permet de donner le résultat d'un étudiant à un module sachant que ce module 
est sanctionné par une note d'oral de coefficient 1 et une note d'écrit de coefficient 2.
La moyenne obtenue doit être supérieure ou égale à 10 pour valider le module.

Algorithme average of two marks
    Var markOral, markExam, average : integer
    start
    // init variables
        markOral <- read "entrez la note de l'examen oral";
        markExam <- read "entrez la note de l'examen écrit";
    // average
        markExam <- markExam * 2
        average <- (markOral + markExam) / 3
    // condition to pass
        if (average >= 10) { 
            echo "Vous avez validé le module";
        } else {
            echo "Réessayez encore !";
        }
    end
*/    

// variables
$markOral = readline ("entrez la note de l'examen oral : ");
$markExam = readline ("entrez la note de l'examen écrit : ");
// average
$markExam = $markExam * 2;
$average = ($markOral + $markExam) / 3;
// condition to pass
if ($average >= 10) { 
    echo "Vous avez eu $average de moyenne, vous avez validé le module !";
} else {
    echo "Vous n'avez pas validé le module, réessayez encore !";
}
?>