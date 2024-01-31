<?php
/* session initialisation */
session_start();

include_once "../M/lib_functions.php";

$firstname = $_POST["firstname"];
$idStudent = $_POST["ID"];
updateStudentFirstname($firstname,$idStudent);

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
"PLACE_16");

$studentsFromDB = selectListStudents();

for ($i=0; $i < count($studentsFromDB) ; $i++) { 
    $studentsList[$i] = $studentsFromDB[$i][0];
}
// creation of array of student locations
$studentsLocations = createStudentLocations($placesList, $studentsList);

/* shuffle array studentsLocations */
$studentsLocations = shuffleLocations($studentsLocations);
// start of session of studentsLocations
$_SESSION["studentsLocations"] = $studentsLocations ;

/* send to page displayShuffle.php (view) */
header('Location: ../V/displayShuffle.php');

?>