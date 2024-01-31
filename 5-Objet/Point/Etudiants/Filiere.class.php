<?php

class Filiere
{
    public static $cpt=1;
    private int $ID;
    private String $code;
    private String $libelle;
    

    public function __construct(String $code, String $libelle) {
        self::$cpt++;
        $this->ID = self::$cpt;
        $this -> code = $code;
        $this -> libelle = $libelle;
    }

    public function __toString() {
        $text = 
        "\nCode : ".$this->code.
        "\nLibelle : ".$this->libelle.
        "\nID : ".$this->ID;
        return $text;
    }

    /**
     * Get the value of cpt
     */ 
    public function getCpt()
    {
        return $this->cpt;
    }

    /**
     * Set the value of cpt
     *
     * @return  self
     */ 
    public function setCpt($cpt)
    {
        $this->cpt = $cpt;

        return $this;
    }

    /**
     * Get the value of ID
     */ 
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     *
     * @return  self
     */ 
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
}