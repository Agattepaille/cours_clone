<?php

class Personne
{
    public static $cpt=0;
    protected int $ID;
    protected String $nom;
    protected String $prenom;
    

    public function __construct(String $nom,String $prenom) {
        self::$cpt++;
        $this -> ID = self::$cpt;
        $this -> nom = strtoupper($nom);
        $this -> prenom = $prenom;
    }

    public function __toString() {
        $text = 
        $this->nom." ".$this->prenom."(".$this->ID.")";
        return $text;
    }

   
}