<?php
include_once "Utilisateur.class.php";

$profil1 = new Profil("CP","Chef de projet");
$profil2 = new Profil("MN","Manager");
$profil3 = new Profil("DP","Directeur de projet");
$profil4 = new Profil("DRH","Directeur des ressources humaines");
$profil5 = new Profil("DG","Directeur général");

$tabUtilisateurs = array (
$utilisateur1 = new Utilisateur("Afhim","Moussa","m.afhim@afpa.fr","00-00-00-00-00",1000,"login","password","Informatique",$profil1),
$utilisateur2 = new Utilisateur("Minaj","Ricky","r.minaj@afpa.fr","00-00-00-00-00",1000,"login","password","Clubbing",$profil2),
$utilisateur3 = new Utilisateur("Fourcade","Martin","m.fourcade@afpa.fr","00-00-00-00-00",1000,"login","password","Biathlon",$profil3),
$utilisateur4 = new Utilisateur("Leprevost","Pénélope","p.leprevost@afpa.fr","00-00-00-00-00",1000,"login","password","Equitation",$profil4),
$utilisateur5 = new Utilisateur("Mayer","Kevin","k.mayer@afpa.fr","00-00-00-00-00",1000,"login","password","Decathlon",$profil5)
);

// boucle pour afficher la liste des utilisateurs
echo "Liste des utilisateurs : ".PHP_EOL;
foreach ($tabUtilisateurs as $utilisateurs) {
    $utilisateurs->calculerSalaire();
    $utilisateurs->affiche().PHP_EOL;
}

// boucle pour filtrer la liste des managers
echo "Liste des managers : ".PHP_EOL;
foreach ($tabUtilisateurs as $utilisateur) {
    if ($utilisateur->getProfil()->getCode() == "MN") {
        $utilisateur->affiche().PHP_EOL;
    }
}


// 2 Affichage des augmentations
/* foreach ($tabUtilisateurs as $utilisateur) {
    if ($utilisateur->getProfil()->getCode() == "MN" || $utilisateur->getProfil()->getCode() == "DG") {
        // Utilisation de la méthode calculerSalaire() pour mettre à jour le salaire
        $utilisateur->calculerSalaire();
        $utilisateur->affiche().PHP_EOL;
    }
} */

?>