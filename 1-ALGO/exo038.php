<?php
/* Exercice 38
 Ecrivez un algorithme permettant, toujours sur le même principe, à l'utilisateur de saisir un nombre déterminé de valeurs.
 Le programme, une fois la saisie terminée, renvoie la plus grande valeur en précisant 
 quelle position elle occupe dans le tableau. On prendra soin d'effectuer la saisie dans un premier temps, 
 et la recherche de la plus grande valeur du tableau dans un second temps. 

Algorithme higher value in array
    Var nbValues, value : Integer
    start
// init variables
nbValues <- read ("entrez le nombre de valeurs du tableau ");
values <- array();
max <- -INF;
// loop "for" to read value
for from 0 to nbValues ; i++) {
    values[i] = read ("entrez une valeur : ");
    if (max < values[i]) {
        max = values[i];
        position = i + 1; 
    }
}
// display new array
echo "le nombre max est en position ";
    end
*/    

// init variables
$nbValues = readline ("entrez le nombre de valeurs du tableau ");
$values = array();
$max = -INF;
// loop "for" to read value
for ($i = 0; $i < $nbValues ; $i++) {
    $values[$i] = readline ("entrez une valeur : ");
    if ($max < $values[$i]) {
        $max = $values[$i];
        $position = $i + 1; 
    }
}
// display new array
echo "le nombre max $max est en position $position ";
?>