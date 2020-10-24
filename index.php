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
$router->get('/insert-user', "AdminController:getInsertUser","pag.getInsertUser");
$router->post('/insert-user', "AdminController:insertUser","pag.insertUser");
$router->get('/update-user/{id_user}', "AdminController:getUpdateUser","pag.getUpdateUser");
$router->post('/update-user/{id_user}', "AdminController:updateUser","pag.updateUser");
$router->delete('/delete-user', "AdminController:deleteUser","pag.deleteUser");

$router->get('/update-table', "AdminController:getUpdateTable","pag.getUpdateTable");
$router->post('/update-table', "AdminController:updateTable","pag.updateTable");


$router->group('/usuario');
$router->get('/', "UserController:home","pag.userHome");

$router->get('/insert-jogo', "UserController:getInsertJogo","pag.getInsertJogo");
$router->post('/insert-jogo', "UserController:insertJogo","pag.insertJogo");
$router->get('/update-jogo', "UserController:getUpdateJogo","pag.getUpdateJogo");
$router->post('/update-jogo', "UserController:UpdateJogo","pag.updateJogo");

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

$router->delete('/delete-card', "UserController:deleteCard","pag.deleteCard");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}