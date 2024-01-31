<?php
/*
Author  @Abdelkarim
login and persistant session
*/
session_start();
include_once '../model/User.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (DBManagement::checkValidLoginFromDB($login, $password) == TRUE) {
        if ($_SESSION["TokenGrant"] = "TokenGranted") {
            $_SESSION["Alreadyconnected"] = "alreadyconnected";
        // Récupère les informations de l'utilisateur depuis la base de données
        $user = DBManagement::getInfoUserFromDB('login',$_POST['login']);

        // Démarrer la session
        $_SESSION["user_id"] = $user->getUser_ID();
        $_SESSION["user_name"] = $user->getName();
        $_SESSION["user_firstname"] = $user->getFirstname();
        setcookie("user_id", $user->getUser_ID(), 0, "/");
        setcookie("user_name", $user->getName(), 0, "/");
        setcookie("user_firstname", $user->getFirstname(), 0, "/");
        setcookie("user_tel", $user->getTel(), 0, "/");
        setcookie("user_mail", $user->getMail(), 0, "/");
        setcookie("user_login", $user->getLogin(), 0, "/");
        // Redirection vers la page d'accueil
        header('Location: ../view/index.php');
    }
    }
    if (DBManagement::checkValidLoginFromDB($login, $password) == False){
        if (DBManagement::checkValidLoginFromDB($login, $password) == False){
        $_SESSION["BADPASSWORD"]+= 1;

    }
}}