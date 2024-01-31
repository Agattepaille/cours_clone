<?php
/*
Made by @Amelie
*/

/* session initialisation */
session_start();

include_once "../model/User.class.php";

// récupérer l'ID de l'utilisateur qu'on veut supprimer
$user_ID = $_POST['user_ID'];

// supprimer l'utilisateur
DBManagement::deleteUser($user_ID);

// réafficher la liste Users
$allUsers = DBManagement::readUsers();
$_SESSION["allUsers"] = $allUsers;


header('Location: ../view/index.php');

