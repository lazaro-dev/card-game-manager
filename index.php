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

$router->get('/insert-card-1', "UserController:getInsertCardPart1","pag.getInsert1");
$router->post('/insert-card-1', "UserController:insertCardPart1","pag.insert1");
$router->get('/insert-card-2', "UserController:insertCardPart2","pag.getInsert2");

$router->get('/update-card-1/{id}', "UserController:getUpdateCardPart1","pag.getUpdate1");
$router->post('/update-card-1/{id}', "UserController:updateCardPart1","pag.update1");
// $router->get('/update-card-2/{id}', "UserController:getUpdateCardPart2","pag.getUpdate2");
$router->get('/update-modo/{id_carta}', "UserController:getUpdateCardModos","pag.getUpdateModos");
$router->get('/update-modo/{id_carta}/{id_modo}', "UserController:getUpdateCardModo","pag.getUpdateModo");
$router->post('/update-modo/{id_carta}/{id_modo}', "UserController:updateCardModoFinal","pag.updateModo");
// $router->post('/insert-card-1', "UserController:insertCardPart1IU","pag.insertCardPost1IU");

$router->get('/edit', "UserController:edit","pag.edit");
$router->get('/editar', "UserController:editar","pag.editar");


$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}