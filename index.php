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


if($_SESSION['user_acesso'] == 1){
    
    $router->group('/admin');
    $router->get('/', "AdminController:home","pag.adminHome");
}else if($_SESSION['user_acesso'] == 2){
    
    $router->group('/usuario');
    $router->get('/', "UserController:home","pag.userHome");
}



$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}