<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=Salon_Test';
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
        $name = "Miss Prism";
        $test_stylist = new Stylist($name);

        //Act
        $result = $test_stylist->getName();

        //Assert
        $this->assertEquals($name, $result);
      }

      function test_getId()
      {
        //Arrange
        $name = "Miss Prism";
        $id = 1;
        $test_stylist = new Stylist($name, $id);

        //Act
        $result = $test_stylist->getId();

        //Assert
        $this->assertEquals(true, is_numeric($result));
      }

      // function testGetClients()
      // {
      //     //Arrange
      //     $name = "Miss Prism";
      //     $id = null;
      //     $test_stylist = new Stylist($name, $id);
      //     $test_stylist->save();
      //
      //     $test_stylist_id = $test_stylist->getId();
      //
      //     $client_name = "Billy Yeats";
      //     $test_client = new Client($client_name, $id, $test_stylist_id);
      //     $test_client->save();
      //
      //     $client_name2 = "Florence Farr";
      //     $test_client2 = new Client($client_name2, $id, $test_stylist_id);
      //     $test_client2->save();
      //
      //     //Act
      //     $result = $test_stylist->getClients();
      //
      //     //Assert
      //     $this->assertEquals([$test_client, $test_client2], $result);
      // }

      function test_save()
      {
        //Arrange
        $name = "Miss Prism";
        $test_stylist = new Stylist($name);
        $test_stylist->save();

        //Act
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals($test_stylist, $result[0]);
      }

      function test_getAll()
      {
        //Arrange
        $name = "Miss Prism";
        $name2 = "John Worthing";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();

        //Act
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([$test_stylist, $test_stylist2], $result);
      }

      function test_deleteAll()
      {
        //Arrange
        $name = "Miss Prism";
        $name2 = "John Worthing";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();

        //Act
        Stylist::deleteAll();
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([], $result);
      }

      function test_find()
      {
        //Arrange
        $name = "Miss Prism";
        $name2 = "John Worthing";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();

        //Act
        $result = Stylist::find($test_stylist->getId());

        //Assert
        $this->assertEquals($test_stylist, $result);
      }
    }

?>
