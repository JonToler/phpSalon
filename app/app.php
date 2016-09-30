<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Salon.php";


    $server = 'mysql:host=localhost;dbname=salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

  //loads actual twig file
    $app->get("/", function() use ($app) {
      return $app['twig']->render("salon.html.twig"), array('stylistsNames' => );
    });

  //loads basic php
    $app->get("/test", function() use ($app) {
      return 'test variables here';
    });

    $app->post("/clients", function() use ($app) {
    $client = new Client($_POST['name']);
    $client->save();
    return $app['twig']->render('create_client.html.twig', array('newclient' => $client));
});

$app->post("/delete_clients", function() use ($app) {
    Client::deleteAll();
    return $app['twig']->render('delete_clients.html.twig');
});

    return $app;
?>
