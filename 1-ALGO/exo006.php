<?php
/*Exercice 6 
    Quelles seront les valeurs des variables A, B après exécution 
    des instructions suivantes ? 
    Var A,B :Entier;

    début
        A <- 2;
        B <- 4;
        TMP <- A;
        A <- B;
        B <- C;
    fin

    Réponse :
        La valeur des variables est : 
        A = 2   B = ?   TMP = ?  
        A = 2   B = 4   TMP = ?   
        A = 2   B = 4   TMP = 2    
        A = 4   B = 4   TMP = 2
        A = 4   B = 2   TMP = 2    

*/   

$a = 2;
$b = 4;
$tmp = $a;
$a = $b;
$b = $tmp;

echo "A = ".$a;
echo "\n";
echo "B = ".$b;
echo "\n";
echo "TMP = ".$tmp;

?>

