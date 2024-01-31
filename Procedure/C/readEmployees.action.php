<?php
/* pas de session initialisation ici car fichier déjà inclus dans l'index */
//session_start();

include_once "../M/lib_functions.php";

// récupère la liste des employés de la BSS et les met dans un tableau
$listEmployees = selectListEmployees();

for ($i=0; $i < count($listEmployees) ; $i++) { 
    $employees[] = $listEmployees[$i];
}

// Appel de la fonction pour obtenir le nombre d'employés
$totalEmployees = getCountOfEmployees();

// Appel de la fonction pour obtenir le nombre d'employés
$totalEmployeesOut = getCountOfEmployeesOutsideLille();


/* pas de header ici car fichier readEmployees.action.php déjà inclus dans fichier index.php */
//header('Location: ../V/index.php');


?>