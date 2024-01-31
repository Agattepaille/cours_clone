<?php
include_once "Vehicule.class.php";

class Camion extends Vehicule {

    //methode magique construct
    public function __construct(String $anneeModele, float $prix,){
        parent::__construct($anneeModele,$prix);
    }

    public function __toString() {
        return "Camion : ".parent::__toString()." ". $this->demarrer()." ".$this->accelerer();    
    }

    // methode
    public function demarrer() {
        echo "Le camion démarre.";    
    }

    // methode
    public function accelerer() {
        echo "Le camion accélère.";    
    }
    
}
?>