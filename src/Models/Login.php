<?php

namespace Src\Models;

use Src\Models\utils\Select;

class Login {
    
    private $user;

    public function valLogin($request)
    {
        $mLog = new Select();
        $this->user = $mLog->select("SELECT * FROM usuarios WHERE usuario = :user", "user={$request['usuario']}");
        
        if(isset($this->user[0]['senha'])&&password_verify($request['senha'],$this->user[0]['senha'])){
            $this->sessao();
            return true;
        }else{                    
            if(!empty($this->user)){
                $_SESSION['msg'] = "Senha ou usuario invalido!";
            }else{
                $_SESSION['msg'] = "Usuário não encontrado!";
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