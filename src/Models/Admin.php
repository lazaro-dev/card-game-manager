<?php

namespace Src\Models;

use Exception;
use Src\Models\utils\Delete;
use Src\Models\utils\Insert;
use Src\Models\utils\Select;
use Src\Models\utils\Update;

class Admin {
    
    public function getUsers()
    {
        $sel = new Select();
        $users = $sel->select("SELECT id, usuario FROM usuarios WHERE tipo_usuario = 2");       
        return $users;
    }
    
    public function insertUser($request)
    {
        try {
            $request['senha'] = password_hash($request['senha'], PASSWORD_DEFAULT);
            $request['tipo_usuario'] = 2;
            $ins = new Insert();
            $val = $ins->insert("usuarios", $request);
            return $val;
        } catch (Exception $th) {
            return false;
        }                
    }

    public function insertUserVal($request)
    {
        $sel = new Select();
        $user = $sel->select("SELECT id, usuario FROM usuarios WHERE usuario = '{$request['usuario']}'");        
        if($user)
            return false;
        else
            return true;        
    }

    public function getUser(int $id_user)
    {
        $sel = new Select();
        $user = $sel->select("SELECT id, usuario FROM usuarios WHERE id = {$id_user}")[0];
        return $user;
    }

    public function updateUser($request)
    {
        $up = new Update();
        $temp['usuario'] = $request['usuario'];
        $temp['senha'] = password_hash($request['senha'], PASSWORD_DEFAULT);
        $var = $up->update("usuarios", $temp, "WHERE id = :id", "id={$request['id_user']}");
        return $var;
    }

    public function deleteUser(int $id_user)
    {
        $del = new Delete();
        return $del->delete("usuarios", "WHERE id =:id", "id={$id_user}");
    }

    public function valPass(int $id_user ,string $senha)
    {                
        $sel = new Select();
        $user = $sel->select("SELECT senha FROM usuarios WHERE id = :id", "id={$id_user}")[0];
        if(isset($user)&&password_verify($senha ,$user['senha'])){
            return true;
        }else{
            return false;
        }                        
    }
}