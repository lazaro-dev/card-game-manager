<?php

namespace Src\App;

class ErroController{
    public function error($errcode)
    {
        var_dump($errcode);
    }
}