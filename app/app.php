<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('Salon.html.twig');
    });

    $app->get("/Clients", function() use ($app) {
        return $app['twig']->render('Clients.html.twig', array('Clients' => Client::getAll()));
    });

    $app->get("/Stylists", function() use ($app) {
         return $app['twig']->render('Stylists.html.twig', array('Stylists' => Stylist::getAll()));
     });

    $app->post("/Clients", function() use ($app) {
        $client = new Client($_POST['name']);
        $client->save();
        return $app['twig']->render('Clients.html.twig', array('Clients' => Client::getAll()));
    });

    $app->post("/delete_Clients", function() use ($app) {
        Client::deleteAll();
        return $app['twig']->render('Salon.html.twig');
    });

    $app->post("/Stylists", function() use ($app) {
            $category = new Category($_POST['name']);
            $category->save();
            return $app['twig']->render('Stylists.html.twig', array('Stylists' => Stylist::getAll()));
        });

        $app->post("/delete_stylists", function() use ($app) {
            Stylist::deleteAll();
            return $app['twig']->render('index.html.twig');
        });
    return $app;
?>
