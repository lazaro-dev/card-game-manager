<?php

namespace Src\App;

class ErroController{
    public function error($errcode)
    {
        echo '<div>'.$errcode.'</div>';
    }
}