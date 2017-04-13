<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Stylist::deleteAll();
            Client::deleteAll();
        }
        function test_getId() {
            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $result = $test_client->getId();
            $this->assertEquals(true, is_numeric($result));
        }
        function test_getStylistId() {
            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $result = $test_client->getStylistId();
            $this->assertEquals(true, is_numeric($result));
        }
        function test_save() {
            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }
        function test_getAll() {
            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $test_client2 = new Client($id, $stylist_id);
            $test_client2->save();
            $result = Client::getAll();
            $this->assertEquals([$test_client, $test_client2], $result);
        }
        function test_deleteAll() {

            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $test_client2 = new Client($id, $stylist_id);
            $test_client2->save();
            Client::deleteAll();
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_find() {
            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $test_client2 = new Client($id, $stylist_id);
            $test_client2->save();
            $result = Client::find($test_client->getId());
            $this->assertEquals($test_client, $result);
        }
        function test_deleteOne() {
            $name = "Jax";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $stylist_id);
            $test_client->save();
            $test_client->deleteOne();
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

    }















 ?>
