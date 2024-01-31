<?php 
/*
Exercice 2 : Créez un script qui calcule la somme des nombres de 1 à 100 à l'aide d'une boucle "while".
*/

$i = 0;
$sum = 0;
while ($i <= 100) {
    $sum += $i++;
}
echo $sum;

?>