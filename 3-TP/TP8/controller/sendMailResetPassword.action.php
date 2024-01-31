<?php
/*
Made by @Amelie
*/



include_once '../model/DBManagement.class.php';
include_once "../model/User.class.php";
use \Mailjet\Resources;

/* session initialisation */
session_start();
// echo "ntm";
// die();
// vérifier que le mail écrit par l'utilisateur correspond à un mail existant en base de donnée
if (DBManagement::doesMailExist($_POST['mail']) == true or DBManagement::doesMailExist($_POST['confirm-mail']) == true) {
    // Vérifier si les deux mails écrits par l'utilisateur sont identiques puis sauvegarder l'adresse mail
    if ($_POST['mail'] === $_POST['confirm-mail']) {
        $mail = $_POST['mail'];
        $user = DBManagement::getInfoUserFromDB('mail',$_POST['mail']);

        // generate a new random password to send to the user
            
        $randomPassword = DBManagement::random_password(12);
        // save the new password in database
        DBManagement::resetUserPassword($user,$randomPassword);

        require 'vendor/autoload.php';
        $mj = new \Mailjet\Client('b7dfac8f27deb661e165e9019317bd00','1a1ea062d99882c21f8facac3c80a898',true,['version' => 'v3.1']);
        // Define recipients
        $recipients = [
            [
                'Email' => $mail
            ]
        ];

        function mailContent($userFirstname,$randomPassword) {
        return '<!doctype html>
        <html lang="en-US">

        <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <title>Reset Password Email</title>
            <meta name="description" content="Reset Password Email">
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
                                                <h6 style="color:#1e1e2d; font-weight:300; margin-top:0; margin-bottom:20px;font-size:32px;font-family:\'Rubik\',sans-serif;">Hello <span style="color:#145548; font-weight:700;">'.$userFirstname.'</span>!</h6>
                                                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:\'Rubik\',sans-serif;">You have
                                                    requested to reset your password</h1>
                                                <span
                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Here is your new temporary password : <strong>'.$randomPassword.'</strong>
                                                </p>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                You can reset your password once you are connected.
                                                </p>
                                                <a href="login.php" 
                                                style="background-color:#145548;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login</a>
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

        $htmlContent = mailContent($userFirstname,$randomPassword);
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "swearjar@outlook.fr",
                'Name' => "Swear Jar"
                ],
                'To' => $recipients,
                'Subject' => "Greetings from Swear Jar",
                'TextPart' => "Reset Your Password",
                'HTMLPart' => $htmlContent,
                'CustomID' => "AppGettingStartedTest"
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);


    } 
    else {
    }
    header('Location: ../view/login.php');
 } 
?>