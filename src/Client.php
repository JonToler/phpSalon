
<?php
  class Client
  {
    private $name;
    private $stylist_id;
    private $id;

    function __construct($name, $stylist_id, $id = null)
    {
      $this->name = $name;
      $this->stylist_id = $stylist_id;
      $this->id = $id;

    }

    function getName()
    {
        return $this->name;
    }
    function getStylistId()
    {
        return $this->stylist_id;
    }
    function getId()
    {
        return $this->id;
    }
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }
    function setId($new_id)
    {
        $this->id = (int) $new_id;
    }
    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO client (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()})");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }
    static function getAll()
    {
        $returned_client = $GLOBALS['DB']->query("SELECT * FROM client;");
        $clients = array();
        foreach($returned_client as $client) {
            $name = $client['name'];
            $stylist_id = $client['stylist_id'];
            $id = $client['id'];
            $new_client = new Client($name, $stylist_id, $id);
            array_push($clients, $new_client);
        }
        return $clients;
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM client;");
    }
    static function find($search_id)
    {
        $found_client = null;
        $clients = Client::getAll();
        foreach($clients as $client) {
            $client_id = $client->getId();
            if ($client_id == $search_id) {
              $found_client = $client;
            }
        }
        return $found_client;
    }
    function update($new_name)
    {
        $GLOBALS['DB']->exec("UPDATE client SET name = '{$new_name}' WHERE id = {$this->getId()};");
        $this->setName($new_name);
    }
    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM client WHERE id = {$this->getId()};");
    }

  }
?>
