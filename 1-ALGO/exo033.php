<?php
/* Exercice 33
   Ecrivez un algorithme permettant à l'utilisateur de saisir un nombre quelconque de valeurs, 
   qui devront être stockées dans un tableau. 
   L'utilisateur doit donc commencer par entrer le nombre de valeurs qu'il compte saisir. 
   Il effectuera ensuite cette saisie. Enfin, une fois la saisie terminée, 
   le programme affichera la nombre de valeurs négatives et le nombre de valeurs positives.

Algorithme positiv and negativ values in array
    Var array, nbValues, positiv, negativ : Entier
    Start
    // init variables
        $nbValues <- read ("entrez le nombre de valeurs : ");
        positives <- 0;
        negatives <- 0;
    // array declaration   
        tab <- array();
    //loop for
        for i from  1 to nbValues
    // loop for
        for (i <- 0; i < nbValues; i++) {
        value <- readline ("entrez votre valeur : ");
    // save value in array
        tab[] <- array (value);
        if (value > 0) {
            positiv++;
        } elseif (value < 0) {
            negativ++;
        }
    //display results 
    display "Le nombre de valeurs positives est de positiv. Le nombre de valeurs négatives est de negativ  ."

*/    

// init variables
$nbValues = readline ("entrez le nombre de valeurs : ");
$positiv = 0;
$negativ = 0;
// creation of array
$array = array();
// loop for
for ($i = 0; $i < $nbValues; $i++) {
    $value = readline ("entrez votre valeur : ");
// save value in array
    $tab[] = array ($value);
    if ($value > 0) {
// increment positiv value
        $positiv++;
    } elseif ($value < 0) {
// increment positiv value
        $negativ++;
    }
}
// display negativ and positiv values
echo "Le nombre de valeurs positives est de $positiv. Le nombre de valeurs négatives est de $negativ  ."
?>