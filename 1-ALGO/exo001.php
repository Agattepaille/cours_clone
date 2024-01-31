<?php
/*Exercice 1 
    Quelles seront les valeurs des variables A et B aprés exécution 
    des instructions suivantes ? 
 
    Var A, B : Entier 
    début 
        A <- | 
        B <- A+3 
        A <- +3 
    Fin

    $a = 1;
    $b = $a + 3;
    $a = 3;

    Reponse :
        La valeur des variables est : 
        A = 1 B = ? 
        A = 1 B = 4 
        A = 3 B = 4
*/    
$a = 1;
$b = $a + 3;
$a = 3;
$b = $a + 2;

echo "A = ".$a;
echo "\n";
echo "B = ".$b;
echo PHP_EOL;

?>
