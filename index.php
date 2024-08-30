<?php

require_once 'vendor/autoload.php';

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

$router->get('/', fn() => (new HomeController())->index());
$router->get('/about', fn() => (new HomeController())->about());

$router->get('/contacts', fn() => (new ContactController())->index());
$router->get('/create', fn() => (new ContactController())->create());
$router->post('/store', fn() => (new ContactController())->store());
$router->get('/contacts/1', function() {
  $contactController = new ContactController();
  return $contactController->show(); // Llama al método show del ContactController
});

/* $router->get('/', fn() => (new ContactController())->edit$router->get('/contacts/{id}', fn() => (new ContactController())->show());());
$router->get('/', fn() => (new ContactController())->update());
$router->get('/', fn() => (new ContactController())->destroy()); */

$router->start();