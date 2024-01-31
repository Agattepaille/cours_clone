<?php
// include path the the lib_functions file
include_once "../M/lib_functions.php";


$csv = '..\CSV_Backups\csv_backup_ 02-11-2023  CET09-12-47.csv';

$csv = getColumnsFromCsv($csv, 1);

print_r($csv);
?>