<?php
/*
Author  @Abdelkarim
login and persistant session and logout
*/
session_start();


// Unset des variables de cookies côté serveur
unset($_COOKIE["user_id"]);
unset($_COOKIE["user_name"]);
unset($_COOKIE["user_firstname"]);
unset($_COOKIE["user_tel"]);
unset($_COOKIE["user_mail"]);
unset($_COOKIE["user_login"]);
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
unset($_SESSION["user_firstname"]);
unset($_SESSION["user_tel"]);
unset($_SESSION["user_mail"]);
unset($_SESSION["user_login"]);

// Détruit les cookies persistants côté client en attribuant une date d'expiration immédiate
setcookie("user_id", "", time() - 3600, "/");
setcookie("user_name", "", time() - 3600, "/");
setcookie("user_firstname", "", time() - 3600, "/");
setcookie("user_tel", "", time() - 3600, "/");
setcookie("user_mail", "", time() - 3600, "/");
setcookie("user_login", "", time() - 3600, "/");

// Vide le tableau de session
session_unset();


// Détruit la session côté serveur
session_destroy();

header('Location: ../view/login.php');
?>

