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

        function test_getId()
        {
            //Arrange
            $stylist_name = "Miss Prism";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();

            $client_name = "Billy Yeats";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getStylistId()
        {
            //Arrange
            $stylist_name = "Miss Prism";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();

            $client_name = "Billy Yeats";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
            {
                //Arrange
                $stylist_name = "Miss Prism";
                $id = null;
                $test_stylist = new Stylist($stylist_name, $id);
                $test_stylist->save();

                $client_name = "Billy Yeats";
                $stylist_id = $test_stylist->getId();
                $test_client = new Stylist($client_name, $id, $stylist_id);

                //Act
                $test_client->save();

                //Assert
                $result = Client::getAll();
                $this->assertEquals($test_client, $result[0]);
            }


        function test_getAll()
        {
            //Arrange
            $stylist_name = "Miss Prism";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();

            $client_name = "Billy Yeats";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();


            $client_name2 = "Florence Farr";
            $test_client2 = new Client($client_name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Miss Prism";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Billy Yeats";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            $client_name2 = "Florence Farr";
            $test_client2 = new Client($client_name2, $id, $stylist_id);
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
            $name = "Miss Prism";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Billy Yeats";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            $client_name2 = "Florence Farr";
            $test_client2 = new Client($client_name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }



    }
?>
