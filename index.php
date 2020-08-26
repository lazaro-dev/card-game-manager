<?php
require __DIR__ . './vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL);

$router->namespace("Src\App");


$router->get('/', 'TableController:home', 'pag.principal');

$router->group('/ooops');
$router->get('/{errcode}', "web:error");
        

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}