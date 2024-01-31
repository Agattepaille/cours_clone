<?php

// 1. Affectez un tableau associatif de trois valeurs de type nombre à virgule flottante avec des clés alpanumériques à une variable

// 2. Affectez un tableau associatif de trois valeurs de type chaîne de caractères avec des clés alpanumériques à une variable

// 3. Parcourir le premier tableau et afficher uniquement la valeur.

// 4. Parcourir le premier tableau et afficher la clé et la valeur.

$recette = array(
    "oignons" => 1.5,
    25 => 2.5,
    "lait" => 100
);
$panier = array(
    "carottes" => 3,
    25 => "pommes de terre",
    "poireaux" => 5
);

foreach ($recette as $cle => $valeur) {
    // affichage des variables `$cle` et `$valeur`
    echo $valeur;
    echo PHP_EOL;
}
foreach ($recette as $cle => $valeur) {
    // affichage des variables `$cle` et `$valeur`
    echo "$cle $valeur";
    echo PHP_EOL;
}
