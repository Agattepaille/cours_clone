<?php 
/*
Exercice 4 (Tableau Simple) : Créez un tableau de nombres. 
Trouvez le deuxième nombre le plus grand dans le tableau et affichez-le.
 
$numbers = array(42, 67, 31, 88, 59, 74, 53);
Utiliser un fonction de tri de tableau.
*/

$numbers = array(42, 67, 31, 88, 59, 74, 53);
rsort($numbers, $flags = SORT_REGULAR);
echo $numbers[1];
?>