<?php
/*
login and persistant session and bad password typed
Author  @Abdelkarim
*/



session_start();
if (@$_SESSION["Alreadyconnected"]=="alreadyconnected"){
    header('Location: ../view/index.php');
}
if (@$_SESSION["BADPASSWORD"]=="1"){
    echo '<script>var errorMessage = "Password Or login incorrect";</script>';
}
if (@$_SESSION["BADPASSWORD"]=="2"){
    echo '<script>var errorMessage = "I Said, password or login incorrect";</script>';
}
if (@$_SESSION["BADPASSWORD"]=="3"){
    echo '<script>var errorMessage = "Nope, still Not The good creditentials.";</script>';
}
if (@$_SESSION["BADPASSWORD"]=="4"){
    echo '<script>var errorMessage = "Try again";</script>';
}
if (@$_SESSION["BADPASSWORD"]>= "5"){
    echo '<script>var errorMessage = "Stop trying, just reset your password already..";</script>';
} 


?>





<!--

    CSS AND HTML

Made by @Dylan

-->

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <script src="https://kit.fontawesome.com/3f8f1bd356.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/auth.css">
    <link rel="stylesheet" href="./style/style.css">
    <script src="scripts/showPassword.js"></script>
    <script src="scripts/validPassword.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="icon" type="image/x-icon" href="../view/assets/jar-solid.ico">

</head>

<body>

    <nav>

        <h1><i class="fa-solid fa-jar"></i> Swear <strong class="reverse-title">Jar</strong></h1>

        <a href="signUp.php" class="reverse-link">Sign up</a>

    </nav>



    <div class="green-lateral-area right"></div>



    <div class="logo-form">
        <form action="../controller/login.action.php" class="signUp" method="POST">
        <h2><i class="fa-solid fa-user-group"></i> Login</h2>
            <input class="champ" name="login" type="text" placeholder="login"/>
            <div class="toggle-visibility">
                <input class="champ password" name="password" type="password" placeholder="Password" id="password"/>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', 'eye')">
                    <i class="fa-solid fa-eye" aria-hidden="true" id="eye"></i>
                </span>
            </div>
            <button class="submit login" type="submit" value="Sign up">Log me in!</button>



            <div class="sign-in-message"><p>New to Swear Jar ? </p><a href="signUp.php"> Sign up</a></div>

            <div class="sign-in-message"><a href="forgotPassword.php">Forgot your password ?</a></div>

        </form>



        <div class="inscription-image">

            <img src=".\assets\money.png" alt="">

        </div>

    </div>



</body>

</html>

