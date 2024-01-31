<?php

// 1. Affectez une chaîne de caractères à une variable

// 2. Concaténez deux chaînes de caractères et affectez le résultat à une variable

// 3. Affectez une chaîne de caractères à une variable nommées `$personne`
//    Affectez à une autre variable, une autre chaîne de caractères dans laquelle vous ferez une interpolation de la variable `$personne`

$string = " blabla ";
$string1 = "blabla "."blabla";
echo $string1;
echo PHP_EOL;
$personne = "Ulysse ";
$odyssee = "est personne";
echo $personne.$odyssee;