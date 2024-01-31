<?php 
/*
Exercice 2 : Créez un tableau de produits avec des noms et des prix. 
Utilisez une boucle foreach pour calculer le prix total de tous les produits.
*/

$products = array(
    array("nom" => "T-shirt", "prix" => 15),
    array("nom" => "Pantalon", "prix" => 30),
    array("nom" => "Chaussures", "prix" => 50)
);

$sum = 0 ;
foreach ($products as $product) {
    foreach ($product as $key => $value) {
        if (is_int($value)) {
            $sum = $sum + $value;
        }
    }
}
echo "$sum";

//$total += $product["prix"];

?>