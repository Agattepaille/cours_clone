
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
    }
    if ($placesList > $studentsList) {
        while (sizeof($placesList) > sizeof($studentsList)) {
        array_push($studentsList, "");
    }
    $studentsLocations = array_combine($placesList, $studentsList);
    return $studentsLocations;
    }
    if ($placesList < $studentsList) {
        while (sizeof($placesList) < sizeof($studentsList)) {
            array_slice($studentsList,0 , sizeof($placesList));
        }
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
    $date = date_create();
    $formatDate = date_format($date, 'd-m-Y \ TH-i-s');
 
    $fp = fopen('..\CSV_Backups\csv_backup_'.$formatDate.'.csv', 'w');

     fputcsv($fp, ["PLACE","PRENOM"],";", "\n");

         foreach ($studentsLocations as $key => $value) {
         fprintf($fp, "%s;%s", $key, $value);
         }
    
    fclose($fp);
}

/*
Create an array from CSV
*/

function csvFileToArray($csv){
    $file = fopen($csv,'r');
    while (!feof($file)) {
        $line[] = fgetcsv($file, 50,";");
    }
    fclose($file);
    return $line;
}

// Create array multi


function getColumnsFromCsv(String $pathfile, int $col): array {
    $file = fopen($pathfile, 'r');
    while (!feof($file)) {
        $tablines[] = fgetcsv($file, 1000, ";");
    }

    fclose($file);
   
      foreach ($tablines as $line) {
        if ($col > 0  && $col < count($tablines[0])) {
            $newTab[] = [$line[0], $line[$col]];
            }  
      
        elseif ($col == 0) {
            $newTab[] = [$line[0],];
            }

        elseif ($col < 0){
            $newTab = $tablines;
           }
        
        elseif ($col >= count($tablines[0])) {
            $newTab = array();
            
        }
    }
        return $newTab;
    }

?>