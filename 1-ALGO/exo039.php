<?php
/* Exercice 39
 Toujours et encore sur le même principe, écrivez un algorithme permettant à l'utilisateur de saisir les notes d'une classe. 
 Le programme, une fois la saisie terminée, renvoie le nombre de ces notes supérieures à la moyenne de la classe.

Algorithme marks above average with array
    Var nbValues, value : Integer
    start
    // init variables
    nbValues <- readline ("entrez le nombre de valeurs du tableau ");
    values <- array();
    // loop "for" to read value and increment it
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
$nbMarks = readline ("entrez le nombre de personnes dans la classe ");
$marks = array();
$sum = 0;
$marksAboveAverage = 0;
// loop "for" to read value and to sum numbers
for ($i = 0; $i < $nbMarks ; $i++) {
    $marks[$i] = readline ("entrez une valeur : ");
    $sum = $sum + $marks[$i];
}
// calculate average
$average = $sum / $nbMarks;
// number of marks above average
for ($i = 0; $i < sizeof($marks) ; $i++) {
    if ($marks[$i] > $average) {
        $marksAboveAverage++;
    } 
}
echo "$marksAboveAverage notes sont supérieures à la moyenne de $average ";
?>