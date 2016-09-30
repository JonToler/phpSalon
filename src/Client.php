
<?php
    class Client
    {
        private $name;
        private $id;
        private $id_stylist;

        function __construct($name)
        {
          $this->name = $name;
        }
        function setname($new_name)
        {
          $this->name = (string) $new_name;
        }

        function getname()
        {
          return $this->name;
        }

        function save()
        {
          $GLOBALS['DB']->exec("INSERT INTO clients (name) VALUES ('{$this->getName()}');");
        }

        static function getAll()
        {
          $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
          $clients = array();
          foreach($returned_clients as $client) {
              $name = $client['name'];
              $new_client = new Client($name);
              array_push($clients, $new_client);
          }
          return $clients;
        }

        static function deleteAll()
        {
           $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
    }
?>
