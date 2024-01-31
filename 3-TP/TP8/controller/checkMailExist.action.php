<?php

include_once '../model/DBManagement.class.php';
include_once "../model/User.class.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    if (isset($requestData['mail'])) {
        $mailToCheck = $requestData['mail'];

        // function that verifies if email exist
        $exists = DBManagement::doesMailExist($mailToCheck);

        // Return response in JSON format
        header('Content-Type: application/json');
        echo json_encode(['exists' => $exists]);
        exit;
    }
}




// header('Location: ../view/ForgotPassword.php');

?>
