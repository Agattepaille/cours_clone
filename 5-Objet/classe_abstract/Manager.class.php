<?php
include_once "Personne.class.php";

class Manager extends Personne {
    //attributs
    private String $service;

    //methode magique construct
    public function __construct(String $nom,String $prenom, String $mail, String $tel, int $salaire,String $service){
        parent::__construct($nom,$prenom,$mail,$tel,$salaire);
        $this -> service = $service;
    }

    // methode
    public function calculerSalaire(): float {
        return $this->salaire *= 1.35;
    }

    // methode
    public function afficher(): void {
        echo "Le salaire du manager ".$this->prenom." ".$this->nom." est : ".$this->salaire."€, son service : ".$this->service.PHP_EOL;    
    }

    

    /**
     * Get the value of service
     */ 
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }
}
?>