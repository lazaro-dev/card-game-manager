<?php

namespace Src\Models;

use Src\Models\utils\Create;
use Src\Models\utils\Select;

class Usuario {
    
    public function getUsuarios()
    {
        $model = new Select();
            
        return $model->select("SELECT * FROM usuarios");
    }
}