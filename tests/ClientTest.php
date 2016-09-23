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

    class ClientTest extends PHPUnit_Framework_TestCase

    {
        protected function tearDown()
        {
            Client::deleteAll();
        }
        function test_getName()
        {
          //Arrange
            $name = "Lars";
            $id = 1;
            $id_stylist = 1;
            $test_Client = new Client($name, $id_stylist, $id);
            //Act
            $result = $test_Client->getName();
            //Assert
            $this->assertEquals($name, $result);
        }
        function test_setName()
        {
          //Arrange
            $name = "Peg";
            $id = 1;
            $id_stylist = 1;
            $new_name = "Jill";
            $test_Client = new Client($name, $id_stylist, $id);
            $test_Client->setName($new_name);
            //Act
            $result = $test_Client->getName();
            //Assert
            $this->assertEquals($new_name, $result);
        }
        function test_getId()
        {
            //Arrange
            $name = "Glenn";
            $id = 1;
            $id_stylist = 1;
            $test_Client = new Client($name, $id_stylist, $id);
            //Act
            $result = $test_Client->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
        function test_save()
        {
            $name = "Vic";
            $id = 1;
            $id_stylist = 2;
            $test_Client = new Client($name, $id_stylist, $id);
            $test_Client->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals($test_Client, $result[0]);
        }
        function test_deleteAll()
        {
            //Arrange
            $name = "Art";
            $name2 = "Lou";
            $id_stylist = 2;
            $test_stylist = new Client($name, $id_stylist);
            $test_stylist->save();
            $test_Client2 = new Client($name2, $id_stylist);
            $test_Client2->save();
            //Act
            Client::deleteAll();
            $result = Client::getAll();
            //Assert
            $this->assertEquals([], $result);
        }
        function test_getAll()
        {
            //Arrange
            $name = "Beth";
            $id_stylist = 2;
            $name2 = "Dan";
            $id_stylist2 = 1;
            $test_Client = new Client($name, $id_stylist);
            $test_Client->save();
            $test_Client2 = new Client($name2, $id_stylist2);
            $test_Client2->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_Client, $test_Client2], $result);
        }
        function test_find()
        {
            //Arrange
            $name = "dan";
            $name2 = "Beth";
            $id_stylist = 10;
            $test_Client = new Client($name, $id_stylist);
            $test_Client->save();
            $test_Client2 = new Client($name2, $id_stylist);
            $test_Client2->save();
            //Act
            $result = Client::find($test_Client->getId());
            //Assert
            $this->assertEquals($test_Client, $result);
        }
    }
?>
