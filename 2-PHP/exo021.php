<?php 
/*
Exercice 5 : Créez une fonction nommée "genererMotDePasse" qui génère un mot de passe aléatoire de longueur donnée. 
Le mot de passe doit contenir des lettres majuscules, des lettres minuscules et des chiffres.
// Exemple d'utilisation :
$resultat = genererMotDePasse(8); // Exemple de mot de passe généré : "aB3x7Kp2"
*/

function genererMotDePasse(int $num): String{
    // Stockez toutes les lettres possibles dans une chaîne.
    $mdp = '';
    $strMin = "abcdefghijklmnopqrstuvwxyz";
    $strMax = "ABCDEFGHIJKLMNOPQRSTUVWXYZ" ;
    $strInt = "0123456789";
    $strAll = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    // Générez un index aléatoire de 0 à la longueur de la chaîne -1.
    for ($i = 0; $i < 4; $i++) { 
        /* $index = rand(0, strlen($str)); 
        $mdp .= $str[$index]; */
        if ($i == 0) {
            $strMin = rand(0, strlen($strMin));
            var_dump($strMin);
        } if ($i == 1) {
            $strMax = substr($strMax, 0, 1);
        } if ($i == 2) {
            $strInt = substr($strInt, 0, 1);
        } if ($i == 3) {
            $strAll = substr($strAll, 0, $num-3);
        }
    }

return $mdp;
}

$num = 8;
$resultat = genererMotDePasse($num); // Exemple de mot de passe généré : "aB3x7Kp2"
echo $resultat;

?>