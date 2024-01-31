<?php
include_once "Personne.class.php";

//attributs
class Employe extends Personne {
    protected float $salaire;


    //methode
    public function __construct(String $nom, String $prenom,float $salaire){
        parent::__construct($nom,$prenom);
        $this -> salaire = $salaire;
    }

    public function __toString() {
        $text = 
        parent::__toString()." ".$this -> salaire;
        return $text;
    }


    /**
     * Get the value of salaire
     */ 
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set the value of salaire
     *
     * @return  self
     */ 
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }
}
?>