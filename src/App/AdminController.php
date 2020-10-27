<?php

namespace Src\App;

use League\Plates\Engine;
use Src\Models\Admin;
use Src\Models\Table;

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
        echo $this->view->render("admin/user/insert/insert-user");
    }

    public function insertUser($request)
    {
        $model = new Admin();
        if($model->insertUserVal($request)){
            if($model->insertUser($request)){
                $_SESSION['msgSuc'] = "Usuário criado!";
                $this->router->redirect("pag.admin");
            }else{                
                $_SESSION['msg'] = "Não foi possivel inserir!";
            }
        }else{
            $_SESSION['msg'] = "Usuário já existente, escolha outro 'username'!";
        }
        $this->router->redirect("pag.getInsertUser");
    }
    
    public function getUpdateUser($request)
    {
        $model = new Admin();
        $user = $model->getUser($request['id_user']);
        echo $this->view->render("admin/user/update/update-user", ['user' => $user, 'id_user' => $request['id_user']]);
    }
    
    public function updateUser($request)
    {
        $model = new Admin();
        if($model->updateUser($request)){
            $_SESSION['msgSuc'] = "Usuário atulizado!";
            $this->router->redirect("pag.admin");
        }else{
            $_SESSION['msg'] = "Não foi possivel atualizar!";
            $this->router->redirect("pag.getUpdateUser");
        }
    }

    public function deleteUser($request)
    {
        $model = new Admin();
        if ($model->deleteUser($request['id_user'])) {
            $_SESSION['msgSuc'] = "Usuário deletada com sucesso!";
        } else {
            $_SESSION['msg'] = "Não foi possivel deletar essa usuário!";
        }
        $this->router->redirect("pag.admin");
    }
    public function getUpdatePassword()
    {
        // $model = new Admin();
        // $user = $model->getUser($_SESSION['user_id']);        
        echo $this->view->render("admin/password/update/update-password", ['user' => $_SESSION['user'], 'id_user' => $_SESSION['user_id']]);
    }

    public function updatePassword($request)
    {                
        if(!empty($request)){
            $table = new Admin();
            if($table->valPass($request['id_user'], $request['senhaAtual'])){
                if ($table->updateUser($request)) {
                    $_SESSION['msgSuc'] = "Senha atualizada!";
                    $this->router->redirect("pag.admin");
                } else {
                    $_SESSION['msg'] = "Não foi possivel atualizar a senha!";                    
                }
            }else{
                $_SESSION['msg'] = "Senha incorreta!";
            }
        }else{
            $_SESSION['msg'] = "Preencha os campos corretamente!";
        }
        $this->router->redirect("pag.getUpdatePassword");        
    }
    
    public function getUpdateTable()
    {
        $model = new Table();
        $table = $model->getUpdateTable();
        echo $this->view->render("admin/table/update/update-table", ['table' => $table]);
    }

    public function updateTable($request)
    {           
        if(!empty($request)){
            $table = new Table();            
            if ($table->updateTable($request)) {
                $_SESSION['msgSuc'] = "Tabela atualizada!";
                $this->router->redirect("pag.admin");
            } else {
                $_SESSION['msg'] = "Não foi possivel atualizar a tabela!";                
            }
        }else{
            $_SESSION['msg'] = "Preencha os campos corretamente!";
        }
        $this->router->redirect("pag.getUpdateTable");
    }
    
    public function getUpdateModos()
    {
        $model = new Table();
        $modos = $model->getUpdateModos();
        echo $this->view->render("admin/table/modos/modos", ['modos' => $modos]);
    }    
    public function getUpdateModo1($request)
    {        
        $this->router->redirect("pag.getUpdateModoTab", ["id_modo" => $request['id_modo']]);
    }

    public function getUpdateModo($request)
    {
        $model = new Table();
        $modo = $model->getUpdateModo($request['id_modo']);
        echo $this->view->render("admin/table/modos/update/update-modo", ['modo' => $modo, 'id_modo' => $request['id_modo']]);
    }

    public function updateModo($request)
    {           
        if(!empty($request)){
            $table = new Table();            
            if ($table->updateModo($request)) {
                $_SESSION['msgSuc'] = "Modo atualizada!";
                $this->router->redirect("pag.getUpdateModosTab");
            } else {
                $_SESSION['msg'] = "Não foi possivel atualizar o modo!";                
            }
        }else{
            $_SESSION['msg'] = "Preencha os campos corretamente!";
        }
        $this->router->redirect("pag.getUpdateModoTab", ["id_modo" => $request['id_modo']]);
    }

    public function getUpdateItems()
    {
        $model = new Table();
        $items = $model->getUpdateItems();
        echo $this->view->render("admin/table/items/items", ['items' => $items]);
    }

    public function getUpdateItem1($request)
    {
        $this->router->redirect("pag.getUpdateItem", ["id_item" => $request['id_item']]);
    }

    public function getUpdateItem($request)
    {
        $model = new Table();
        $atributos = $model->getUpdateItem($request['id_item']);
        echo $this->view->render("admin/table/items/update/update-item", [
            'atributos' => $atributos['atributos'], 
            'nome_item' => $atributos['nome_item'],             
            'id_item' => $request['id_item']
        ]);
    }

    public function updateItem($request)
    {
        // var_dump($request);
        // die;   
        if(!empty($request)){
            $table = new Table();            
            if ($table->updateItem($request)) {
                $_SESSION['msgSuc'] = "Item atualizada!";
                $this->router->redirect("pag.getUpdateItems");
            } else {
                $_SESSION['msg'] = "Não foi possivel atualizar o item!";                
            }
        }else{
            $_SESSION['msg'] = "Preencha os campos corretamente!";
        }
        $this->router->redirect("pag.getUpdateItem", ["id_item" => $request['id_item']]);
    }

}
