<?php
include "Batiment.class.php";

//attributs
class Maison extends Batiment {
    private int $nbPieces;
    private Batiment $batiment;


    //methode magique
    public function __construct(int $nbPieces,Adresse $adresse,float $superficie){
        $this -> nbPieces = $nbPieces;
        parent::__construct($adresse,$superficie);
    }

    public function __toString(): String {
        $text = 
        "La maison a : ".$this->nbPieces." pièces".
        "\nL'adresse est : ".$this->adresse.
        "\nLa superficie est : ".$this->superficie."m²";
        return $text;
    }



    

    /**
     * Get the value of nbPieces
     */ 
    public function getNbPieces()
    {
        return $this->nbPieces;
    }

    /**
     * Set the value of nbPieces
     *
     * @return  self
     */ 
    public function setNbPieces($nbPieces)
    {
        $this->nbPieces = $nbPieces;

        return $this;
    }

    /**
     * Get the value of batiment
     */ 
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * Set the value of batiment
     *
     * @return  self
     */ 
    public function setBatiment($batiment)
    {
        $this->batiment = $batiment;

        return $this;
    }
}
?>