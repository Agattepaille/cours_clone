<?php
include "Point.class.php";

class Cercle
{
    private Point $centre;
    private int $rayon;

    public function __construct($x, $y, $rayon){
        //Instanciation d'un Point à l'intérieur de la méthode construct de Cercle
        $this->centre = new Point($x,$y);
        $this->rayon = $rayon;
    }

    public function getPerimetre(): float {
        $perimetre = 2 * M_PI * $this->rayon;
        return round($perimetre,2);
    }

    public function getSurface(): float {
        $surface = ($this->rayon * $this->rayon) * M_PI;
        return round($surface,2);
    }

    public function appartient(Point $pointP): bool {
        $distance = pow($pointP->getAbcisse() - $this->centre->getAbcisse(), 2) + pow($pointP->getOrdonnee() - $this->centre->getOrdonnee(), 2);
        if ($distance <= pow($this->rayon,2)) {
            return true;
        } else {
            return false;
        }
    }

    public function afficher(): void {
        //echo "Cercle".getAbcisse().",".getOrdonnee().",".getRayon().")".PHP_EOL;
        echo "CERCLE (".$this->centre->getAbcisse().",".$this->centre->getOrdonnee().",".$this->rayon.")".PHP_EOL;
    } 


    /**
     * Get the value of centre
     */ 
    public function getCentre()
    {
        return $this->centre;
    }

    /**
     * Set the value of centre
     *
     * @return  self
     */ 
    public function setCentre($centre)
    {
        $this->centre = $centre;

        return $this;
    }

    /**
     * Get the value of rayon
     */ 
    public function getRayon()
    {
        return $this->rayon;
    }

    /**
     * Set the value of rayon
     *
     * @return  self
     */ 
    public function setRayon($rayon)
    {
        $this->rayon = $rayon;

        return $this;
    }
}
