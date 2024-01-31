<?php
include "Article.class.php";

$reference = 5;
$designation = "Jacinthe";
$prixHT = 2.5;;
$article1 = new Article($reference, $designation, $prixHT);


echo $article1->afficherArticle();

print_r($article1);



