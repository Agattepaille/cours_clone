<?php
include "Client.class.php";

//attributs
class Compte {
    public static $nbCompte;
    private String $numCompte;
    private float $solde;
    private Client $client;



    //methode
    public function __construct(float $solde, Client $client){
        self::$nbCompte++;
        $this->numCompte = self::$nbCompte;
        $this -> solde = $solde;
        $this -> client = $client;
        
    }

    public function crediter(float $montant): float{
        $this->solde = $this->solde + $montant;
        return $this->solde;
    }

    public function crediterCpt(float $montant, Compte $compte): float{
        $compte->debiter($montant);
        $this->solde = $this->solde + $montant;
        return $this->solde;
    }
    
    public function debiter(float $montant): float{
        $this->solde = $this->solde - $montant;
        return $this->solde;
    }

    public function debiterCpt(float $montant, Compte $compte): float{
        $compte->crediter($montant);
        $this->solde = $this->solde - $montant;
        return $this->solde;
    }

    public function afficherCompte(): void{
        echo "Numéro de compte: ".$this->numCompte." \n";
        echo "Solde de compte: ".$this->solde." \n";
        echo $this->client->afficherClient()." \n";
        echo "------------------ \n";
    }

    public function afficherNbCompte():void{
        echo  self::$nbCompte++." comptes ont été créés.";
    }


    /**
     * Get the value of numCompte
     */ 
    public function getNumCompte()
    {
        return $this->numCompte;
    }


    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }


    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }
}
?>