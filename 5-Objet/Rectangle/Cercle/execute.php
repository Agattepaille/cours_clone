<?php
include "Cercle.class.php";

//Instanciation d'un nouveau cercle (composé de absisse, ordonnee, rayon)
$cercle1 = new Cercle(1, 2, 3);
//Affichage du perimetre (appel de la méthode dans un string. Idem pour la surface)
echo "Perimeter: " . $cercle1 -> getPerimetre() ."\n";
echo "Surface: " . $cercle1 -> getSurface() ."\n";
//Instanciation d'un nouveau point
$pointP = new Point(3,4);
if ($cercle1 -> appartient($pointP) == true) {
    echo "le point est dans le cercle \n";
} else {
     echo "le point n'est pas dans le cercle \n";
}
echo $cercle1 -> afficher();

/* $cercle2 = new Cercle(5, 6, 4);
echo "Perimeter: " . $cercle2 -> getPerimetre() ."\n";
echo "Surface: " . $cercle2 -> getSurface() ."\n";
$pointP = new Point(15,16);
if ($cercle2 -> appartient($pointP) == true) {
    echo "le point est dans le cercle \n";
} else {
     echo "le point n'est pas dans le cercle \n";
}
echo $cercle2 -> afficher(); */