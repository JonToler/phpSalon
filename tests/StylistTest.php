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

  class SalonTest extends PHPUnit_Framework_TestCase
  {
     protected function tearDown()
     {
         Stylist::deleteAll();
         Client::deleteAll();
     }

     function test_getName()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist = new Stylist($name, $id);
          // Act
          $result = $test_stylist->getName();
          // Assert
          $this->assertEquals($name, $result);
      }
      function test_getId()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist = new Stylist($name, $id);
          $test_stylist->save();
          // Act
          $result = $test_stylist->getId();
          // Assert
          $this->assertEquals($test_stylist->getId(), $result);
      }
      function test_setName()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist = new Stylist($name, $id);
          $test_stylist->save();
          $new_name = "Laetitia Prism";
          // Act
          $test_stylist->setName($new_name);
          $result = $test_stylist->getName();
          // Assert
          $this->assertEquals($new_name, $result);
      }
      function test_getAll()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          $name = "Cecily Cardew";
          $test_stylist2 = new Stylist($name, $id);
          $test_stylist2->save();
          // Act
          $result = Stylist::getAll();
          // Assert
          $this->assertEquals([$test_stylist1, $test_stylist2], $result);
      }
      function test_save()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          // Act
          $result = Stylist::getAll();
          // Assert
          $this->assertEquals([$test_stylist1], $result);
      }
      function test_deleteAll()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          $name = "Cecily Cardew";
          $test_stylist2 = new Stylist($name, $id);
          $test_stylist2->save();
          // Act
          Stylist::deleteAll();
          // Assert
          $this->assertEquals([], Stylist::getAll());
      }
      function test_deleteAll2()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          $name = "Cecily Cardew";
          $test_stylist2 = new Stylist($name, $id);
          $test_stylist2->save();
          $client_name1 = "Billy Yeats";
          $client_name2 = "John Worthing";
          $test_client1 = new Client($client_name1, $test_stylist1->getId(), $id);
          $test_client1->save();
          $test_client2 = new Client($client_name2, $test_stylist2->getId(), $id);
          $test_client2->save();
          // Act
          Stylist::deleteAll();
          $result = [Stylist::getAll(), Client::getAll()];
          // Assert
          $this->assertEquals(array([], []), $result);
      }
      function test_find()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          $name = "Cecily Cardew";
          $test_stylist2 = new Stylist($name, $id);
          $test_stylist2->save();
          // Act
          $result = Stylist::find($test_stylist1->getId());
          // Assert
          $this->assertEquals($test_stylist1, $result);
      }
      function test_update()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          $new_name = "Laetitia Prism";
          // Act
          $test_stylist1->update($new_name);
          $result = Stylist::find($test_stylist1->getId())->getName();
          // Assert
          $this->assertEquals($new_name, $result);
      }
      function test_delete()
      {
          // Arrange
          $name = "Miss Prism";
          $id = null;
          $test_stylist1 = new Stylist($name, $id);
          $test_stylist1->save();
          $name = "Cecily Cardew";
          $test_stylist2 = new Stylist($name, $id);
          $test_stylist2->save();
          $name = "John Worthing";
          $test_stylist3 = new Stylist($name, $id);
          $test_stylist3->save();
          // Act
          $test_stylist1->delete();
          $result = Stylist::getAll();
          // Assert
          $this->assertEquals([$test_stylist2, $test_stylist3], $result);
      }
      function test_getClients()
      {
          // Arrange
          $stylist_name = "Miss Prism";
          $client_name1 = "Billy Yeats";
          $client_name2 = "Florence Farr";
          $client_name3 = "Maud Goone";
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
          $result = $test_stylist->getClients();
          // Assert
          $this->assertEquals([$test_client1, $test_client2, $test_client3], $result);
      }
      function test_deleteClients()
      {
          // Arrange
          $stylist_name1 = "Miss Prism";
          $stylist_name2 = "Cecily Cardew";
          $client_name1 = "Billy Yeats";
          $client_name2 = "Florence Farr";
          $client_name3 = "Maud Goone";
          $client_name4 = "Aleister Crowley";
          $id = null;
          $test_stylist1 = new Stylist($stylist_name1, $id);
          $test_stylist1->save();
          $test_stylist2 = new Stylist($stylist_name2, $id);
          $test_stylist2->save();
          $test_client1 = new Client($client_name1, $test_stylist1->getId(), $id);
          $test_client1->save();
          $test_client2 = new Client($client_name2, $test_stylist1->getId(), $id);
          $test_client2->save();
          $test_client3 = new Client($client_name3, $test_stylist2->getId(), $id);
          $test_client3->save();
          $test_client4 = new Client($client_name4, $test_stylist2->getId(), $id);
          $test_client4->save();
          // Act
          $test_stylist1->deleteClients();
          $result = Client::getAll();
          // Assert
          $this->assertEquals([$test_client3, $test_client4], $result);
      }

    }

?>
