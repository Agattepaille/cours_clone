<?php
include "Rectangle.class.php";

$L=1;
$l=2;
$rectangle1 = new Rectangle($L, $l);
$perimetre = $rectangle1->perimetre();
echo $perimetre;
echo "\n";
print_r($rectangle1);
echo "\n";

$L=2;
$l=5;
$rectangle2 = new Rectangle($L, $l);
$aire = $rectangle2->aire();
echo $aire;
echo "\n";
print_r($rectangle2);
echo "\n";

$L=6;
$l=5;
$rectangle3 = new Rectangle($L, $l);
$carre = $rectangle3->estCarre();
echo $carre;
echo "\n";
print_r($rectangle3);
echo "\n";

$L=10;
$l=5;
$rectangle4 = new Rectangle($L, $l);
$rectangle = $rectangle4->afficherRectangle();
echo "\n";
print_r($rectangle4);
echo "\n";
