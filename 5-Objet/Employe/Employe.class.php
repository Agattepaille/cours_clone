<?php

class Employe
{
    private int $matricule;
    private String $nom;
    private String $prenom;
    private String $dateNaissance;
    private String $dateEmbauche;
    private int $salaire;


    public function __construct(int $matricule, String $nom, String $prenom, String $dateNaissance, String $dateEmbauche, int $salaire ){
        $this -> matricule = $matricule;
        $this -> nom = strtoupper($nom);
        $this -> prenom = ucfirst(strtolower($prenom));
        $this -> dateNaissance = $dateNaissance;
        $this -> dateEmbauche = $dateEmbauche;;
        $this -> salaire = $salaire;
    }

    public function age(): int {
        $today = new DateTime();
        $dateNaissance = DateTime::createFromFormat("d/m/Y", $this->dateNaissance);
        $age = $today->diff($dateNaissance);
        return $age -> y;
    } 

    public function anciennete(): int {
        $today = new DateTime();
        $dateEmbauche = DateTime::createFromFormat("d/m/Y", $this->dateEmbauche);
        $anciennete = $today->diff($dateEmbauche);
        return $anciennete -> y;
    } 

    public function augmentationDuSalaire(): int {
        $anciennete = $this->anciennete();
        if ($anciennete < 5) {
            $this->salaire *= 1.02;
        }elseif ($anciennete < 10) {
            $this->salaire *= 1.05;
        } else {
            $this->salaire *= 1.1;
        }
        return $this -> salaire;
    }


    public function afficherEmploye(): void {

        echo "Matricule : ".$this->matricule.PHP_EOL;
        echo "Nom complet : ".$this->nom." ".$this->prenom.PHP_EOL;
        echo "Age : ".$this->age().PHP_EOL;
        echo "Ancienneté : ".$this->anciennete().PHP_EOL;
        echo "Salaire : ".$this->salaire.PHP_EOL;

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
     * Get the value of dateEmbauche
     */ 
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * Set the value of dateEmbauche
     *
     * @return  self
     */ 
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;

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

        /**
         * Get the value of anciennete
         */ 
        public function getAnciennete()
        {
                return $this->anciennete;
        }

        /**
         * Set the value of anciennete
         *
         * @return  self
         */ 
        public function setAnciennete($anciennete)
        {
                $this->anciennete = $anciennete;

                return $this;
        }

        /**
         * Get the value of age
         */ 
        public function getAge()
        {
                return $this->age;
        }

        /**
         * Set the value of age
         *
         * @return  self
         */ 
        public function setAge($age)
        {
                $this->age = $age;

                return $this;
        }
}