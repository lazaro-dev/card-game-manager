<?php

namespace Src\App;

use League\Plates\Engine;
class AdminController 
{
    
    private $view;
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(__DIR__."/../../resources/views",'php');

        if(!isset($_SESSION['user_acesso'])||($_SESSION['user_acesso'] != 1 && isset($_SESSION['user_acesso']))){     
            $_SESSION['msg'] = "Você não tem essa permição!";       
            $this->router->redirect("pag.login");            
        }
    }
    
    public function home():void
    {                        
        echo $this->view->render("admin/admin-dash");
    }    

}
