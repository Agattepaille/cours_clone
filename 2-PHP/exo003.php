<?php 
/*
Exercice 3 : Créez un tableau de chaînes de caractères contenant des phrases. Utilisez une boucle foreach pour trouver la phrase la plus longue dans le tableau.
*/
$phrases = array(
    "La vie est belle.",
    "L'apprentissage est essentiel pour grandir.",
    "Le monde est vaste et mystérieux."
);

$phraseMax = 0;
foreach ($phrases as $phrase) {
    if (strlen($phrase) > strlen($phraseMax)) {
        $phraseMax = $phrase;
    }
}
echo $phraseMax;




?>