<?php 
/*
Exercice 2 : Écrivez une fonction nommée "calculerMoyenne" qui prend un tableau de nombres en entrée et renvoie la moyenne de ces nombres.
Utiliser les fonctions array_sum() et count() 
 
// Exemple d'utilisation :
$listeNombres = array(10, 20, 30, 40, 50);
$resultat = calculerMoyenne($listeNombres); // Renvoie 30
*/

$listeNombres = array(10, 20, 30, 40, 50);
function calculerMoyenne(array $listeNombres): int {
    $moyenne = array_sum($listeNombres) / count($listeNombres);
    return $moyenne;
}
$resultat = calculerMoyenne($listeNombres); 
echo $resultat;
?>