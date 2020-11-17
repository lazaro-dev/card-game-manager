<?php
session_start();
ob_start();

//URL DO PROJETO
define('URL','http://localhost:8080/multimidia');

function url(string $uri = null):string
{
    if($uri){
        return URL . '/'. $uri;
    }
        
    return URL;
}

//Configurações de banco
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DBNAME','web_multi');