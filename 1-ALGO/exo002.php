<?php
/*Exercice 2 
    Quelles seront les valeurs des variables A, B et C aprés exécution 
    des instructions suivantes ? 
    Var A,B, C :Entier;

    début
        A <-  5
        B <- 3
        C <- A + B
        A <- 2
        C <- B - A
    fin

    Reponse :
        La valeur des variables est : 
        A = 5   B = ?   C = ? 
        A = 5   B = 3   C = ? 
        A = 5   B = 3   C = 8 
        A = 2   B = 3   C = 8
        A = 2   B = 3   C = 1

*/   

$a = 5;
$b = 3;
$c = $a + $b;
$a = 2;
$c = $b - $a;

echo "A = ".$a;
echo "\n";
echo "B = ".$b;
echo PHP_EOL;
echo "C = ".$c;

?>
