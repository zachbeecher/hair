<?php
      date_default_timezone_set('America/Los_Angeles');
      require_once __DIR__.'/../vendor/autoload.php';
      require_once __DIR__.'/../src/Stylist.php';
      require_once __DIR__.'/../src/Client.php';

      use Symfony\Component\Debug\Debug;
      Debug::enable();

      $app = new Silex\Application();
      $app["debug"] = true;

      $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    	$user = 'root';
    	$password = 'root';
    	$DB = new PDO($server, $user, $password);

      $app->register(new Silex\Provider\TwigServiceProvider(), array(
          'twig.path' => __DIR__.'/../views'
      ));

      use Symfony\Component\HttpFoundation\Request;
      Request::enableHttpMethodParameterOverride();

      $app->get("/", function() use ($app) {
          return $app['twig']->render('index.html.twig',
              array('stylists' => Stylist::getAll()));
      });

      $app->post("/clients", function() use ($app) {
          $stylist_id = $_POST["stylist_id"];
          $client = new Client($id = null,
              $stylist_id);
          $client->save();
          $stylist = Stylist::find($stylist_id);
          return $app["twig"]->render("stylist.html.twig",
              array("stylist" => $stylist, "clients" =>
              $stylist->getClients()));
      });
      $app->get("/stylists/{id}", function($id) use ($app) {
          $stylist = Stylist::find($id);
          return $app['twig']->render('stylist.html.twig',
              array('stylist' => $stylist, 'clients' =>
              $stylist->getClients()));
      });
      $app->post("/deleted_clients", function() use ($app) {
          Client::deleteAll();
          return $app['twig']->render('index.html.twig',
              array('stylists' => Stylist::getAll()));
      });
      $app->post("/stylists", function() use ($app) {
          $stylist = new Stylist($_POST["name"]);
          $stylist->save();
          return $app["twig"]->render("index.html.twig",
              array("stylists" => Stylist::getAll()));
      });
      $app->post("/deleted_stylists", function() use ($app) {
          Stylist::deleteAll();
          return $app['twig']->render('index.html.twig',
              array('stylists' => Stylist::getAll()));
      });
      $app->get("/stylists/{id}/edit", function($id) use ($app) {
          $stylist = Stylist::find($id);
          return $app["twig"]->render("stylist_edit.html.twig", array("stylist" => $stylist));
      });
      $app->patch("/stylists/{id}", function($id) use ($app) {
          $name = $_POST["name"];
          $stylist = Stylist::find($id);
          return $app["twig"]->render("stylist.html.twig", array("stylist" => $stylist, "clients" => $stylist->getClients()));
      });
      $app->get("/client/{id}/edit", function($id) use ($app) {
          $client = Client::find($id);
          return $app["twig"]->render("client_edit.html.twig", array("client" => $client));
      });
      $app->delete("/stylist_deleted/{id}", function($id) use ($app) {
          $stylist = Stylist::find($id);
          $stylist->deleteOne();
          return $app["twig"]->render("stylist_deleted.html.twig", array("stylists" => Stylist::getAll()));
      });
      $app->delete("/client_deleted/{id}", function($id) use ($app) {
          $client = Client::find($id);
          $client->deleteOne();
          return $app["twig"]->render("client_deleted.html.twig", array("stylists" => Stylist::getAll()));
      });

      return $app;
  ?>
