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
$router->put('/update-user/{id_user}', "AdminController:updateUser","pag.updateUser");
$router->delete('/delete-user', "AdminController:deleteUser","pag.deleteUser");

$router->get('/table-user/{id_user}', "AdminController:getTableUser","pag.getTableUser");
$router->post('/table-user/{id_user}', "AdminController:getTableUserPost","pag.getTableUserPost");


$router->get('/update-table', "AdminController:getUpdateTable","pag.getUpdateTable");
$router->put('/update-table', "AdminController:updateTable","pag.updateTable");

$router->get('/update-modos', "AdminController:getUpdateModos","pag.getUpdateModosTab");
$router->post('/update-modos', "AdminController:getUpdateModo1","pag.getUpdateModo1Tab");
$router->get('/update-modo/{id_modo}', "AdminController:getUpdateModo","pag.getUpdateModoTab");
$router->put('/update-modo/{id_modo}', "AdminController:updateModo","pag.updateModoTab");

//
$router->get('/update-items-atributo', "AdminController:getUpdateItemsAtributo","pag.getUpdateItemsAtributo");
$router->post('/update-items-atributo', "AdminController:getUpdateItemsAtributo1","pag.getUpdateItemsAtributo1");
$router->get('/update-item-atributo/{id_item}', "AdminController:getUpdateItemAtributo","pag.getUpdateItemAtributo");
$router->put('/update-item-atributo/{id_item}', "AdminController:updateItemAtributo","pag.updateItemAtributo");
//

$router->get('/update-items', "AdminController:getUpdateItems","pag.getUpdateItems");
$router->post('/update-items', "AdminController:getUpdateItem1","pag.getUpdateItem1");
$router->get('/update-item/{id_item}', "AdminController:getUpdateItem","pag.getUpdateItem");
$router->put('/update-item/{id_item}', "AdminController:updateItem","pag.updateItem");

$router->get('/update-password', "AdminController:getUpdatePassword","pag.getUpdatePassword");
$router->put('/update-password/{id_user}', "AdminController:updatePassword","pag.updatePassword");


$router->group('/usuario');
$router->get('/', "UserController:home","pag.userHome");
$router->post('/', "UserController:homePost","pag.userHomePost");

$router->get('/insert-jogo', "UserController:getInsertJogo","pag.getInsertJogo");
$router->post('/insert-jogo', "UserController:insertJogo","pag.insertJogo");
$router->get('/update-jogos', "UserController:getUpdateJogos","pag.getUpdateJogos");
$router->post('/update-jogos', "UserController:getUpdateJogo1","pag.getUpdateJogo1");
$router->get('/update-jogo/{id_jogo}', "UserController:getUpdateJogo","pag.getUpdateJogo");
$router->put('/update-jogo/{id_jogo}', "UserController:UpdateJogo","pag.updateJogo");

$router->get('/delete-jogo', "UserController:getDeleteJogo","pag.getDeleteJogo");
$router->delete('/delete-jogo', "UserController:deleteJogo","pag.deleteJogo");

$router->get('/insert-card', "UserController:getInsertCard","pag.getInsertCard");
$router->post('/insert-card', "UserController:insertCard","pag.insertCard");
$router->get('/insert-modo/{id_carta}', "UserController:getInsertModos","pag.getInsertModos");
$router->get('/insert-modo/{id_carta}/{id_modo}', "UserController:getInsertCardModo","pag.getInsertCardModo");
$router->post('/insert-modo/{id_carta}/{id_modo}', "UserController:insertCardModo","pag.insertCardModo");

$router->get('/update-card-1/{id}', "UserController:getUpdateCard","pag.getUpdate1");
$router->put('/update-card-1/{id}', "UserController:updateCard","pag.update1");
$router->get('/update-modo/{id_carta}', "UserController:getUpdateCardModos","pag.getUpdateModos");
$router->get('/update-modo/{id_carta}/{id_modo}', "UserController:getUpdateCardModo","pag.getUpdateModo");
$router->put('/update-modo/{id_carta}/{id_modo}', "UserController:updateCardModo","pag.updateModo");

$router->delete('/delete-card', "UserController:deleteCard","pag.deleteCard");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}