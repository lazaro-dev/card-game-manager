<?php

namespace Src\App;

use League\Plates\Engine;
use Src\Models\Card;
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
        $card = new Card();        
        $campos = $card->getCamposInserirCart1();        
        echo $this->view->render("user/card/insert/insert-card-1", ["campos" => $campos]);
    }

    public function insertCardPart1IU($request)
    {       
        $card = new Card();
        if(!empty($request))        
        $campos = $card->inserirCart1($request);
        
        $this->router->redirect("pag.insertCardId", ["id" => $campos]);
    }
    
    public function getUpdateCardPart1($request)
    {
        $up = new Card();        
        $campos = $up->getUpdateCardPart1($request['id']);
        echo $this->view->render("user/card/update/update-card-1", ["campos" => $campos]);
    }
    
    public function updateCardPart1($request)
    {    
        $card = new Card();
        if ($card->updateCardPart1($request)) {
            $_SESSION['msg'] = "Atualizado com sucesso!";
            // url("/update-modo").'/'.$id_carta.'/'.$mod['id_modo_jogo']
            $this->router->redirect("pag.getUpdateModos", ["id_carta" => $request['id']]);
        } else {
            $_SESSION['msg'] = "Não foi possivel atualizar!";
            $this->router->redirect("pag.getUpdate1", ["id" => $request['id']]);
        }
    }

    public function getUpdateCardModos($request)
    {
        // var_dump($request);
        // die;
        $modos = new Card();        
        $campos = $modos->getUpdateCardModos($request['id_carta']);
        echo $this->view->render("user/card/modos/modos", ["modos" => $campos, "id_carta" => $request["id_carta"]]);
    }
    
    public function getUpdateCardModo($request)
    {    
        // var_dump($request);
        // die;
        $modo = new Card();
        $campos = $modo->getUpdateCardModo($request['id_carta'], $request['id_modo']);
        echo $this->view->render("user/card/modos/update/modo", ["modos" => $campos]);
        // if ($card->updateCardPart1($request)) {
        //     $_SESSION['msg'] = "Atualizado com sucesso!";
        //     $this->router->redirect("pag.getUpdate2", ["id" => $request['id']]);
        // } else {
        //     $_SESSION['msg'] = "Não foi possivel atualizar!";
        //     $this->router->redirect("pag.getUpdate1", ["id" => $request['id']]);
        // }
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
