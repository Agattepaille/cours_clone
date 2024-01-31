<?php
include_once "Employe.class.php";

//attributs
class Professeur extends Employe {
    public static $cpt=0;
    protected String $specialite;


    //methode
    public function __construct(String $nom,String $prenom,int $salaire,String $specialite){
        parent::__construct($nom,$prenom,$salaire);
        $this -> specialite = $specialite;        
    }

    public function __toString() {
        $text = 
        parent::__toString()." ".$this->specialite;
        
        return $text;
    }



    /**
     * Get the value of specialite
     */ 
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialite
     *
     * @return  self
     */ 
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }
}
?>