<?php 
/*
Exercice 4 : Écrivez une fonction nommée "compterMots" qui prend une chaîne de caractères en entrée et renvoie le nombre de mots dans cette chaîne.
 
// Exemple d'utilisation :
$texte = "Ceci est un exemple de texte.";
$resultat = compterMots($texte); // Renvoie 6
*/

function compterMots(String $texte): int {
    return str_word_count($texte);
}
$texte = "Ceci est un exemple de texte.";
$resultat = compterMots($texte); // Renvoie 6
echo $resultat;

?>