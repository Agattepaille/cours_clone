<?php
/* session initialisation */
session_start();

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
"PLACE_16");

// récupère la liste des étudiants de la BSS et les met dans un tableau
$listStudents = selectListStudents();

//Boucle for each pour récupérer la valeur de chaque ligne à la colonne "firstname" de la BDD
/* foreach ($listStudents as $key => $value) {
    $studentsList[] = $value["firstname"];
} */
for ($i=0; $i < count($listStudents) ; $i++) { 
    $studentsList[$i] = $listStudents[$i][0];
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