<?php 
/*
Exercice 3 : Créez une fonction nommée "estPalindrome" qui prend une chaîne de caractères en entrée et renvoie vrai si la chaîne est un palindrome 
se lit de la même manière de gauche à droite et de droite à gauche), sinon renvoie faux.
 
// Exemple d'utilisation :
$resultat = estPalindrome("radar"); // Renvoie vrai
 
*/

function estPalindrome(String $chaine): String {
    $chaineInverse = strtolower(strrev($chaine));
    if (strtolower($chaine) == $chaineInverse) {
        return $resultat = "Palindrome";
    } else {
        return $resultat = " Pas Palindrome";
    }
}
$resultat = estPalindrome("radar");
echo $resultat;

?>