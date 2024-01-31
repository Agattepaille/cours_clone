<?php

class Client
{
    private String $CIN;
    private String $surname;
    private String $firstname;
    private String $tel;


    public function __construct(String $CIN,String $surname,String $firstname,String $tel){
        $this -> CIN = $CIN;
        $this -> surname = $surname;
        $this -> firstname = $firstname;
        $this -> tel = $tel;
    }

    public function display(): void {
        echo "Informations client (".$this->CIN.", ".$this->surname.", ".$this->firstname.", ".$this->tel." )";
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
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

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