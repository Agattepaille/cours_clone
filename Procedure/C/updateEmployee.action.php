<?php
/* session initialisation */
session_start();

include_once "../M/lib_functions.php";

$employee_id = $_POST["employee_id"];
$new_job = $_POST["new_job"];
updateEmployeeJob($employee_id,$new_job);

$employees[] = selectListEmployees();

for ($i=0; $i < count($listEmployees) ; $i++) { 
    $employees[] = $listEmployees[$i];
}

// start of session of studentsLocations
$_SESSION["employees"] = $employees ;


/* send to page index.php (view) */
header('Location: ../V/index.php');

?>