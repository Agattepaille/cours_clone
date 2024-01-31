<?php
include_once "Personne.class.php";

//attributs
class Etudiant extends Personne {
    public static $cpt=0;
    private String $CNE;

    //methode
    public function __construct(String $nom,String $prenom,String $CNE){
        parent::__construct($nom,$prenom);
        $this -> CNE = $CNE;        
    }

    public function __toString() {
        $text = 
        parent::__toString()." ".$this->CNE;
        return $text;
    }

        /**
         * Get the value of CNE
         */ 
        public function getCNE()
        {
                return $this->CNE;
        }

        /**
         * Set the value of CNE
         *
         * @return  self
         */ 
        public function setCNE($CNE)
        {
                $this->CNE = $CNE;

                return $this;
        }
}
?>