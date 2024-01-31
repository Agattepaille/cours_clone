<?php
include_once "../model/User.class.php";

/*
Made by @Dylan
*/

$name = $_POST['name'];
$firstname = $_POST['firstname'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$login = $_POST['login'];
$password = $_POST['password'];
$address = $_POST['address'];

if(isset($_POST['login']) && isset($_POST['password']) ){
    if (DBManagement::doesAccountExist($mail,$login) == false) {
        $res = array('status' => true);
        DBManagement::addUserToDB(new User($name, $firstname, $tel, $mail, $login, $password,$address));

    }else{ // Sinon
        $res = array('status' => false);
    }
    
}

echo json_encode($res);

?>

