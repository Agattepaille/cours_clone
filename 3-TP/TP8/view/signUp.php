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

    <title>Sign UP</title>

    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style/auth.css">

    <link rel="stylesheet" href="./style/style.css">

    <script src="scripts/showPassword.js"></script>

    <script src="scripts/passwordChecker.js"></script>

    <script src="scripts/emailCheker.js"></script>    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">



</head>

<body>

    <nav>

        <h1><i class="fa-solid fa-jar"></i> Swear <strong>Jar</strong></h1>

        <a href="login.php">Sign In</a>

    </nav>

    <div class="green-lateral-area left"></div>

    <div class="form-logo">

    <form  id="form" class="signUp">
            <h2><i class="fa-solid fa-user-group"></i> Inscription</h2>
            <input class="champ" name="name" id="name" type="text" placeholder="Name" required maxlength="25"/>
            <input class="champ" name="firstname" id="firstname" type="text" placeholder="Firstname" required maxlength="25"/>
            <input class="champ" name="address" id="address" type="text" placeholder="Address" required maxlength="200"/>
            <select class="champ" name="selectedAddress" id="selectedAddress">
                <option value="" disabled selected>Select an address</option>
            </select>
            <input class="champ" name="tel"  id="tel" type="number" step="1"  placeholder="tel" required maxlength="25"/>
            <input class="champ" id="mail" name="mail" type="text" placeholder="Mail" required maxlength="100" />
            <span id= "text-error"></span>
            <?php
            ?>

            <input class="champ" name="login" id="login" type="text" placeholder="Login" required maxlength="25"/>

            <div class="toggle-visibility">
                <input class="champ password" name="password" type="password" placeholder="Password" id="password" minlength="6"/>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', 'eye')">
                    <i class="fa-solid fa-eye" aria-hidden="true" id="eye"></i>
                </span>
            </div>
            <div id="password-error"></div>
            <div class="checkbox">
                <input type="checkbox" id="terms-conditions" name="terms-conditions" required>
                <label for="terms-conditions">Agree to <a href="rules.php">terms and conditions</a></label>
            </div>
            <button class="submit" type="submit" id="submit" value="Sign up">Sign up</button>
            <div class="sign-in-message"><p>Already Have an account ? </p><a href="login.php"> Sign in</a></div>
    </form>



        <div class="inscription-image">

            <img src=".\assets\money2.png" alt="">

        </div>

    </div>

<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/signUp.js"></script>

</body>

</html>
