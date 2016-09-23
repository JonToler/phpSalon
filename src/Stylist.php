<?php
    class Stylist
    {
      private $newStylistName;

      function __construct($newStylistName)
      {
        $this->newStylistName = $newStylistName;
      }

      function setnewStylistName($new_newStylistName)
      {
       $this->newStylistName = (string) $new_newStylistName;
      }

      function getnewStylistName()
      {
       return $this->newStylistName;
      }

      function save()
      {
       array_push($_SESSION['list_of_Stylists'], $this);
      }

      static function getAll()
      {
       return $_SESSION['list_of_Stylists'];
      }

      static function deleteAll()
      {
          $_SESSION['list_of_Stylists'] = array();
      }
    }
?>
