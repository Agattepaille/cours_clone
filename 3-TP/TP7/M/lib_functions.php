<?php
 
/*Inputs :
    $placesList -> tab to list all the places in the class; max size : 16
    $studentsList -> tab to list all students
    return an array [K,V] ex: [[PLACE_1] => "JEREMY", [PLACE_2] => "LORENA"]  
*/

// nouvelle fonction avec array_pop et boucle for
function createStudentLocations(array $placesList, array $studentsList) : array{
    if (sizeof($studentsList) == sizeof($placesList)) {
        $studentsLocations = array_combine($placesList, $studentsList);
    } elseif (sizeof($studentsList) > sizeof($placesList)) {
            for ($i=0; sizeof($studentsList) > sizeof($placesList) ; $i++) { 
                array_pop($studentsList);
            }
            $studentsLocations = array_combine($placesList, $studentsList);
    } elseif (sizeof($studentsList) < sizeof($placesList)) {
        for ($i=0; sizeof($studentsList) < sizeof($placesList) ; $i++) { 
            array_push($studentsList, "EMPTY");
        }
        $studentsLocations = array_combine($placesList, $studentsList);
    }
    return $studentsLocations;
}

//ancienne fonction createStudentLocation
/* function createStudentLocations(array $placesList, array $studentsList) : array{
    if (sizeof($placesList) == sizeof($studentsList)) {
        $studentsLocations = array_combine($placesList, $studentsList);
        return $studentsLocations;
    }elseif ($placesList > $studentsList) {
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
} */

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

/* Create an array from CSV */
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

//Methode qui renvoie la liste des employés depuis la BDD
function selectListStudents() : array
{
    //driver vers la DB
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_students;charset=utf8mb4', 'root', '');
    $stmt = $bdd->prepare("SELECT * FROM `students`; ");
    $stmt->execute();
    //rapatrie toutes les lignes de la table
    $listStudents = $stmt->fetchAll();
    return $listStudents;
}

//methode qui ajoute une personne
function insertStudents($name, $firstname, $gender) : void {       
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_students;charset=utf8mb4', 'root', '');
    $sql = "INSERT INTO students (name, firstname, gender) VALUES (?,?,?)";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$name, $firstname, $gender]);
}

// méthode qui supprime une personne
function deleteStudent($idStudent) : void {       
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_students;charset=utf8mb4', 'root', '');
    $sql = "DELETE FROM `students` WHERE ID = ?";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$idStudent]);
}

//methode qui modifie le prénom d'une personne
/* function updateStudent($firstname,$idStudent) : void {       
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_students;charset=utf8mb4', 'root', '');
    $sql = "UPDATE `students` SET firstname = ? WHERE ID= ? ";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$firstname, $idStudent]);
} */

function updateStudentFirstname($idStudent, $firstname): void {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_students;charset=utf8mb4', 'root', '');
    // Vérifier la connexion
    /* if (!$bdd) {
        die('Erreur de connexion à la base de données');
    } */

    $sql = "CALL UpdateStudentFirstname(?, ?)";
    // Préparation de l'appel de la procédure stockée
    $stmt = $bdd->prepare($sql);

    // Vérifier si la préparation a réussi
    /* if (!$stmt) {
        die('Échec de la préparation de la procédure stockée');
    } */

    // Liage des paramètres d'entrée
    /* $stmt->bindParam(1, $id_student, PDO::PARAM_INT);
    $stmt->bindParam(2, $new_firstname, PDO::PARAM_STR); */

    // Exécution de la procédure stockée
    $stmt->execute([$firstname, $idStudent]);
    //$stmt->execute();

    // Fermeture du statement
    //$stmt->closeCursor();

    // Fermer la connexion à la base de données
    //$bdd = null;
}
?>