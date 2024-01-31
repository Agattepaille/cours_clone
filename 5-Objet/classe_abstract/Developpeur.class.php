<?php
include_once "Personne.class.php";


//attributs
class Developpeur extends Personne {
    private String $specialite;


    //methode magique construct
    public function __construct(String $nom,String $prenom, String $mail, String $tel, int $salaire,String $specialite){
        parent::__construct($nom,$prenom,$mail,$tel,$salaire);
        $this -> specialite = $specialite;
    }

    // methode 
    public function calculerSalaire(): float {
        return $this->salaire *= 1.20;
    }

    // methode
    public function afficher(): void {
        echo "Le salaire du développeur ".$this->prenom." ".$this->nom." est : ".$this->salaire."€, son service : ".$this->specialite.PHP_EOL;    
        
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