<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Template.php";

    //Epicodus
    $server = 'mysql:host=localhost;dbname=best_restaurants_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class SalonTest extends PHPUnit_FrameworkTestCase

    {

       function test_save()
       {
           //Arrange
           $newStylist = new Stylist(1, 'Pat');

           //Act
           $newStylist->save();

           //Assert
           $this->assertEquals([$newStylist], Stylist::getAll());
       }
   }

 ?>
