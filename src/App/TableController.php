<?php

namespace Src\App;

use League\Plates\Engine;

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
        $teste = ['Irineu', 'Fulano'];
        echo $this->view->render("home", ["nomes" => $teste]);
    }
}
