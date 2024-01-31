<?php

/*
Made by @Dylan
*/

include_once "../model/DBManagement.class.php";


class User {
    private string $name;
    private string $firstname;
    private string $tel;
    private string $mail;
    private string $login;
    private string $password;
    private string $address;
    private int $user_ID;
    private float $totalDebt;

    public function __construct(string $name,string $firstname, string $tel, string $mail, string $login,string $password,String $address) {
        $this -> name = $name;
        $this -> firstname = $firstname;
        $this-> tel = $tel;
        $this-> mail = $mail;
        $this-> login = $login;
        $this-> address = $address;
        $this-> password = password_hash($password, PASSWORD_BCRYPT); /*?*/
    }




    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
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
     * Get the value of user_ID
     */ 
    public function getUser_ID()
    {
        return $this->user_ID;
    }

    /**
     * Set the value of user_ID
     *
     * @return  self
     */ 
    public function setUser_ID($user_ID)
    {
        $this->user_ID = $user_ID;

        return $this;
    }

    /**
     * Get the value of totalDebt
     */ 
    public function getTotalDebt()
    {
        return $this->totalDebt;
    }

    /**
     * Set the value of totalDebt
     *
     * @return  self
     */ 
    public function setTotalDebt($totalDebt)
    {
        $this->totalDebt = $totalDebt;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}