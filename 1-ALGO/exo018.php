<?php
/*Exercice 18
    Ecrire un algorithme qui demande l'âge d'un enfant à l'utilisateur.
    Ensuite, il l'informe de sa catégorie.
    - poussin de 6 à 7 ans
    - pupille de 8 à 9 ans
    - minime de 10 à 11 ans
    - cadet après 12 ans
    Peut-on concevoir plusieurs algorithme équivalents menant à ce résultat ?
    
    Algorithme âge et catégorie
    Var Age : Entier
        début
        // saisie des variables    
        age <- "entre ton âge"

        // attribution catégorie
        si (age == [6-7]) {
            afficher "Poussin"
        } ou sinon (age == [8-9]) {
            afficher "Pupille"
        } ou sinon (age == [10-11]) {
            afficher "Minime"
        } ou sinon (age == [12-18]) {
            afficher "cadet"
        } sinon {
            afficher "hors catégorie"
        }    
        fin
*/

/*
// saisie de l'âge
$age = readline ("entre ton âge ");

// traitement
if ($age >= 6 && $age <= 7) {
    echo "Poussin";
} elseif ($age >= 8 && $age <= 9) {
    echo "Pupille";
} elseif ($age >= 10 && $age <= 11) {
    echo "Minime";
} elseif ($age >= 12 && $age < 18) {
    echo "Cadet";
} else {
    echo "Hors Catégorie";
}


/* Ecrire un algo qui demande l'âge d'un enfant à l'utilisateur, ensuite il l'informe de sa catégorie
    "Poussin" de 6 a 7
    "Pupille" de 8 a 9
    "Minime" de 10 a 11
    "Cadet" apres 12*/
 
    #On déclare et on saisit les vairables
    echo "Entrez l'âge : ";
    $age = trim(fgets(STDIN));
 
    #On teste la variable age
    if ($age > 11) {
        echo "Cadet";
    } else if ($age > 9)  {
        echo "Minime";
    } else if ($age > 7) {
        echo "Pupille";
    } else if ($age > 5) {
        echo "Poussin";
    }
?>
