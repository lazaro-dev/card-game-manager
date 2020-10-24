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
        // $users = $model->getInsertUser();
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
}
