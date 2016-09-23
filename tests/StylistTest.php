<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=salon_Test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class SalonTest extends PHPUnit_Framework_TestCase
    {
           protected function tearDown()
           {
               Stylist::deleteAll();
           }
           function test_getName()
           {
               $name = "Beth";
               $id = 1;
               $test_Stylist = new Stylist($name, $id);
               $result = $test_Stylist->getName();
               $this->assertEquals($name, $result);
           }
           function test_setName()
           {
               $name = "Beth";
               $id = 1;
               $new_name = "Beth";
               $test_Stylist = new Stylist($name, $id);
               $test_Stylist->setName($new_name);
               $result = $test_Stylist->getName();
               $this->assertEquals($new_name, $result);
           }
           function test_getId()
           {
               //Arrange
               $name = "Dan";
               $id = 1;
               $test_Stylist = new Stylist($name, $id);
               //Act
               $result = $test_Stylist->getId();
               //Assert
               $this->assertEquals(true, is_numeric($result));
           }
           function test_save()
           {
               $name = "Beth";
               $id = 1;
               $test_Stylist = new Stylist($name, $id);
               $test_Stylist->save();
               $result = Stylist::getAll();
               $this->assertEquals($test_Stylist, $result[0]);
           }
           function test_deleteAll()
           {
               $name = "Beth";
               $name2 = "Dan";
               $test_Stylist = new Stylist($name);
               $test_Stylist->save();
               $test_Stylist2 = new Stylist($name2);
               $test_Stylist2->save();
               Stylist::deleteAll();
               $result = Stylist::getAll();
               $this->assertEquals([], $result);
           }
           function test_getAll()
           {
               //Arrange
               $name = "Beth";
               $name2 = "Dan";
               $test_Stylist = new Stylist($name);
               $test_Stylist->save();
               $test_Stylist2 = new Stylist($name2);
               $test_Stylist2->save();
               //Act
               $result = Stylist::getAll();
               //Assert
               $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
           }
           function test_find()
           {
               $name = "Beth";
               $name2 = "Dan";
               $test_Stylist = new Stylist($name);
               $test_Stylist->save();
               $test_Stylist2 = new Stylist($name2);
               $test_Stylist2->save();
               $result = Stylist::find($test_Stylist->getId());
               $this->assertEquals($test_Stylist, $result);
           }
       }

 ?>
