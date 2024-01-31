<?php
/* session initialisation */
//session_start();

include_once "../M/lib_functions.php";

$employee_firstname = $_POST["firstname"];
$employee_surname = $_POST["surname"];
$employee_job = $_POST["job"];
$employee_city = $_POST["city"];
insertEmployee($employee_firstname,$employee_surname,$employee_job,$employee_city);

// récupère la liste des employés de la BSS et les met dans un tableau
$listEmployees = selectListEmployees();

for ($i=0; $i < count($listEmployees) ; $i++) { 
    $employees[] = $listEmployees[$i];
}

// start of session of studentsLocations
$_SESSION["employees"] = $employees ;

/* send to page index.php (view) */
header('Location: ../V/index.php');


?>