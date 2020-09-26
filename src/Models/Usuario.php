<?php

namespace Src\Models;

use Src\Models\utils\Create;
use Src\Models\utils\Read;

class Usuario {
    
    public function getUsuarios()
    {
        $model = new Read();
        $model->read("SELECT * FROM usuarios");
        $user = $model->getResult();


        return $model->getResult();
    }
}