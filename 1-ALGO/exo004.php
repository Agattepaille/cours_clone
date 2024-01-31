<?php
/*Exercice 4 
    Quelles seront les valeurs des variables A, B et C après exécution 
    des instructions suivantes ? 
    Var A,B, C :Entier;

    début
        A <- 3;
        B <- 10;
        C <- A + B;
        B <- A + B;
        A <- C;
    fin

    Réponse :
        La valeur des variables est : 
        A = 3   B = ?    C = ? 
        A = 3   B = 10   C = ? 
        A = 3   B = 10   C = 13  
        A = 3   B = 13   C = 13
        A = 13  B = 13   C = 13

*/   

$a = 3;
$b = 10;
$c = $a + $b;
$b = $a + $b;
$a = $c;

echo "A = ".$a;
echo "\n";
echo "B = ".$b;
echo PHP_EOL;
echo "C = ".$c;

?>
