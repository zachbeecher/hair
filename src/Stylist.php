<?php
    class Stylist
    {
        private $name;
        private $id;

        function __construct($name, $id = null) {
            $this->name = $name;
            $this->id = $id;
        }
        function setName($name) {
            $this->name = (string) $name;
        }
        function getName() {
            return $this->name;
        }
        function setId($id) {
            $this->id = $id;
        }
        function getId() {
            return $this->id;
        }
        function getClients() {
            $clients = array();
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            foreach($returned_clients as $client) {
                $id = $client["id"];
                $stylist_id = $client["stylist_id"];
                $new_client = new Client($id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }
        function save() {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");
            $result_id = $GLOBALS['DB']->lastInsertId();
            $this->setId($result_id);
        }
        static function getAll() {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }
        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
        static function find($search_id) {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
        function deleteOne() {
            $GLOBALS["DB"]->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }

    }
?>
