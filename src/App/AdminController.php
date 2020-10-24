<?php

namespace Src\App;

use League\Plates\Engine;
use Src\Models\Admin;

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
        $model = new Admin();
        $users = $model->getUsers();
        echo $this->view->render("admin/dash/admin-dash", ['users' => $users]);
    }    

    public function getInsertUser()
    {
        // $model = new Admin();
        // $users = $model->getUsers();
        echo $this->view->render("admin/user/insert/insert-user");
    }
}
