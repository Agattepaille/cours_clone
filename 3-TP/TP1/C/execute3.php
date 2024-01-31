<?php

// include path the the lib_functions file
include_once "../M/lib_functions.php";

// Set the path to CSV file
$pathFile = '..\CSV_Backups\csv_backup.csv';
$pathFile = getColumnsFromCsv($pathFile, 2);
print_r($pathFile);
?>