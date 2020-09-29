<?php

namespace Src\Models;

use Src\Models\utils\Select;

class Login {
    
    private $user;

    public function valLogin($request)
    {
        $mLog = new Select();
        $mLog->read("SELECT * FROM usuarios WHERE usuario = :user", "user={$request['usuario']}");
        $this->user = $mLog->getResult();
        // var_dump($this->user);
        // die;
        if(isset($this->user[0]['senha'])&&password_verify($request['senha'],$this->user[0]['senha'])){
            $this->sessao();
            return true;
        }else{                    
            if(!empty($this->user)){
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Senha ou usuario invalido!</div>";
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            }
        }
        return false;
    }        

    public function sessao()
    {
        $_SESSION['user_id'] = $this->user[0]['id'];
        $_SESSION['user'] = $this->user[0]['usuario'];
        $_SESSION['user_acesso'] = $this->user[0]['tipo_usuario'];
    }
}