<?php
/* include path the the lib_functions file */
include_once "../M/lib_functions.php";
 
/* session initialisation */
session_start();
 
/* creation of a array of places */
$placesList = array("PLACE_1",
"PLACE_2",
"PLACE_3",
"PLACE_4",
"PLACE_5",
"PLACE_6",
"PLACE_7",
"PLACE_8",
"PLACE_9",
"PLACE_10",
"PLACE_11",
"PLACE_12",
"PLACE_13",
"PLACE_14",
"PLACE_15",
"PLACE_16",);
 
/*  creation of a array of students */
$studentsList = ["Simon", "Nacim","Mathilde", "Amelie", "Ricky", "Lyess", "Dylan", "Lorena", "Tina", "Jeremy", "Florent", "Messaoud", "Farid", "Selim", "Abdel-Karim" ];
 
/* creation of array of student locations */
$studentsLocations = createStudentLocations($placesList, $studentsList);
 
/* shuffle array studentsLocations */
$studentsLocations = shuffleLocations($studentsLocations);
 
/* start of session of studentsLocations */
$_SESSION["studentsLocations"] = $studentsLocations;
 
/* send to page displayShuffle.php (view) */
header('Location: ../V/displayShuffle.php');
?>