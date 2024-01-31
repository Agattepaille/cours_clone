<?php
include_once "DBManagement.class.php";

class Penality {

   private String $penalityType;
   private float $price;
   private String $notes;


   public function __construct(String $penalityType, float $price, String $notes) {
      $this-> penalityType = $penalityType;
      $this -> price = $price;
      $this -> notes = $notes;

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
    * Get the value of price
    */
   public function getPrice()
   {
      return $this->price;
   }

   /**
    * Set the value of price
    *
    * @return  self
    */
   public function setPrice($price)
   {
      $this->price = $price;

      return $this;
   }

   /**
    * Get the value of notes
    */ 
   public function getNotes()
   {
      return $this->notes;
   }

   /**
    * Set the value of notes
    *
    * @return  self
    */ 
   public function setNotes($notes)
   {
      $this->notes = $notes;

      return $this;
   }
}
