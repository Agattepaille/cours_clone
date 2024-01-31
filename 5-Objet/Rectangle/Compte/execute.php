<?php
include "Compte.class.php";

// Instanciation d'un nouveau client et affichage de ses infos
$client1 = new Client("EE111222","Salim","Omar","012222");
/*Test de la méthode : afficher()
$client1->afficher();*/

//Instanciation d'un nouveau compte (composé du solde et du client proprio )
$compte1 = new Compte(100,$client1);
//$compte1->display();

//Instanciation d'un nouveau compte pour tester le compteur sur le numéro de compte
$compte2 = new Compte(500,$client1);
//$compte2->display();

// echo $compte1->credit(100);
//$compte2->debit(100);
//$compte1->creditCpt(100,$compte2);
$compte2->debitCpt(100,$compte1);