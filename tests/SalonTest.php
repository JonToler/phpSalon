<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    //Epicodus
    $server = 'mysql:host=localhost;dbname=salon_Test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class SalonTest extends PHPUnit_Framework_TestCase

    {

       function test_save()
       {
           //Arrange
           $newStylistName = 'Pat';
           $test_stylist = new Stylist ($newStylistName);


           //Act
           $test_stylist->save();

           //Assert
           $result = Stylist::getAll();
           $this->assertEquals($test_stylist, $result[0]);
       }
   }

 ?>
