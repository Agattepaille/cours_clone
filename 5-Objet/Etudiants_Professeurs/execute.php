<?php
include_once "Etudiant.class.php";
include_once "Professeur.class.php";



$employe1 = new Employe("DOUK","Rachid",10000.0);
$employe2 = new Employe("NGOYE","Roland",10000.0);
echo "La liste des employés : ".PHP_EOL;
echo "Je suis ".$employe1." mon salaire est : ".$employe1->getSalaire().PHP_EOL;
echo "Je suis ".$employe2." mon salaire est : ".$employe2->getSalaire().PHP_EOL;


$etudiant1 = new Etudiant("OBAKA","Med","65678754");
$etudiant2 = new Etudiant("ALSENY","Thomas","87543543");
echo "La liste des étudiants : ".PHP_EOL;
echo "Je suis ".$etudiant1." mon CNE est : ".$etudiant1->getCNE().PHP_EOL;
echo "Je suis ".$etudiant2." mon CNE est : ".$etudiant2->getCNE().PHP_EOL;

$professeur1 = new Professeur("OBA","Kevin",5700.0,"JAVA/JEE");
$professeur2 = new Professeur("MAGASSOUBA","Cheick",5000.0,"PHP");
echo "La liste des professeurs : ".PHP_EOL;
echo "Je suis ".$professeur1." mon salaire est : ".$professeur1->getSalaire()." ma spécialité est : ".$professeur1->getSpecialite().PHP_EOL;
echo "Je suis ".$professeur2." mon salaire est : ".$professeur2->getSalaire()." ma spécialité est : ".$professeur2->getSpecialite().PHP_EOL;

/* La liste des employes :
Je suis DOUK Rachid mon salaire est: 10000.0 €
Je suis NGOYE Roland mon salaire est: 10000.0 €

La liste des étudiants :
Je suis OBAKA Med mon CNE est: 65678754
Je suis ALSENY Thomas mon CNE est: 87543543
La liste des professeurs :
Je suis OBA Kevin mon salaire est: 5700.0 € ma spécialité est: JAVA/JEE
Je suis MAGASSOUBA Cheick mon salaire est: 5000.0 € ma spécialité est: PHP */


?>