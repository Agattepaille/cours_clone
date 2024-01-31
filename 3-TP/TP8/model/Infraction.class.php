<?php
/*
Infraction class
Author  @Abdelkarim
*/

include_once 'DBManagement.class.php';

Class Infraction{

    private int $user_ID;
    private int $delayCount;
    private int $insultCount;
    private int $agressiveBehavior;
    private int $inadequateBehavior;
    private bool $paymentStatus;
    private float $totalToPay;
    private int $infraction_ID;
    private String $penalityType;
    private DateTime $date_Infraction;
    private int $snitch_ID;
    private string $snitchName;


    public function __construct(int $user_ID,int $delayCount,int $insultCount,int $agressiveBehavior, int $inadequateBehavior,bool $paymentStatus,float $totalToPay,String $penalityType,String $date_Infraction,int $snitch_ID, string $snitchName){
        $this->user_ID = $user_ID;
        $this->delayCount = $delayCount;
        $this->insultCount = $insultCount;
        $this->agressiveBehavior = $agressiveBehavior;
        $this->inadequateBehavior = $inadequateBehavior;
        $this->paymentStatus = $paymentStatus;
        $this->totalToPay = $totalToPay;
        $this->penalityType = $penalityType;
        $this->date_Infraction = new DateTime($date_Infraction);
        $this->snitch_ID = $snitch_ID;
        $this->snitchName = $snitchName;
    }


    /**
     * Get formatted infraction date
     */
    public function getFormattedDate(): string {
        return $this->date_Infraction->format('d-m-Y H:i');
    }

    /**
     * Get the value of delayCount
     */
    public function getDelayCount()
    {
        return $this->delayCount;
    }

    /**
     * Set the value of delayCount
     *
     * @return  self
     */
    public function setDelayCount($delayCount)
    {
        $this->delayCount = $delayCount;

        return $this;
    }

    /**
     * Get the value of insultCount
     */
    public function getInsultCount()
    {
        return $this->insultCount;
    }

    /**
     * Set the value of insultCount
     *
     * @return  self
     */
    public function setInsultCount($insultCount)
    {
        $this->insultCount = $insultCount;

        return $this;
    }

    /**
     * Get the value of agressiveBehavior
     */
    public function getAgressiveBehavior()
    {
        return $this->agressiveBehavior;
    }

    /**
     * Set the value of agressiveBehavior
     *
     * @return  self
     */
    public function setAgressiveBehavior($agressiveBehavior)
    {
        $this->agressiveBehavior = $agressiveBehavior;

        return $this;
    }

    /**
     * Get the value of paymentStatus
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Set the value of paymentStatus
     *
     * @return  self
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * Get the value of totalToPay
     */
    public function getTotalToPay()
    {
        return $this->totalToPay;
    }

    /**
     * Set the value of totalToPay
     *
     * @return  self
     */
    public function setTotalToPay($totalToPay)
    {
        $this->totalToPay = $totalToPay;

        return $this;
    }

    /**
     * Get the value of infraction_ID
     */
    public function getInfraction_ID()
    {
        return $this->infraction_ID;
    }


    /**
     * Get the value of user_ID
     */
    public function getUser_ID()
    {
        return $this->user_ID;
    }


    /**
     * Get the value of inadequateBehavior
     */
    public function getInadequateBehavior()
    {
        return $this->inadequateBehavior;
    }

    /**
     * Set the value of inadequateBehavior
     *
     * @return  self
     */
    public function setInadequateBehavior($inadequateBehavior)
    {
        $this->inadequateBehavior = $inadequateBehavior;

        return $this;
    }

    /**
     * Get the value of penalityType
     */
    public function getPenalityType()
    {
        return $this->penalityType;
    }

    /**
     * Set the value of penalityType
     *
     * @return  self
     */
    public function setPenalityType($penalityType)
    {
        $this->penalityType = $penalityType;

        return $this;
    }

    /**
     * Get the value of date_Infraction
     */
    public function getDate_Infraction()
    {
        return $this->date_Infraction;
    }

    /**
     * Set the value of date_Infraction
     *
     * @return  self
     */
    public function setDate_Infraction($date_Infraction)
    {
        $this->date_Infraction = $date_Infraction;

        return $this;
    }

    /**
     * Get the value of snitch_ID
     */
    public function getSnitch_ID()
    {
        return $this->snitch_ID;
    }
    /**
     * Get the value of snitch_Name
     */
    public function getSnitchName()
    {
        return $this->snitchName;
    }


    /**
     * Set the value of infraction_ID
     *
     * @return  self
     */
    public function setInfraction_ID($infraction_ID)
    {
        $this->infraction_ID = $infraction_ID;

        return $this;
    }
}
