<?php
include "Employe.class.php";

// Instanciation d'un nouveau client et affichage de ses infos

/* $matricule = readline ("Entrez votre matricule ");
$nom = readline ("Entrez votre nom ");
$prenom = readline ("Entrez votre Prénom ");
$dateNaissance = readline ("Entrez votre date de naissance (jj/mm/aaaa) :  ");
$dateEmbauche = readline ("Entrez votre date d'embauche (jj/mm/aaaa) : ");
$salaire = readline ("Entrez votre salaire "); */

$matricule = 10941;
$nom = "Martin";
$prenom = "Omar";
$dateNaissance = "04/08/1990";
$dateEmbauche = "05/11/2012";
$salaire = 1000;
$employe1 = new Employe($matricule,$nom,$prenom,$dateNaissance,$dateEmbauche,$salaire );


$employe1 -> afficherEmploye().PHP_EOL;
$employe1 -> augmentationDuSalaire().PHP_EOL;
$employe1 -> afficherEmploye().PHP_EOL;
