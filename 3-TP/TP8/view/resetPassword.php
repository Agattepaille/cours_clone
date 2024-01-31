<?php

/*

login and persistant session

Author  @Abdelkarim

*/

/* session_start();

if (@$_SESSION["Alreadyconnected"]=="alreadyconnected"){

    header('Location: ../view/index.php');

    exit();

} */

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

    <script src="scripts/resetPassword.js"></script>    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">

</head>

<body>

    <nav>

        <h1><i class="fa-solid fa-jar"></i> Swear <strong>Jar</strong></h1>

        <a href="login.php">Sign In</a>

    </nav>

    <div class="green-lateral-area left"></div>

    <div class="form-logo">

<form id= "form" action="../controller/resetPassword.action.php" class="signUp" method="POST">

    <h2><i class="fa-solid fa-user-group"></i> Reset Password</h2>



    <!-- Premier champ de mot de passe -->

    <div class="toggle-visibility">

        <input class="champ password" name="password1" type="password" placeholder="New password" id="password1" />

        <span class="toggle-password" onclick="togglePasswordVisibility('password1', 'eye1')">

            <i class="fa-solid fa-eye" aria-hidden="true" id="eye1"></i>

        </span>

    </div>

    <div id="password-error1"></div>



    <!-- Deuxième champ de mot de passe avec le bouton de visibilité -->

    <div class="toggle-visibility">

        <input class="champ password" name="password2" type="password" placeholder="Confirm new password" id="password2" />

        <span class="toggle-password" onclick="togglePasswordVisibility('password2', 'eye2')">

            <i class="fa-solid fa-eye" aria-hidden="true" id="eye2"></i>

        </span>

    </div>

    <div id="password-error2"></div>



    <button class="submit" type="submit" value="Sign up">Reset password</button>



    <div class="sign-in-message"><p>New to Swear Jar ? </p><a href="signUp.php"> Sign up</a></div>

</form>







        <div class="inscription-image">

            <img src=".\assets\dragon.png" alt="">

        </div>

    </div>

</body>

</html>

