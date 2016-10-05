<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
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
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name = "Billy Yeats";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client = new Client($client_name, $test_stylist->getId(), $id);
         $test_client->save();
         // Act
         $result = $test_client->getName();
         // Assert
         $this->assertEquals($client_name, $result);
     }
     function test_getId()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name = "Billy Yeats";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client = new Client($client_name, $test_stylist->getId(), $id);
         $test_client->save();
         // Act
         $result = $test_client->getId();
         // Assert
         $this->assertEquals($test_client->getId(), $result);
     }
     function test_setName()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name = "Billy Yeats";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client = new Client($client_name, $test_stylist->getId(), $id);
         $test_client->save();
         $new_name = "James ";
         // Act
         $test_client->setName($new_name);
         $result = $test_client->getName();
         // Assert
         $this->assertEquals($new_name, $result);
     }
     function test_getAll()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name1 = "Billy Yeats";
         $client_name2 = "Florence Farr";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
         $test_client1->save();
         $test_client2 = new Client($client_name2, $test_stylist->getId(), $id);
         $test_client2->save();
         // Act
         $result = Client::getAll();
         // Assert
         $this->assertEquals([$test_client1, $test_client2], $result);
     }
     function test_save()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name = "Billy Yeats";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client = new Client($client_name, $test_stylist->getId(), $id);
         $test_client->save();
         // Act
         $result = Client::getAll();
         // Assert
         $this->assertEquals([$test_client], $result);
     }
     function test_deleteAll()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name1 = "Billy Yeats";
         $client_name2 = "Florence Farr";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
         $test_client1->save();
         $test_client2 = new Client($client_name2, $test_stylist->getId(), $id);
         $test_client2->save();
         // Act
         Client::deleteAll();
         // Assert
         $this->assertEquals([], Client::getAll());
     }
     function test_find()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name1 = "Billy Yeats";
         $client_name2 = "Florence Farr";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
         $test_client1->save();
         $test_client2 = new Client($client_name2, $test_stylist->getId(), $id);
         $test_client2->save();
         // Act
         $result = Client::find($test_client1->getId());
         // Assert
         $this->assertEquals($test_client1, $result);
     }
     function test_update()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name1 = "Billy Yeats";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
         $test_client1->save();
         $new_name = "William Yeats";
         // Act
         $test_client1->update($new_name);
         $result = Client::find($test_client1->getId())->getName();
         // Assert
         $this->assertEquals($new_name, $result);
     }
     function test_delete()
     {
         // Arrange
         $stylist_name = "Miss Prism";
         $client_name1 = "Billy Yeats";
         $client_name2 = "Florence Farr";
         $client_name3 = "Maud Gonne";
         $id = null;
         $test_stylist = new Stylist($stylist_name, $id);
         $test_stylist->save();
         $test_client1 = new Client($client_name1, $test_stylist->getId(), $id);
         $test_client1->save();
         $test_client2 = new Client($client_name2, $test_stylist->getId(), $id);
         $test_client2->save();
         $test_client3 = new Client($client_name3, $test_stylist->getId(), $id);
         $test_client3->save();
         // Act
         $test_client1->delete();
         $result = Client::getAll();
         // Assert
         $this->assertEquals([$test_client2, $test_client3], $result);
     }



    }
?>
