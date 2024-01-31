<?php 
/*
Exercice 6 : Créez un script qui génère une séquence de nombres de 5 en 5, commençant par 20 et s'arrêtant à 100 à l'aide d'une boucle "while".
 
*/

$i = 20;
while ($i < 100) {
    $resultat = $i +=5;
    echo "$resultat ";
}

?>