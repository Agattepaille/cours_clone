<?php
/* Exercice 36 
• Toujours à partir de deux tableaux précédemment saisis, écrivez un algorithme qui calcule le schtroumpf des deux tableaux. Pour calculer le schtroumpf, il faut multiplier chaque élément du tableau 1 par chaque élément du tableau 2, et additionner le tout. 
Par exemple si l'on a : 
• Tableau 1 : 2  5   8   4
• Tableau 2 : 6  7

• Le Schtroumpf sera : 6*2 + 6*5 + 6*8 + 6*4 + 7*2 + 7*5 + 7*8 + 7*4 = 247 

Algorithme smurfs
    Var array1, array2,  : Integer
    start
    // init variables    
        tab1 <- array(4, 8, 7, 9, 1, 5, 4, 6);
        tab2 <- array(7, 6, 5, 2, 1, 3, 7, 4);
        m <- 0
        smurf <- 0

    // loop for
        for i from  0 to the size of tab1; i++;
            for j from 0 to the size of tab2; j++;
            m <- tab1[i] + tab2[j];
            smurf <- smurf + m 

    // display
        echo smurf;
    end
*/    

// init of array
$tab1 = array (4, 8, 7, 9, 1, 5, 4, 6);
$tab2 = array (7, 6, 5, 2, 1, 3, 7, 4);
$m = array();
$smurf = 0;
 
for ($i = 0; $i < sizeof($tab1) ; $i++) {
    for ($j = 0 ; $j < sizeof($tab2); $j++) {
        $m = $tab1[$i] * $tab2[$j];
        $smurf = $smurf + $m;
    }
}
echo $smurf;
?>