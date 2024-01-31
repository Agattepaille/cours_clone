<?php
/* session initialisation */
session_start();

// include path the the lib_functions file
include_once "../M/lib_functions.php";

/*  load the csv file */
$pathfile = $_FILES['file']['tmp_name'];

/*  get the column chosen by radio button */
$CSV = getColumnsFromCsv($pathfile, $_POST["colonne"]);

/*  loop to display the column chosen and lines */
for ($i=1; $i < sizeof($CSV)-1 ; $i++) { 
    $placesList[] = $CSV[$i][0];
    $displayList[] = $CSV[$i][1];
}

/*  creation of an array of students */
$CSV = createStudentLocations($placesList, $displayList);

/*  save the array of students into array Session */
$_SESSION["studentsLocations"] = $CSV;

/* shuffle array studentsLocations */
//$studentsLocations = shuffleLocations($studentsLocations);

/* send to page displayShuffleCSV.php (view) */
header('Location: ../V/displayShuffleCSV.php');



?>