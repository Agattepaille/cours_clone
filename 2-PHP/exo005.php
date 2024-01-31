<?php 
/*
Exercice 5 : Créez un tableau multidimensionnel avec des informations sur des employés (nom, salaire, département). 
Utilisez une boucle foreach pour calculer la moyenne des salaires dans chaque département.
*/

$employees = array(
    array("nom" => "Alice", "salaire" => 5000, "département" => "Ventes"),
    array("nom" => "Bob", "salaire" => 6000, "département" => "Ventes"),
    array("nom" => "Charlie", "salaire" => 7000, "département" => "RH"),
    array("nom" => "David", "salaire" => 5500, "département" => "RH")
);

$salarySales = array();
$salaryHR = array();
foreach ($employees as $employee) {
    foreach ($employee as $key => $value) {
       if ($value == "Ventes"){ 
            $salarySales[] = $employee["salaire"];
            $sum = array_sum($salarySales);
            $averageSalarySales = $sum / count($salarySales);
        } else if ($value == "RH"){ 
            $salaryHR[] = $employee["salaire"];
            $sum = array_sum($salaryHR);
            $averageSalaryRH = $sum / count($salaryHR);
        }
    }
}

echo "La moyenne département Ventes : $averageSalarySales".PHP_EOL."La moyenne département RH : $averageSalaryRH";

?>