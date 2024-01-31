<?php
include "Etudiant.class.php";
//
$informatique = new Filiere("INFO", "informatique");
$techno = new Filiere("Techno", "Techno de l'info et de communication");
$genieCivil = new Filiere("GC", "Génie Civil");


$Rashid = new Etudiant("Rashid","Mohamed","1995-01-02",$informatique);
$Yves = new Etudiant("Yves","Chakib",'1992-04-02',$informatique);
$Martin = new Etudiant("Martin","Manal",'2011-03-02',$techno);
$Jacques = new Etudiant("Jacques","Meriem",'2000-11-02',$genieCivil);
$Rami = new Etudiant("Rami","Mouad",'2013-01-02',$genieCivil);

/* echo $Rashid-> __toString();
echo $Yves-> __toString();
echo $Martin-> __toString();
echo $Jacques-> __toString();
echo $Rami-> __toString(); */

// création de deux tableaux pour regrouper les filières et les étudiants
$tableauFilieres = [$informatique, $techno, $genieCivil];
$tableauEtudiants = [$Rashid, $Yves, $Martin, $Jacques, $Rami];

// double boucle for each pour parcourir le tableau filière puis le tableau des étudiants
foreach ($tableauFilieres as $filiere) {
    echo "Filière : ".$filiere->getLibelle().PHP_EOL;
    foreach ($tableauEtudiants as $etudiant) {    
        if ($etudiant -> getFiliere() == $filiere) {
        echo "Je suis l'étudiant : ".$etudiant -> getNom().". Ma date de naissance est : ".$etudiant -> getDateNaissance().PHP_EOL;
        } 
    }
}


?>