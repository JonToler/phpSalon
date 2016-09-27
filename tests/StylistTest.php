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
               Client::deleteAll();
           }

           function test_getName()
           {
              //Arrange
               $name = "Beth";
               $id = null;
               $test_Stylist = new Stylist($name, $id);

               //Act
               $result = $test_Stylist->getName();

               //Assert
               $this->assertEquals($name, $result);
           }

           function test_setName()
           {
                //Arrange
               $name = "Beth";
               $id = null;
               $new_name = "Beth";
               $test_Stylist = new Stylist($name, $id);
               $test_Stylist->save();
               $result = $test_Stylist->getName();
               $new_name = "Beth";

               //ACT
               $test_Stylist->setName($new_name);
               $result = $test_Stylist->getName();

               //Assert
               $this->assertEquals($new_name, $result);
           }

           function test_getId()
           {
               //Arrange
               $name = "Beth";
               $id = null;
               $test_Stylist = new Stylist($name, $id);
               $test_Stylist->save();
               //Act
               $result = $test_Stylist->getId();
               //Assert
               $this->assertEquals($test_Stylist->getId(),$result);
           }

           function test_save()
           {
             //Arrange
               $name = "Beth";
               $id = null;
               $test_Stylist1 = new Stylist($name, $id);
               $test_Stylist1->save();

               //ACT
               $result = Stylist::getAll();
               //Assert
               $this->assertEquals([$test_Stylist], $result);
           }

           function test_deleteAll()
           {
             //Arrange
               $name = "Beth";
               $id = null;
               $test_Stylist1 = new Stylist($name, $id);
               $test_Stylist1->save();

               $name = "Dan";
               $test_Stylist2 = new Stylist($name, $id);
               $test_Stylist2->save();

               //ACT
               Stylist::deleteAll();

               //Assert
               $this->assertEquals([],Stylist::getAll());
           }

           function test_getAll()
           {
               //Arrange
               $name = "Beth";
               $id = null;
               $test_Stylist1 = new Stylist($name, $id);
               $test_Stylist1->save();

               $name = "Dan";
               $test_Stylist2 = new Stylist($name, $id);
               $test_Stylist2->save();

               //Act
               $result = Stylist::getAll();

               //Assert
               $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
           }
           function test_find()
           {
               //Arrange
               $name = "Beth";
               $id = null;
               $test_Stylist1 = new Stylist($name, $id);
               $test_Stylist1->save();

               $name = "Dan";
               $test_Stylist2 = new Stylist($name, $id);
               $test_Stylist2->save();

               //Act
               $result = Stylist::find($test_Stylist1->getId());

               //Assert
               $this->assertEquals($test_Stylist1, $result);
           }
       }

 ?>
