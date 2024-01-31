<?php
include_once "Vehicule.class.php";


//attributs
class Voiture extends Vehicule {

    //methode magique construct
    public function __construct(String $anneeModele,float $prix){
        parent::__construct($anneeModele,$prix);
    }

    // methode
    public function __toString() {
        return "Voiture : ".parent::__toString()." ". $this->demarrer().". ".$this->accelerer().".";    
    }

     // methode
     public function demarrer(): String {
        return "La voiture démarre";    
    }

    // methode
    public function accelerer(): String {
        return "La voiture accélère";    
    }

}
?>