<?php

namespace Src\Models;

use Src\Models\utils\Create;
use Src\Models\utils\Select;

class Usuario {
    
    public function getUsuarios()
    {
        $model = new Select();
        $model->read("SELECT * FROM usuarios");        

        return $model->getResult();
    }
}