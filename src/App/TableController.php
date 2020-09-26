<?php

namespace Src\App;

use League\Plates\Engine;
use Src\Models\Usuario;

// Inserir, retirar, alterar e gerar tabela
class TableController 
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../../resources/views",'php');
    }
    
    public function home():void
    {        
        $teste = new Usuario();        
        echo $this->view->render("home", ["nomes" => $teste->getUsuarios()]);
    }
    
    
    public function login():void
    {
        echo $this->view->render("login");
    }
}
