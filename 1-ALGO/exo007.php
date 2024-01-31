<?php
/*Exercice 7 
   

    début
        A <- 2;
        B <- 4;
        C <- 6;
        TMP <- C;
        C <- B;
        B <- A;
        A <- TMP;
    fin

    Réponse :
        La valeur des variables est : 
        A = 2   B = ?   C = ?  TMP = ?  
        A = 2   B = 4   C = ?  TMP = ?   
        A = 2   B = 4   C = 6  TMP = ?    
        A = 4   B = 4   C = 6  TMP = 6
        A = 4   B = 4   C = 4  TMP = 6
        A = 2   B = 2   C = 4  TMP = 6
        A = 6   B = 2   C = 4  TMP = 6


*/   

$a = 2;
$b = 4;
$c = 6;
$tmp = $c;
$c = $b;
$b = $a;
$a = $tmp;

echo "A = ".$a;
echo "\n";
echo "B = ".$b;
echo "\n";
echo "C = ".$c;
echo "\n";
echo "TMP = ".$tmp;

?>

