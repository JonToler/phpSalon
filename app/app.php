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

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });
    $app->post('/stylists', function() use ($app) {
        $new_name = $_POST['stylist_name'];
        $new_stylist = new Stylist($new_name, null);
        $new_stylist->save();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });
    $app->post('/stylists/delete_all', function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });
    $app->get('/stylists/{id}', function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        return $app['twig']->render('clients.html.twig', array('stylist' => $found_stylist, 'clients' => $found_stylist->getClients()));
    });
    $app->get('/stylists/{id}/edit', function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        return $app['twig']->render('stylists_edit.html.twig', array('stylist' => $found_stylist));
    });
    $app->patch('/stylists/{id}', function($id) use ($app) {
        $new_name = $_POST['new_stylist_name'];
        $stylist = Stylist::find($id);
        $stylist->update($new_name);
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });
    $app->delete('/stylists/{id}', function($id) use ($app){
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });
    $app->post('/clients/{id}/add', function($id) use ($app) {
        $stylist_id = $id;
        $client_name = $_POST['client_name'];
        $new_client = new Client($client_name, $stylist_id);
        $new_client->save();
        $stylist = Stylist::find($id);
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
    $app->post('/clients/{id}/delete_all', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->deleteClients();
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
    $app->get('/clients/{id}/edit', function($id) use ($app) {
        $found_client = Client::find($id);
        return $app['twig']->render('clients_edit.html.twig', array('client' => $found_client));
    });
    $app->patch('/clients/{id}', function($id) use ($app) {
        $new_name = $_POST['new_client_name'];
        $client = Client::find($id);
        $client->update($new_name);
        $stylist = Stylist::find($client->getStylistId());
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
    $app->delete('/clients/{id}/delete', function($id) use ($app){
        $client = Client::find($id);
        $stylist_id = $client->getStylistId();
        $client->delete();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });
    $app->post('/clients/delete_all', function() use ($app) {
        Client::deleteAll();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });
      return $app;
?>
