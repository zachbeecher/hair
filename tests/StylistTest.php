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

    class StylistTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Stylist::deleteAll();
            Client::deleteAll();
        }
        function test_getName() {
            $name = "Ricky";
            $test_stylist = new Stylist($name);
            $result = $test_stylist->getName();
            $this->assertEquals($name, $result);
        }
        function test_save() {
            $name = "Ricky";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $result = Stylist::getAll();
            $this->assertEquals($test_stylist, $result[0]);
        }
        function test_getAll() {
            $name = "Ricky";
            $name2 = "Nick";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();
            $result = Stylist::getAll();
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }
        function test_deleteAll() {
            $name = "Joe";
            $name2 = "Nick";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();
            Stylist::deleteAll();
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }
        function test_find() {
            $name = "Joe";
            $name2 = "Nick";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();
            $result = Stylist::find($test_stylist->getId());
            $this->assertEquals($test_stylist, $result);
        }
        function test_deleteOne() {
            $name = "Ricky";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $name2 = "Nick";
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();
            $test_stylist->deleteOne();
            $result = Stylist::getAll();
            $this->assertEquals([$test_stylist2], $result);
        }
    }

?>
