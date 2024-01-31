<?php
/* session initialisation */
session_start();

// include path the the lib_functions file
include_once "../M/lib_functions.php";

// $studentsList = file($_FILES['file']['tmp_name']);
//$studentsList = $_SESSION["studentsLocations"];

/* creation of array of student locations */
//$studentsLocations = createStudentLocations($placesList, $studentsList);

/* save array in session array  */
$studentsLocations = $_SESSION["studentsLocations"];
//$_SESSION["studentsLocations"] = $studentsLocations ;

/* save array to file  */
saveToCSVFile($studentsLocations);

/* send to page displayShuffleCSV.php (view) */
header('Location: ../V/displayShuffleCSV.php');



?>