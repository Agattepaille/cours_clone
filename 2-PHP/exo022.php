<?php 
/*
Exercice 10 : Manipulation de chaînes avec substr()
Description : Écrivez un script PHP qui prend une chaîne de caractères et utilise la fonction native substr() 
pour extraire une sous-chaîne à partir de la 4e position. 
Affichez la sous-chaîne extraite.
*/

function extractString(String $string): String{
    $stringShortened = substr($string, 4);
    return $stringShortened;
}

$string = "bbbeeee";
echo extractString($string);

?>