<?php
class Rectangle
{
    private float $longueur;
    private float $largeur;

    public function __construct(float $L, float $l) {
        $this->longueur = $L;
        $this->largeur = $l;
    }

    public function perimetre(): String{
        $perimetre = ($this->longueur + $this->largeur) * 2;
        return "le périmètre du rectangle est : "."$perimetre";
    }

    public function aire(): String{
        $aire = $this->longueur * $this->largeur;
        return "l'aire du rectangle est : "."$aire"."m²";
    }

    public function estCarre(): bool {
        if ($this->longueur == $this->largeur) {
            echo "true \n";
            return true;
        } else {
            echo "false \n";
            return false;
        }
    }

    public function afficherRectangle(): void {
        echo "Longueur : ".$this->longueur."\n";
        echo "Largeur : ".$this->largeur."\n";
        echo "Périmètre : ".$this->perimetre()."\n";
        echo "Aire : ".$this->aire()."\n";
        if ($this->estCarre() == true) {
            echo "Il s’agit d’un carré";
        } else {
        echo "Il ne s’agit pas d’un carré";
        }
    }

   
    /**
     * Get the value of longueur
     */ 
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * Set the value of longueur
     *
     * @return  self
     */ 
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get the value of largeur
     */ 
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set the value of largeur
     *
     * @return  self
     */ 
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }
}
