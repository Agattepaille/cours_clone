<?php
include_once "Developpeur.class.php";
include_once "Manager.class.php";

// instanciation de deux développeurs
$developpeur1 = new Developpeur("LACHGAR","Jean","j.lachgar@afpa.fr","00-00-00-00",1000,"Info"); 
$developpeur2 = new Developpeur("SALIM","Martin","m.salim@afpa.fr","000000",1000,"Admin");
//Affichage
$developpeur1 -> calculerSalaire();
$developpeur1 -> afficher();
$developpeur2 -> calculerSalaire();
$developpeur2 -> afficher();


// instanciation de deux développeurs
$manager1 = new Manager("LORO","Simon","s.loro@afpa.fr","000000",1000,"SAV");
$manager2 = new Manager("Afhim","Moussa","m.afhim@afpa.fr","000000",1000,"supply");
// Affichage
$manager1 -> calculerSalaire();
$manager1 -> afficher();
$manager2 -> calculerSalaire();
$manager2 -> afficher();



/* //Fatal error: Uncaught Error: Cannot instantiate abstract class Personne 
$personne1 = new Personne("LORO","Simon","s.loro@afpa.fr","000000",1000);
$personne1 -> afficher(); */

?>