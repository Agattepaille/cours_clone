<?php
include "Compte.class.php";
//création d'un premier client possédant 2 comptes
$client1 = new Client("EE111222", "SALIM", "Omar","0611111");
$compte1 = new Compte(1000, $client1);
$compte2 = new Compte(2000, $client1);

//opération de débit du compte 2 vers le compte 1
$compte2->debiterCpt(readline("Donnez le montant à débiter: "), $compte1);
echo "Opération effectuée avec succès \n*-*-*-*-*-*-*-*-*-*-*-*\n";
$compte1->afficherCompte();
$compte2->afficherCompte();

//création d'un 2è client possédant un compte
$client2 = new Client ("EE333444", "KARIMI", "Samir", "0622222");
$compte3 = new Compte(4000, $client2);
$compte3->afficherCompte();


$compte1 ->afficherNbCompte();
?>