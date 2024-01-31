<?php 
/*Exercice 1 : Créez un tableau associatif contenant des informations sur des livres (
titre, auteur, année de publication). 
Utilisez les boucles foreach pour afficher ces informations .
 
$books = array(
    array("titre" => "L'Étranger", "auteur" => "Albert Camus", "année" => 1942),
    array("titre" => "1984", "auteur" => "George Orwell", "année" => 1949),
    array("titre" => "Le Petit Prince", "auteur" => "Antoine de Saint-Exupéry", "année" => 1943)
);
*/

$books = array(
    array("titre" => "L'Étranger", "auteur" => "Albert Camus", "année" => "1942"),
    array("titre" => "1984", "auteur" => "George Orwell", "année" => "1949"),
    array("titre" => "Le Petit Prince", "auteur" => "Antoine de Saint-Exupéry", "année" => "1943")
);


foreach ($books as $book) {
    echo PHP_EOL;
    foreach ($book as $key => $value) {
        echo "$key " ."$value";    
        echo PHP_EOL;
    }
}

?>