<?php
/* Exercice 24
    Les habitants de Paris paient l'impôt selon les règles suivantes :
    - les hommes de plus de 20 ans paient l'impôt
    - les femmes paient l'impôt si elles ont entre 18 et 35 ans
    - les autres ne paient pas d'impôt
    Le programme demandera donc l'âge et le sexe du parisien, 
    et se prononcera donc ensuite sur le fait que l'habitant est imposable.


Algorithme tax
    Var sexe, f, m, age : integer
    start
        // variable
        sexe <- read "tapez f pour femme ou h pour homme"
        age <- read "entrez votre age"
              

        // conditions taxes
        if (sexe == h && age > 20 or sexe == f && && age > 18 or age < 35) {
            print "Vous êtes imposable";
        }
        else {
            print "Vous n'êtes pas imposable";
        }
    end
*/    

// init variables
$sexe = readline ("tapez f pour femme ou h pour homme ");
$age = readline ("entrez votre âge ");

// conditions
if ($sexe == "h" && $age > 20 or $sexe == "f" && $age > 18 or $age < 35) { 
    echo "Vous êtes imposable";
}
else {
    echo "Vous n'êtes pas imposable";
}
?>