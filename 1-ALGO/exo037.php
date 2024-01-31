<?php
/* Exercice 37 
Ecrivez un algorithme qui permette la saisie d'un nombre quelconque de valeurs. 
Toutes les valeurs doivent être ensuite augmentée de 1, et le nouveau tableau sera affiché à l'écran.

Algorithme smurfs
    Var nbValues, value : Integer
    start
    // init variables
    nbValues <- readline ("entrez le nombre de valeurs du tableau ");
    values <- array();
    // loop for to read value and increment it
    for i from 0 to nbValues ; i++) {
        values[i] <- read ("entrez une valeur : ");
        values[i] <- values[i] + 1;
    }
    // display new array
    for i from 0 to count(values); i++) { 
        echo values[i]." "; 
    }
    end
*/    

// init variables
$nbValues = readline ("entrez le nombre de valeurs du tableau ");
$values = array();
// loop for to read value and increment it
for ($i = 0; $i < $nbValues ; $i++) {
    $values[$i] = readline ("entrez une valeur : ");
    $values[$i] = $values[$i] + 1;
}
// display new array
for ($i=0; $i < count($values); $i++) { 
    echo $values[$i]." "; 
}
?>