<?php


     
    $username = "admin";
    $password = "admin";
 	$identite = "";
  
    if( isset($_POST['username']) && isset($_POST['password']) ){
 
        if($_POST['username'] == $username && $_POST['password'] == $password){
			$res = array(
				  'nom' => 'Jean', 
				  'prenom' => 'Rachid', 
				  'age' => 25, 
				  'profil' => 'admin', 
				  'status' => true
					);
        }
        else{ // Sinon
			$res = array('status' => false);
        }
    }

	echo json_encode($res);
	
?>