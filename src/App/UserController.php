<?php

namespace Src\App;

use League\Plates\Engine;
use Src\Models\Card;
use Src\Models\Jogo;
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
        echo $this->view->render("user/dash/user-dash", ['coluna' => $table['colunas'][0], 'cartas' => $table['cartas'], 'jogos' => $table['jogos']]);
    }    

    public function homePost($request)
    {
        $ins = new Usuario();
        $table = $ins->getTable($_SESSION['user_id'], $request['id_jogo']);
        echo $this->view->render("user/dash/user-dash", ['coluna' => $table['colunas'][0], 'cartas' => $table['cartas'], 'jogos' => $table['jogos']]);        
    }
    
    public function getInsertJogo()
    {
        $jogo = new Jogo();
        $campo = $jogo->getInsertJogo();
        echo $this->view->render("user/jogo/insert/insert-jogo", ['campos' => $campo]);
    }

    public function insertJogo($request)
    {                
        if(!empty($request)){            
            $jogo = new Jogo();
            $val = $jogo->insertJogo($request);

            if ($val!=false) {
                $_SESSION['msgSuc'] = "Salvo com sucesso!";
            } else {
                $_SESSION['msg'] = "Não foi possivel salvar!";                
            }
            $this->router->redirect("pag.userHome");                
        }else{
            $_SESSION['msg'] = "Preencha o campo!";
            $this->router->redirect("pag.getInsertJogo");
        } 
    }

    public function getUpdateJogos()
    {
        $jogo = new Jogo();
        $jogos = $jogo->getUpdateJogos($_SESSION['user_id']);             
        echo $this->view->render("user/jogo/jogos", ['jogos' => $jogos]);
    }

    public function getUpdateJogo1($request)
    {
        $this->router->redirect("pag.getUpdateJogo", ["id_jogo" => $request['id_jogo']]);
    }

    public function getUpdateJogo($request)
    {           
        $jogo = new Jogo();
        $val = $jogo->getUpdateJogo($request['id_jogo']);
        echo $this->view->render("user/jogo/update/update-jogo", ['jogos' => $val, 'id_jogo' => $request['id_jogo']]);
    }

    public function updateJogo($request)
    {
        if(!empty($request)){
            $jogo = new Jogo();
            $val = $jogo->updateJogo($request);
            if ($val!=false) {
                $_SESSION['msgSuc'] = "Atualizado com sucesso!";
                $this->router->redirect("pag.getUpdateJogos");
            } else {
                $_SESSION['msg'] = "Não foi possivel atualizar!";
            }
        }else{
            $_SESSION['msg'] = "Campo obrigatório!";
        }
        $this->router->redirect("pag.getUpdateJogos");
    }

    public function getDeleteJogo()
    {
        $jogo = new Jogo();
        $jogos = $jogo->getDeleteJogo($_SESSION['user_id']);
        echo $this->view->render("user/jogo/delete/delete", ["jogos" => $jogos]);
    }

    public function deleteJogo($request)
    {      
        $jogo = new Jogo();
        if($jogo->deleteJogo($request['id_jogo'])){
            $_SESSION['msgSuc'] = "Deletado com sucesso!";
        }else{
            $_SESSION['msg'] = "Não foi possivel deletar!";
        }
        $this->router->redirect("usuario");
    }

    public function getInsertCard()
    {       
        $card = new Card();        
        $campos = $card->getInsertCard();    
        echo $this->view->render("user/card/insert/insert-card", ["campos" => $campos]);
    }

    public function insertCard($request)
    {       
        if(!empty($request)){
            $card = new Card();
            $id['id_carta'] = $card->inserirCard($request);

            if ($id['id_carta']!=false) {
                $_SESSION['msgSuc'] = "Salvo com sucesso!";
                $this->router->redirect("pag.getInsertModos", ["id_carta" => $id['id_carta']]);
            } else {
                $_SESSION['msg'] = "Não foi possivel salvar!";                
            }
        }else{
            $_SESSION['msg'] = "Preencha os campos corretamente!";
        }
        $this->router->redirect("pag.getInsertCard");
    }
    
    public function getInsertModos($request)
    {
        $modos = new Card();
        $campos = $modos->getInsertModos($request['id_carta']);
        
        echo $this->view->render("user/card/modos/modos", [
            "modos" => $campos['campos'], 
            "id_carta" => $request["id_carta"], 
            "nome_carta" => $campos['carta'][0]['nome_valor']
            ]);
    }

    public function getInsertCardModo($request)
    {
        $modo = new Card();
        $campos = $modo->getInsertCardModo($request['id_carta'], $request['id_modo']);
        echo $this->view->render("user/card/modos/insert/insert-modo", ["items" => $campos, "id_carta" => $request['id_carta']]);
    }

    public function insertCardModo($request)
    {
        $card = new Card();
        if ($card->insertCardModo($request)) {
            $_SESSION['msgSuc'] = "Modo cadastrado com sucesso!";
            $this->router->redirect("pag.getInsertModos", ["id_carta" => $request['id_carta']]);
        } else {
            $_SESSION['msg'] = "Não foi possivel cadastrar esse modulo!";
            $this->router->redirect("pag.getInsertCardModo", ["id_carta" => $request['id_carta'], "id_modo" => $request['id_modo']]);
        }
    }

    public function getUpdateCard($request)
    {
        $up = new Card();
        $campos = $up->getUpdateCardPart1($request['id']);
        echo $this->view->render("user/card/update/update-card-1", ["campos" => $campos]);
    }

    public function updateCard($request)
    {    
        $card = new Card();
        if ($card->updateCardPart1($request)) {
            $_SESSION['msgSuc'] = "Atualizado com sucesso!";            
            $this->router->redirect("pag.getUpdateModos", ["id_carta" => $request['id']]);
        } else {
            $_SESSION['msg'] = "Não foi possivel atualizar!";
            $this->router->redirect("pag.getUpdate1", ["id" => $request['id']]);
        }
    }

    public function getUpdateCardModos($request)
    {
        $modos = new Card();        
        $campos = $modos->getUpdateCardModos($request['id_carta']);
        echo $this->view->render("user/card/modos/modos", [
            "modos" => $campos['campos'],
            "id_carta" => $request["id_carta"],
            "nome_carta" => $campos['carta'][0]['nome_valor']
            ]);
    }
    
    public function getUpdateCardModo($request)
    {    
        $modo = new Card();
        $campos = $modo->getUpdateCardModo($request['id_carta'], $request['id_modo']);
        echo $this->view->render("user/card/modos/update/update-modo", ["items" => $campos, "id_carta" => $request['id_carta']]);
    }

    public function updateCardModo($request)
    {
        $card = new Card();
        if ($card->updateCardModo($request)) {
            $_SESSION['msgSuc'] = "Atualizado com sucesso!";
            $this->router->redirect("pag.getUpdateModos", ["id_carta" => $request['id_carta']]);
        } else {
            $_SESSION['msg'] = "Não foi possivel atualizar!";
            $this->router->redirect("pag.getUpdateModo", ["id_carta" => $request['id_carta'],"id_modo" => $request['id_modo']]);
        }
    }

    public function deleteCard($request)
    {                  
        $card = new Card();
        if ($card->deleteCard($request['id_carta'])) {
            $_SESSION['msgSuc'] = "Carta deletada com sucesso!";
        } else {
            $_SESSION['msg'] = "Não foi possivel deletar essa carta!";
        }
        $this->router->redirect("pag.userHome");
    }

}