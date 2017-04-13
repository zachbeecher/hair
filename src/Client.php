<?php
    class Client {
        private $stylist_id;
        private $id;

        function __construct($id = null, $stylist_id) {

            $this->id = $id;
            $this->stylist_id = $stylist_id;

        }
        function getId() {
            return $this->id;
        }
        function getStylistId() {
            return $this->stylist_id;
        }
        function save() {
            $GLOBALS['DB']->exec("INSERT INTO clients (stylist_id) VALUES ({$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        static function getAll() {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
        static function find($search_id) {
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
        function deleteOne() {
            $GLOBALS["DB"]->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

    }
?>
