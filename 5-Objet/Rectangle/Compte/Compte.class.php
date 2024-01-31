<?php
include "Client.class.php";

class Compte
{
    private float $balance;
    public static $cpt;
    private Client $owner;
    public Compte $numCpt;

    public function __construct(float $balance, Client $owner){
        $this->balance = $balance;
        $this->owner = $owner;
        $numCpt = self::$cpt++;
    }

    public function display(): void {
        echo "Informations compte :".PHP_EOL;
        echo "Solde : ".$this->balance.PHP_EOL;
        echo "Client propriétaire : ".$this->owner->getFirstname()." ".$this->owner->getSurname()." ".$this->owner->getCIN().PHP_EOL;
        echo "Numéro de compte : ".self::$cpt.PHP_EOL;
    }

    public function credit(float $amount): float {
        $this->balance += $amount;
        return $this->balance;
    }

    public function creditCpt(float $amount, Compte $numCpt): Void {
        $this->credit($amount);
        $numCpt->debit($amount); 
        echo "Crédit de $amount effectué. Nouveau solde : ".$this->balance.PHP_EOL;
    }

    public function debit(float $amount): float {
        $this->balance = $this->balance - $amount;  
        return $this->balance;    
    }

    public function debitCpt(float $amount, Compte $numCpt): Void {
        $this->debit($amount);
        $numCpt->credit($amount); 
        echo "Débit de $amount effectué. Nouveau solde : ".$this->balance.PHP_EOL;
    }




    /**
     * Get the value of balance
     */ 
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Get the value of owner
     */ 
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner($owner)
    {
        $this->owner = $owner;

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
     * Get the value of numCpt
     */ 
    public function getNumCpt()
    {
        return $this->numCpt;
    }

    /**
     * Set the value of numCpt
     *
     * @return  self
     */ 
    public function setNumCpt($numCpt)
    {
        $this->numCpt = $numCpt;

        return $this;
    }
}
