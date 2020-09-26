<?php

namespace Src\App;

// use App\adms\Controllers\Login;
use League\Plates\Engine;

class AdminController 
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../../resources/views",'php');
    }
    
    public function home():void
    {        
                
        echo $this->view->render("user-dash");
    }
    

}
