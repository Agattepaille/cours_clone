<?php

/*

afficher les nombres divisibles par 3, entre 1 et 100

résultat attendu :

    3
    6
    9
    12
    15
    18
    21
    24
    27
    30
    ...

*/
for ($i=0; $i < 100;) { 
    $i = $i + 3;
    echo "$i ";
}
