<?php
class Article
{
    private int $reference;
    private String $designation;
    private float $prixHT;
    public static $tauxTVA;


    public function __construct(int $reference, String $designation, float $prixHT){
        $this->reference = $reference;
        $this->designation = $designation;
        $this->prixHT = $prixHT;
        self::$tauxTVA;
    }

    public function calculerPrixTTC() : float {
        $prixTTC = $this->prixHT + ($this->prixHT*self::$tauxTVA/100);
        return $prixTTC;
    }

    public function afficherArticle() : void {
        echo "Référence est : ".$this->reference."\n";
        echo "Désignation est : ".$this->designation."\n";
        echo "Prix TTC : ".$this->calculerPrixTTC()."\n";
    }

   

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of designation
     */ 
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @return  self
     */ 
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get the value of prixHT
     */ 
    public function getPrixHT()
    {
        return $this->prixHT;
    }

    /**
     * Set the value of prixHT
     *
     * @return  self
     */ 
    public function setPrixHT($prixHT)
    {
        $this->prixHT = $prixHT;

        return $this;
    }

}