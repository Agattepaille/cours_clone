<?php
include "Adresse.class.php";
class Batiment
{
    protected Adresse $adresse;
    protected float $superficie;
    

    public function __construct(Adresse $adresse, float $superficie) {
        $this -> adresse = $adresse;
        $this -> superficie = $superficie;
    }

    public function __toString() {
        $text = 
        "\nAdresse : ".$this->adresse.
        "\nSuperficie : ".$this->superficie."m²";
        return $text;
    }

    
// Getters & Setters
    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse(Adresse $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of superficie
     */ 
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set the value of superficie
     *
     * @return  self
     */ 
    public function setSuperficie(float $superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }
}