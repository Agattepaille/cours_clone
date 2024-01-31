<?php 
/*
Exercice 7 (Tableau Associatif) : Créez un tableau associatif de produits avec des noms et des prix. 
Triez le tableau en ordre décroissant des prix et affichez le résultat.
Utiliser la fonction arsort($products) : bool
 
$products = array(
    "T-shirt" => 15,
    "Pantalon" => 30,
    "Chaussures" => 50,
    "Casquette" => 10
);
*/

$products = array(
    "T-shirt" => 15,
    "Pantalon" => 30,
    "Chaussures" => 50,
    "Casquette" => 10
);
arsort($products);
foreach ($products as $product => $price) {
    echo $product." ".$price;
    echo PHP_EOL;
}

?>