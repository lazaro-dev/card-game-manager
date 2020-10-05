<?php

namespace Src\App;

use League\Plates\Engine;
use Src\Models\Usuario;

class UserController 
{
    private $view;
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(__DIR__."/../../resources/views",'php');

        if(!isset($_SESSION['user_acesso'])||($_SESSION['user_acesso'] != 2 && isset($_SESSION['user_acesso']))){
            $_SESSION['msg'] = "<div class='alert alert-danger'>Você não tem essa permição!</div>";
            $this->router->redirect("pag.login");            
        }
    }
    
    public function home():void
    {        
        $teste = new Usuario();
        $table = $teste->getTable($_SESSION['user_id']);         
        echo $this->view->render("user/user-dash", ['coluna' => $table['colunas'][0], 'linha' => $table['linhas']]);
    }
    

}
