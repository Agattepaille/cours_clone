<?php

//attributs
class Adresse {
    private String $rue;
    private String $ville;
    private int $codePostal;

    //methode
    public function __construct(String $rue, String $ville, int $codePostal){
        $this -> rue = $rue;
        $this -> ville = $ville;
        $this -> codePostal = $codePostal;
    }

    public function __toString() {
        $text = 
        "\nRue : ".$this->rue.". Ville : ".$this->ville.". Code Postal : ".$this->codePostal.".";
        return $text;
    }

// Getters & Setters
    /**
     * Get the value of rue
     */ 
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */ 
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
   
?>