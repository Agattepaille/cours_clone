

<?php

/*

login and persistant session

Author  @Abdelkarim

*/

session_start();

if (@$_SESSION["Alreadyconnected"]=="alreadyconnected"){

    header('Location: ../view/index.php');

    exit();

}



?>



<!DOCTYPE html>

<!-- CSS AND HMTL

Made by @Dylan

-->

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style/auth.css">

    <link rel="stylesheet" href="./style/style.css">

    <script src="scripts/showPassword.js"></script>
    <script src="scripts/emailcheckForgotPW.js"></script>    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">

</head>



<body>

    <nav>

        <h1><i class="fa-solid fa-jar"></i> Swear <strong class="reverse-title">Jar</strong></h1>

        <a href="login.php" class="reverse-link">Sign In</a>

    </nav>

    <div class="green-lateral-area right"></div>

    <div class="logo-form">

    <form id = "form" action="../controller/sendMailResetPassword.action.php" method="POST">

        <h2><i class="fa-solid fa-user-group"></i> Forgot Password</h2>

    <!-- Premier champ de mot de passe -->

        <input class="champ" id = "mail" name="mail" type="text" placeholder="Mail" required maxlength="100" />

        <input class="champ" id = "confirm-mail" name="confirm-mail" type="text" placeholder="Confirm Mail" required maxlength="100" />

        <div id="email-error"></div>

        <div id="email-error1"></div>

        <button class="submit" type="submit" value="Sign up">Send help !</button>



    <div class="sign-in-message"><p>New to Swear Jar ? </p><a href="signUp.php"> Sign up</a></div>

</form>





        <div class="inscription-image">

            <img class="forgot-password-image" src=".\assets\forgot-password.png" alt="">

        </div>

    </div>

</body>

</html>

