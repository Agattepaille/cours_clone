<?php
include_once "Profil.class.php";
include_once "Personne.class.php";


//attributs
class Utilisateur extends Personne {
    private String $login;
    private String $password;
    private String $service;
    private Profil $profil;


    //methode
    public function __construct(String $nom,String $prenom,String $mail,String $tel,float $salaire, String $login, String $password, String $service, Profil $profil){
        parent::__construct($nom,$prenom,$mail,$tel,$salaire);
        $this -> login = $login;
        $this -> password = $password;
        $this -> service = $service;
        $this -> profil = $profil;
    }

    public function calculerSalaire(): float {
        // augmentation de 10% pour les managers
        if ($this->getProfil()->getCode() == "MN") {
            $this->salaire *= 1.1;
            return $this->salaire;
        }
        // augmentation de 40% pour les directeurs généraux
        elseif ($this->getProfil()->getCode() == "DG") {
            $this->salaire *= 1.4;
            return  $this->salaire;
        } else {
        // Mise à jour interne du salaire
        return  $this->salaire;
        }
    }

    public function affiche(): void {
        echo parent::affiche()." ".$this -> service." ".$this->profil->getLibelle()." (".$this->profil->getCode().") ".$this->profil->getMatricule().PHP_EOL;
    }


    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of service
     */ 
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }
}
?>