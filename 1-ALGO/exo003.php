<?php
/*Exercice 3 
    Quelles seront les valeurs des variables A, B après exécution 
    des instructions suivantes ? 
    Var A,B :Entier;

    début
        A <- 5
        B <- A + 4
        A <- A + 1
        B <- A - 4
    fin

    Réponse :
        La valeur des variables est : 
        A = 5   B = ?  
        A = 5   B = 9    
        A = 6   B = 9    
        A = 6   B = 2    

*/   

$a = 5;
$b = $a + 4;
$a = $a + 1;
$b = $a - 4;

echo "A = ".$a;
echo "\n";
echo "B = ".$b;

?>
