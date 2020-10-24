<?php

namespace Src\Models;

// use Src\Models\utils\Create;
use Src\Models\utils\Select;

class Admin {
    
    public function getUsers()
    {
        $sel = new Select();
        $users = $sel->select("SELECT id, usuario FROM usuarios WHERE tipo_usuario = 2");
        // var_dump($users);
        // die;
        return $users;
    }

}