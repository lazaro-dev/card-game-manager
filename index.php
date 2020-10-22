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
$router->get('/{errcode}', "ErroController:error");

    
$router->group('/admin');
$router->get('/', "AdminController:home","pag.admin");
$router->get('/edit-tabela', "AdminController:editTabela","pag.editTabela");
$router->post('/edit-tabela', "AdminController:editarTabela","pag.editarTabela");


$router->group('/usuario');
$router->get('/', "UserController:home","pag.userHome");

$router->get('/insert-card', "UserController:getInsertCard","pag.getInsertCard");
$router->post('/insert-card', "UserController:insertCard","pag.insertCard");
$router->get('/insert-modo/{id_carta}', "UserController:getInsertModos","pag.getInsertModos");
$router->get('/insert-modo/{id_carta}/{id_modo}', "UserController:getInsertCardModo","pag.getInsertCardModo");
$router->post('/insert-modo/{id_carta}/{id_modo}', "UserController:insertCardModo","pag.insertCardModo");

$router->get('/update-card-1/{id}', "UserController:getUpdateCard","pag.getUpdate1");
$router->post('/update-card-1/{id}', "UserController:updateCard","pag.update1");
$router->get('/update-modo/{id_carta}', "UserController:getUpdateCardModos","pag.getUpdateModos");
$router->get('/update-modo/{id_carta}/{id_modo}', "UserController:getUpdateCardModo","pag.getUpdateModo");
$router->post('/update-modo/{id_carta}/{id_modo}', "UserController:updateCardModo","pag.updateModo");

$router->get('/delete-card/{id_carta}', "UserController:deleteCard","pag.deleteCard");

// $router->get('/edit', "UserController:edit","pag.edit");
// $router->get('/editar', "UserController:editar","pag.editar");


$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}