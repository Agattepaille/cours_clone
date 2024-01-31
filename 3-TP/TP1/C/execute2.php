<?php

// include path the the lib_functions file
include_once "../M/lib_functions.php";

// Set the path to CSV file
$pathFile = '..\CSV_Backups\csv_backup.csv';
$pathFile = csvFileToArray($pathFile);
print_r($pathFile);
?>