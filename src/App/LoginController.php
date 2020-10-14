<?php

namespace Src\App;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Src\Models\Login;

class LoginController 
{
    /** @var Router */
    private $router;

    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(__DIR__."/../../resources/views",'php');
        $this->router = $router;        
    }
    
    public function index():void
    {                        
        echo $this->view->render("login/login");
    }    
    
    public function login($request):void
    {        
        $log = new Login();

        if($log->valLogin($request)){
           
            if($_SESSION['user_acesso'] == 1){
                            
                $this->router->redirect("pag.admin");   
            }else if($_SESSION['user_acesso'] == 2){
             
                $this->router->redirect("pag.userHome");
            }else {
                $_SESSION['msg'] = "Você não tem essa permissão!";
                echo $this->view->render("login", ['form' => $request['usuario']]);
            }
        }else{            
            echo $this->view->render("login/login", ['form' => $request['usuario']]);
        }        
    }

    public function logout()
    {       
        unset(
            $_SESSION['user_id'],
            $_SESSION['user'],
            $_SESSION['user_acesso']            
        );
        session_destroy();
    
        $this->router->redirect("login");
    }
}
