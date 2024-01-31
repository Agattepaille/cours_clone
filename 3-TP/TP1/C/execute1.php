<?php
// include path the the lib_functions file
include_once "../M/lib_functions.php";

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

$studentsList = [ "Simon", "Nacim", "Mathilde", "Amelie", "Ricky", "Lyess", "Dylan", "Lorena", "Tina", "Jeremy", "Florent", "Messaoud", "Farid", "Selim", "Abdel-Karim"];

$studentsLocations = createStudentLocations($placesList, $studentsList);

$studentsLocations = shuffleLocations($studentsLocations);
//print_r($studentsLocations);
saveToCSVFile($studentsLocations);

?>