<?php
/*
Made by @Amelie
*/


include_once '../model/DBManagement.class.php';
include_once "../model/User.class.php";
use \Mailjet\Resources;

/* session initialisation */
session_start();

// V�rifier si le formulaire a �t� soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // R�cup�rer les donn�es du formulaire
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $message = $_POST["message"];

        /*
        Made by @Amelie
        start : send mail notification infraction
        */
        
        require 'vendor/autoload.php';
        $mj = new \Mailjet\Client('b7dfac8f27deb661e165e9019317bd00','1a1ea062d99882c21f8facac3c80a898',true,['version' => 'v3.1']);
        // Define recipients
        $recipients = [
            [
                'Email' => 'swearjar@outlook.fr',
                'Name' => 'Swear Jar'
            ],
            [
                'Email' => 'amelie.gattepaille@gmail.com',
                'Name' => 'Am�lie Gattepaille'
            ],
            [
                'Email' => 'dylan.rohart@hotmail.fr',
                'Name' => 'Dylan Rohart'
            ],
            [
                'Email' => 'lorenamaria@outlook.fr',
                'Name' => 'Lorena Yawadio '
            ],
            [
                'Email' => 'boucharafa.abdelkarim@gmail.com',
                'Name' => 'Abdel-Karim Boucharafa'
            ]
        ];

        function mailContent($name,$message,$mail) {
        return '<!doctype html>
        <html lang="en-US">

        <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <title>Contact Email</title>
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
                                <h1>Swear <strong class="reverse-title">Jar</strong></h1>
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
                                            <h1 style="color:#1e1e2d; font-weight:700; margin-top:0; margin-bottom:20px;font-size:32px;font-family:\'Rubik\',sans-serif;">You have a new message...</h1>
                                                <h6 style="color:#1e1e2d; font-weight:300; margin:0;font-size:32px;font-family:\'Rubik\',sans-serif;">...from <span style="color:#145548; font-weight:700;">'.$name.'</span></h6>
                                                <span
                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                '.$message.'</p>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                E-mail address of the sender :  '.$mail.'</p>
                                        

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
        $htmlContent = mailContent($name,$message,$mail);
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => 'swearjar@outlook.fr',
                'Name' => $name
                ],
                'To' => $recipients,
                'Subject' => "Message from Swear Jar form",
                'TextPart' => "Message",
                'HTMLPart' => $htmlContent,
                'CustomID' => "AppGettingStartedTest"
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        /*
        end : send mail notification infraction
        */

// Redirection vers la page de login
    header('Location: ../view/contactUs.php');
    exit();
} else {
    echo "Le mail ne s'est pas envoy�";
}

?>