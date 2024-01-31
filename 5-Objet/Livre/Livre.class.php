<?php
class Livre
{
    private String $titre;
    private String $auteur;
    private float $prix;

    public function __construct(String $titre, String $auteur, float $prix){
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->prix = $prix;
    }

    public function afficher(): void {
        echo "Le titre est : ".$this->titre."\n";
        echo "L'auteur est : ".$this->auteur."\n";
        echo "Le prix est : ".$this->prix."\n";
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of auteur
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}