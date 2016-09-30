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
        //
        // function test_update()
        // {
        //     //Arrange
        //     $stylist_name = "Beth";
        //     $client_name1 = "Florence Farr";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist_name, $id);
        //     $test_stylist->save();
        //     $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
        //     $test_Client1->save();
        //
        //     $new_name = "Florence Farr";
        //
        //     //Act
        //     $test_Client1->update($new_name);
        //     $result = Client::find($test_Client1->getId())->getName;
        //
        //     //Assert
        //     $this->assertEquals([$new_name, $result);
        // }
        //
        // function test_delete()
        // {
        //     //Arrange
        //     $stylist_name = "Beth";
        //     $client_name1 = "Florence Farr";
        //     $client_name2 = "Pat";
        //     $client_name3 = "Lee";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist_name, $id);
        //     $test_stylist->save();
        //     $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
        //     $test_Client1->save();
        //     $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
        //     $test_Client2->save();
        //     $test_Client3 = new Client($client_name3, $test_stylist->getId, $id);
        //     $test_Client3->save();
        //
        //     //Act
        //     Client::deleteAll();
        //     result = Client::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_Client2, $test_Client3], getAll());
        // }
        //
        //
        // function test_deleteAll()
        // {
        //     //Arrange
        //     $stylist_name = "Beth";
        //     $client_name1 = "Florence Farr";
        //     $client_name2 = "Pat";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist_name, $id);
        //     $test_stylist->save();
        //     $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
        //     $test_Client1->save();
        //     $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
        //     $test_Client2->save();
        //
        //     //Act
        //     Client::deleteAll();
        //
        //     //Assert
        //     $this->assertEquals([], Client::getAll());
        // }
        //

        //
        // function test_find()
        // {
        //     //Arrange
        //     $stylist_name = "Beth";
        //     $client_name1 = "Florence Farr";
        //     $client_name2 = "Pat";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist_name, $id);
        //     $test_stylist->save();
        //     $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
        //     $test_Client1->save();
        //     $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
        //     $test_Client2->save();
        //
        //     //Act
        //     $result = Client::find($test_Client1->getId());
        //     //Assert
        //     $this->assertEquals($test_Client1, $result);
        // }


    }
?>
