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

    class ClientTest extends PHPUnit_Framework_TestCase

    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }


        function test_save()
        {
            //Arrange
            $name = "Florence Farr";
            $test_client = new Client($name);

            //Act
            $test_client->save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Billy Yeats";
            $name2 = "Florence Farr";
            $test_client = new Client($name);
            $test_client->save();
            $test_client2 = new Client($name2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Billy Yeats";
            $id = 1;
            $test_Client = new Client($name, $id);

            //Act
            $result = $test_Client->getId();

            //Assert
            $this->assertEquals(1, $result);
        }
        function test_deleteAll()
        {
            //Arrange
            $name = "Billy Yeats";
            $name2 = "Florence Farr";
            $test_client = new Client($name);
            $test_client->save();
            $test_client2 = new Client($name2);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }
        function test_find()
        {
            //Arrange
            $name = "Billy Yeats";
            $name2 = "Florence Farr";
            $test_client = new Client($name);
            $test_client->save();
            $test_client2 = new Client($name2);
            $test_client2->save();

            //Act
            $id = $test_client->getId();
            $result = Client::find($id);

            //Assert
            $this->assertEquals($test_client, $result);
        }



    }
?>
