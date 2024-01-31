<?php 
/*
Exercice 4 : Créez un tableau de nombres simple. 
Utilisez une boucle foreach pour déterminer si tous les nombres du tableau sont des nombres premiers.
*/ 

$numbers = array(5, 7, 11, 11, 23);
 
function isPrime($num) : bool {
    if ($num <= 1) return false;
    if ($num <= 3) return true;
    if ($num % 2 == 0 || $num % 3 == 0) return false;
    for ($i = 5; $i * $i <= $num; $i += 6) {
        if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
    }
    return true;
}

$allPrime = true;
foreach ($numbers as $number) {
    if (!isPrime($number)) {
        $allPrime = false;
    }
}
if ($allPrime == true) {
    echo "Tableau nombres premiers";
} else {
    echo "Pas tableau nombres premiers";
}

?>