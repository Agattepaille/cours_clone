<?php
/*
Made by @Lorena
*/

include "../model/User.class.php";

$user_ID = $_POST['user_ID'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
DBManagement::updateUser($user_ID, $name, $firstname, $tel, $mail);

header("Location: ../view/index.php");
