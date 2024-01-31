<?php
include "Filiere.class.php";

//attributs
class Etudiant {
    public static $cpt=1;
    private int $ID;
    private String $nom;
    private String $prenom;
    private DateTime $dateNaissance;
    private Filiere $filiere;



    //methode
    public function __construct(String $nom, String $prenom,String $dateNaissance, Filiere $filiere){
        self::$cpt++;
        $this -> ID = self::$cpt;
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> dateNaissance = new DateTime ($dateNaissance);
        $this -> filiere = $filiere;
    }

    public function __toString() {
        $text = 
        "\nNom : ".$this->nom.
        "\nPrenom : ".$this->prenom.
        "\nFilière : ".$this->filiere->getLibelle().
        "\nDate de naissance : ".$this->dateNaissance->format("Y-m-d");
        return $text;
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
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
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of filiere
     */ 
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set the value of filiere
     *
     * @return  self
     */ 
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;

        return $this;
    }
}
?>