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
            $_SESSION['msg'] = "Você não tem essa permição!";
            $this->router->redirect("pag.login");            
        }
    }
    
    public function home():void
    {        
        $ins = new Usuario();
        $table = $ins->getTable($_SESSION['user_id']);
        echo $this->view->render("user/dash/user-dash", ['coluna' => $table['colunas'][0], 'cartas' => $table['cartas']]);
    }    

    public function getInsertCardPart1()
    {       
        $teste = new Usuario();        
        $campos = $teste->getCamposInserirCart1();        
        echo $this->view->render("user/card/insert/insert-card-1", ["campos" => $campos]);
    }

    public function insertCardPart1IU($request)
    {
        // var_dump($request);
        // die;
        $teste = new Usuario();
        if(!empty($request))        
            $campos = $teste->inserirCart1($request);
        
        $this->router->redirect("pag.insertCardId", ["id" => $campos]);
    }


    public function getUpdateCardPart1($request)
    {
        $up = new Usuario();        
        $campos = $up->getUpdateCardPart1($request['id']);        
        // var_dump($campos);
        // die;
        echo $this->view->render("user/card/update/update-card-1", ["campos" => $campos]);
    }

    public function updateCardPart1($request)
    {
        var_dump($request);
        die;
    }
}

// public function insertCardPart1($request=null)
// {       
//     if(!empty($request)){
//         var_dump($request);
//         die;
//     } else {
//         $teste = new Usuario();
//         $campos = $teste->getCamposInserirCart();        
//     }
//     echo $this->view->render("user/insertCard/insert-card-1", ["campos" => $campos]);
// }
