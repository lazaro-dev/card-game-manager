<?php
require __DIR__ . './vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL);

$router->namespace("Src\App");


$router->get('/', 'TableController:home', 'pag.principal');

$router->group('/login');
$router->get('/', 'LoginController:index', 'pag.login');
$router->post('/', 'LoginController:login', 'pag.loginForm');

$router->group('/logout');
$router->get('/', 'LoginController:logout', 'pag.logout');


$router->group('/ooops');
$router->get('/{errcode}', "web:error");

    
$router->group('/admin');
$router->get('/', "AdminController:home","pag.admin");
$router->get('/edit-tabela', "AdminController:editTabela","pag.editTabela");
$router->post('/edit-tabela', "AdminController:editarTabela","pag.editarTabela");


$router->group('/usuario');
$router->get('/', "UserController:home","pag.userHome");
$router->get('/insert-card', "UserController:insertCard","pag.insertCard");
// $router->post('/insert-card', "UserController:insertCardPost","pag.insertCardPost");
$router->get('/edit', "UserController:edit","pag.edit");
$router->get('/editar', "UserController:editar","pag.editar");


$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}