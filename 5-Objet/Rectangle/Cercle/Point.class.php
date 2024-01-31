<?php
class Point
{
    private float $abcisse;
    private float $ordonnee;

    public function __construct(float $x, float $y){
        $this->abcisse = $x;
        $this->ordonnee = $y;
    }

    public function afficher(): void{
        echo "POINT(".$this->abcisse.",".$this->ordonnee.")";
    }

    /**
     * Get the value of abcisse
     */ 
    public function getAbcisse()
    {
        return $this->abcisse;
    }

    /**
     * Set the value of abcisse
     *
     * @return  self
     */ 
    public function setAbcisse($abcisse)
    {
        $this->abcisse = $abcisse;

        return $this;
    }

    /**
     * Get the value of ordonnee
     */ 
    public function getOrdonnee()
    {
        return $this->ordonnee;
    }

    /**
     * Set the value of ordonnee
     *
     * @return  self
     */ 
    public function setOrdonnee($ordonnee)
    {
        $this->ordonnee = $ordonnee;

        return $this;
    }



}
