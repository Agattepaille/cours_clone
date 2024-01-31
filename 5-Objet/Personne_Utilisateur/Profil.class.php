<?php

//attributs
class Profil {
    public static $cpt=0;
    protected int $matricule;
    private String $code;
    private String $libelle;

    //methode
    public function __construct(String $code,String $libelle){
        self::$cpt++;
        $this -> matricule = self::$cpt;
        $this -> code = $code;           
        $this -> libelle = $libelle;
    }

    public function affiche(): void {
        echo $this->matricule." ".$this->$code." ".$this->libelle;
        
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
}
?>