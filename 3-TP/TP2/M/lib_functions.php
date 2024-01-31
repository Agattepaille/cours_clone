<?php

/*Inputs :
    $placesList -> tab to list all the places in the class; max size : 16
    $studentsList -> tab to list all students
    return an array [K,V] ex: [[PLACE_1] => "JEREMY", [PLACE_2] => "LORENA"]  
*/
function createStudentLocations(array $placesList, array $studentsList) : array{
    if (sizeof($placesList) == sizeof($studentsList)) {
        $studentsLocations = array_combine($placesList, $studentsList);
        return $studentsLocations;
    } else if (sizeof($placesList) > sizeof($studentsList)) {
        while (sizeof($placesList) > sizeof($studentsList)) {
            array_push($studentsList, "");
        }
        $studentsLocations = array_combine($placesList, $studentsList);
        return $studentsLocations;
    } else if (sizeof($placesList) < sizeof($studentsList)) {
        $studentsList = array_slice($studentsList, 0, sizeof($placesList));
            $studentsLocations = array_combine($placesList, $studentsList);
            return $studentsLocations;
    }
}

/*
    $studentsLocations array [K,V] ex: [[PLACE_1] => "JEREMY", [PLACE_2] => "LORENA"]  
    return the same array shuffled; only values will be randomized 
*/ 
function shuffleLocations(array $studentsLocations) : array{
    $keys = array_keys($studentsLocations);
    $values = array_values($studentsLocations);
    shuffle($values);
    $studentsLocations = array_combine($keys, $values);
    return $studentsLocations;
}

/*
    save  $studentsLocations to CSV format.
    fileName to backup is : csv_backup_DDMMYYYY_HH:MM:SS.csv 
*/
function saveToCSVFile(array $studentsLocations):void{
// Instantiate a DateTime with microseconds.
$d = date_create();
 
// Output the date with microseconds.
$var = date_format($d, 'd-m-Y \ TH-i-s');

$fp = fopen('../CSV_Backups/csv_backup'.$var.'.csv', 'w');
    fputcsv($fp, ["PLACE", "PRENOM", ""], ";", "\n");
    foreach($studentsLocations as $key => $value){
        fputcsv($fp, [$key, $value], ";", "\n");
    }
fclose($fp);
}
    
/*
    create an array from CSV format.
    fileName to backup is : csv_backup_DDMMYYYY_HH:MM:SS.csv 
*/


function csvFileToArray(String $pathfile): array {
    $file = fopen($pathfile, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1000, ";");
    }
    fclose($file);
    return $line;
}

/* the fonction below does not return an array, it returns a string instead.

function csvFileToArray(string $pathfile) {
    $row = 1;
if (($handle = fopen($pathfile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "\n";
        }
    }
    fclose($handle);
}
} */

/*
    create an array from CSV format.
    fileName to backup is : csv_backup_DDMMYYYY_HH:MM:SS.csv 
*/

function getColumnsFromCsv(String $pathFile, int $col): array {
    $file = fopen($pathFile, 'r');
// read the csv file and get the lines
    $nbLinesFile = count(file("$pathFile"));   
    for ($i = 0; $i < $nbLinesFile; $i++) {
        $tabCSV[] = fgetcsv($file, 500, ";");
    }
    fclose($file);
// en dehors de la boucle while : on parcourt chaque ligne colomne par colomne en prenant par défaut colomne 0 + la colomne qu'on veut ($col)
// Gestion des cas où le nombre entré est négatif ou s'il dépasse la taille du tableau
    foreach ($tabCSV as $line) {   
        if ($col < 0) {
        $newTab[] = $line;
// Gestion du cas où on demande une colonne du tableau
        } elseif ($col == 0) {
            $newTab[] = $line[0];
        } elseif ($col >= sizeof($tabCSV[$col])) {
            $newTab = array();
        } else {
            $newTab[] = [$line[0], $line[$col]];
        }
} 
// la fonction retourne le nouveau tableau
return $newTab;
}

?>