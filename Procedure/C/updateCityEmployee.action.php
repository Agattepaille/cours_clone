<?php
/* session initialisation */
session_start();

include_once "../M/lib_functions.php";

$employee_id = $_POST["ID"];
$new_city = $_POST["CITY"];
updateCityEmployee($employee_id,$new_city);

$listEmployees[] = selectListEmployees();

for ($i=0; $i < count($listEmployees) ; $i++) { 
    $employees[] = $listEmployees[$i];
}

// start of session of studentsLocations
$_SESSION["employees"] = $employees ;


/* send to page index.php (view) */
header('Location: ../V/index.php');

?>