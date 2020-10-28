<?php

namespace Src\App;

use League\Plates\Engine;

class TableController 
{
    private $view;
    private $router;
    
    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(__DIR__."/../../resources/views",'php');
    }
    
    public function home():void
    {        
        $this->router->redirect("login");
    }
        
    public function login():void
    {
        echo $this->view->render("login/login");
    }
}
