<?php
/* 
Made by @Amelie
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

include_once "../model/Infraction.class.php";
include_once "../model/Penality.class.php";

// get the infraction ID and the user ID from the html form
$infraction_ID = $_POST['infraction_ID'];
$user_ID = $_POST['user_ID'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitPayment'])) {
    // Update the payment status to true
    DBManagement::validatePayment($infraction_ID);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelPayment'])) {
    // Get the right amount for the infraction
        switch (DBManagement::getPenalityLibelle($infraction_ID)) {
            case 'Agressive behavior':
                $penalityAmount =  10.00;
                break;
            case 'Big Insult':
                $penalityAmount =  0.30;
                break;
            case 'Inadequate behavior':
                $penalityAmount =  1.00;
                break;
            case 'Little Insult':
                $penalityAmount =  0.10;
                break;
            case '10mn':
                $penalityAmount =  0.10;
                break;
            case '15mn':
                $penalityAmount =  0.20;
                break;
            case '20mn':
                $penalityAmount =  0.30;
                break;
            case '25mn':
                $penalityAmount =  0.40;
                break;
            case '30mn':
                $penalityAmount =  0.50;
                break;
            case '35mn':
                $penalityAmount =  0.60;
                break;
            case '40mn':
                $penalityAmount =  0.70;
                break;
            case '45mn':
                $penalityAmount =  0.80;
                break;
            case '50mn':
                $penalityAmount =  0.90;
                break;
            case '55mn':
                $penalityAmount =  1.00;
                break;
            case '60mn':
                $penalityAmount =  1.10;
                break;
            default:
                $penalityAmount =  0.00;
                break;
    }
    // update the payment status to false
    DBManagement::cancelPayment($penalityAmount,$infraction_ID);
}

/* 
Displays the view again :
*/
$listInfractions = DBManagement::readPersonalHistory($_COOKIE["user_id"]);
$_SESSION["listInfractions"] = $listInfractions;
header('Location: ../view/personalHistory.php');