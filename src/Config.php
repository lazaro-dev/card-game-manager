<?php

//URL DO PROJETO
define('URL','http://localhost:83/CursoPHP(MVC)/multimidia');

function url(string $uri = null):string
{
    if($uri){
        return URL . '/'. $uri;
    }
    
    return URL;    
}