
<?php
    class Client
    {
        private $name;
        private $id;
        private $id_stylist;
    function __construct($name, $id_stylist, $id = null)
    {
        $this->name = $name;
        $this->id_stylist = $id_stylist;
        $this->id = $id;
    }
    function getName()
    {
        return $this->name;
    }
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }
    function getId()
    {
        return $this->id;
    }
    function getstylistID()
    {
        return $this->id_stylist;
    }
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO client (name, id_stylist) VALUES ('{$this->getName()}', {$this->getstylistID()})");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }
    static function getAll()
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM client;");
        $clients = array();
        foreach($returned_clients as $client) {
            $name = $client['name'];
            $id = $client['id'];
            $id_stylist = $client['id_stylist'];
            $new_client = new Client($name, $id_stylist, $id);
            array_push($clients, $new_client);
        }
        return $clients;
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM client;");
    }
    static function find($searchId)
    {
        $found_client = null;
        $clients = Client::getAll();
        foreach($clients as $client) {
            $client_id = $client->getId();
            if ($client_id == $searchId) {
              $found_client = $client;
            }
        }
        return $found_client;
    }
    }
?>
