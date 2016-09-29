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
            Stylist::deleteAll();
        }
        function test_getName()
        {
          //Arrange
            $stylist_name = "Beth";
            $client_name = "Jon"
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist-> save();
            $test_client = new Client($client_name, $test_stylist->getId(), $id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($test_client->getId(), $result);
        }

        function test_setName()
        {
          //Arrange
            $stylist_name = "Beth";
            $client_name = "Jon";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_client = new Client ($client_name,$test_stylist->getId(), $id);
            $test_Client->save();
            $new_name = "Jon";

            //Act
            $test_client->setName($new_name);
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_getId()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name = "Jon";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_client = new Client($client_name, $test_stylist->getId(), $id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($test_client->getId(), $result);
        }

        function test_save()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name = "Jon";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_client = new Client($client_name, $test_stylist->getId(), $id);
            $test_Client->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_Client], $result);
        }

        function test_update()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name1 = "Jon";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
            $test_Client1->save();

            $new_name = "Jon";

            //Act
            $test_Client1->update($new_name);
            $result = Client::find($test_Client1->getId())->getName;

            //Assert
            $this->assertEquals([$new_name, $result);
        }

        function test_delete()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name1 = "Jon";
            $client_name2 = "Pat";
            $client_name3 = "Lee";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
            $test_Client1->save();
            $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
            $test_Client2->save();
            $test_Client3 = new Client($client_name3, $test_stylist->getId, $id);
            $test_Client3->save();

            //Act
            Client::deleteAll();
            result = Client::getAll();

            //Assert
            $this->assertEquals([$test_Client2, $test_Client3], getAll());
        }


        function test_deleteAll()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name1 = "Jon";
            $client_name2 = "Pat";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
            $test_Client1->save();
            $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
            $test_Client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $this->assertEquals([], Client::getAll());
        }

        function test_getAll()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name1 = "Jon";
            $client_name2 = "Pat";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
            $test_Client1->save();
            $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
            $test_Client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_Client1, $test_Client2], $result);
        }

        function test_find()
        {
            //Arrange
            $stylist_name = "Beth";
            $client_name1 = "Jon";
            $client_name2 = "Pat";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $test_Client1 = new Client($client_name1, $test_stylist->getId, $id);
            $test_Client1->save();
            $test_Client2 = new Client($client_name2, $test_stylist->getId, $id);
            $test_Client2->save();

            //Act
            $result = Client::find($test_Client1->getId());
            //Assert
            $this->assertEquals($test_Client1, $result);
        }


    }
?>
