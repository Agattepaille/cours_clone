<?php

class Client
{
    private String $CIN;
    private String $nom;
    private String $prenom;
    private String $tel;


    public function __construct(String $CIN,String $nom,String $prenom,String $tel){
        $this -> CIN = $CIN;
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> tel = $tel;
    }

    public function afficherClient(): void {
        echo "Informations client (".$this->CIN.", ".$this->nom.", ".$this->prenom.", ".$this->tel." )";
    } 

    /**
     * Get the value of CIN
     */ 
    public function getCIN()
    {
        return $this->CIN;
    }

    /**
     * Set the value of CIN
     *
     * @return  self
     */ 
    public function setCIN($CIN)
    {
        $this->CIN = $CIN;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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
}