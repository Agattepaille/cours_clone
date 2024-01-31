<?php

abstract class Personne
{
    // Propriétés
    public static $cpt=0;
    protected int $ID;
    protected String $nom;
    protected String $prenom;
    protected String $mail;
    protected String $tel;
    protected float $salaire;
       
    // Constructeur
    public function __construct(String $nom,String $prenom, String $mail, String $tel, float $salaire) {
        self::$cpt++;
        $this -> ID = self::$cpt;
        $this->nom = strtoupper($nom);
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->tel = $tel;
        $this->salaire = $salaire;
    }

    // méthode abstract
    abstract public function calculerSalaire();   


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
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of salaire
     */ 
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set the value of salaire
     *
     * @return  self
     */ 
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }
}