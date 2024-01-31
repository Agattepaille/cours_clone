<?php

/*

Made by Dylan

*/

include_once '../model/DBManagement.class.php';
include_once "../model/User.class.php";

use \Mailjet\Resources;

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $penality = $_POST['penality'];
    
    // made by @Amelie
    $user = DBManagement::getInfoUserFromDB('user_ID',$_POST['user_ID']);
    $mailRecipient = $user->getMail();

    // Vérifier si une pénalité a été sélectionnée
    if (!empty($penality)) {
        // Appeler la fonction du modèle pour ajouter la pénalité
        DBManagement::addPenalityInsult($_POST['user_ID'], $penality);

        /*
        Made by @Amelie
        start : send mail notification infraction
        */

        /* session initialisation */
        session_start();
        $snitch_ID = $_COOKIE["user_firstname"];
        require 'vendor/autoload.php';
        $mj = new \Mailjet\Client('b7dfac8f27deb661e165e9019317bd00','1a1ea062d99882c21f8facac3c80a898',true,['version' => 'v3.1']);
        // Define recipients
        $recipients = [
        [
            //récupérer le mail de l'utilisateur dénoncé
            'Email' => $mailRecipient
        ]
        ];
        function mailContent($snitch_ID) {
        return '<!doctype html>
        <html lang="en-US">

        <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <title>Infraction Notification Email</title>
            <meta name="description" content="Infraction Notification Email">
            <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>
            <style type="text/css">
                a:hover {text-decoration: underline !important;}
            </style>
        </head>

        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #F8EAD3;" leftmargin="0">
            <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#F8EAD3"
                style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: \'Open Sans\', sans-serif;">
                <tr>
                    <td>
                        <table style="background-color: #F8EAD3; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                <h1>Infraction notice</h1>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                        style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 35px;">
                                            <h1 style="color:#1e1e2d; font-weight:700; margin-top:0; margin-bottom:20px;font-size:32px;font-family:\'Rubik\',sans-serif;">STOP THERE !</h1>
                                                <h6 style="color:#1e1e2d; font-weight:300; margin:0;font-size:32px;font-family:\'Rubik\',sans-serif;">You have a new infraction</h6>
                                                <span
                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                You\'ve committed another infraction. We know it can happen, but we\'ll add the infraction to your account anyway &#128519;</p>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:20px;">
                                                Here\'s the snitch who reported your infraction: <span style="color:#145548; font-weight:700;">'.$snitch_ID.'</span>
                                                </p>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>

        </html>';
        }
        $htmlContent = mailContent($snitch_ID);
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "swearjar@outlook.fr",
                'Name' => "Swear Jar"
                ],
                'To' => $recipients,
                'Subject' => "You just got busted !",
                'TextPart' => "Infraction Notification",
                'HTMLPart' => $htmlContent,
                'CustomID' => "AppGettingStartedTest"
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        /*
        end : send mail notification infraction
        */

        // Rediriger ou effectuer d'autres actions après l'ajout de la pénalité
        header('Location: ../view/index.php');
        exit();
    } else {
        // Option par défaut sélectionnée, aucune action nécessaire
        // Rediriger vers une page appropriée ou afficher un message d'erreur
        header('Location: ../view/index.php?error=no-penalty-selected');
        exit();
    }
}
?>