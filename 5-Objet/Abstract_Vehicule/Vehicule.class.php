<?php

abstract class Vehicule
{
    // Propriétés
    public static $cpt=0;
    protected int $matricule;
    protected String $anneeModele;
    protected float $prix;
       
    // Constructeur
    public function __construct(String $anneeModele, float $prix) {
        self::$cpt++;
        $this -> matricule = self::$cpt;
        $this -> anneeModele = $anneeModele;
        $this -> prix = $prix;
    }

    // méthode
    public function __toString() {
        return "Matricule : ".$this->matricule." Année : ".$this->anneeModele." Prix : ".$this->prix.PHP_EOL;    
    }

    // méthodes de la classe abstract
     abstract function demarrer(); 
     abstract function accelerer();
     

    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of anneeModele
     */ 
    public function getAnneeModele()
    {
        return $this->anneeModele;
    }

    /**
     * Set the value of anneeModele
     *
     * @return  self
     */ 
    public function setAnneeModele($anneeModele)
    {
        $this->anneeModele = $anneeModele;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}