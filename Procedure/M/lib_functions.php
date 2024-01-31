<?php 
//Methode qui renvoie la liste des employés depuis la BDD
function selectListEmployees() : array
{
    //driver vers la DB
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $stmt = $bdd->prepare("CALL `readEmployees`();");
    $stmt->execute();
    //rapatrie toutes les lignes de la table
    $listEmployees = $stmt->fetchAll();
    return $listEmployees;
}

//methode qui ajoute une personne
function insertEmployee($firstname, $surname, $job, $city) : void {       
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $sql = "CALL `insertNewEmployee`(?, ?, ?, ?)";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$firstname, $surname, $job, $city]);
}

// méthode qui supprime un employé
function deleteEmploye($employee_id) : void {       
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $sql = "CALL `deleteEmployee`(?)";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$employee_id]);
}

// méthode qui modifie le job d'un employé
function updateJobEmployee($employee_id, $new_job): void {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $sql = "CALL UpdateEmployeeJob(?, ?)";
    // Préparation de l'appel de la procédure stockée
    $stmt = $bdd->prepare($sql);
    // Exécution de la procédure stockée
    $stmt->execute([$employee_id, $new_job]);
}

// méthode qui modifie la ville d'un employé
function updateCityEmployee($employee_id, $new_city): void {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $sql = "CALL `updateCity`(?, ?)";
    // Préparation de l'appel de la procédure stockée
    $stmt = $bdd->prepare($sql);
    // Exécution de la procédure stockée
    $stmt->execute([$employee_id, $new_city]);
}

// méthode qui récupère le nombre total d'employés
function getCountOfEmployees(): int {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $sql = "CALL countTotalEmployees();";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([]);
    // Récupérer le résultat de la procédure stockée sous forme de tableau
    $totalEmployees = $stmt->fetch(PDO::FETCH_ASSOC);
    // retourne la valeur du tableau
    return $totalEmployees['total'];
}



function getCountOfEmployeesOutsideLille(): int {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
    $sql = "CALL `countOfEmployeesOutsideOfLille`();";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    // Récupérer le résultat de la procédure stockée sous forme de tableau
    $totalEmployeesOut = $stmt->fetch(PDO::FETCH_ASSOC);
    // retourne la valeur du tableau
    return $totalEmployeesOut['totalOut'];
}
?>