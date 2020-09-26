<?php

namespace Src\Models\utils;

use FFI\Exception;
use PDO;

class Conn{
    public static $host    = HOST;
    public static $user    = USER;
    public static $pass    = PASS;
    public static $dbname  = DBNAME;
    public static $connect = null;
    
    private static function conectar(){
        try{
            if(self::$connect==null){
                self::$connect = new PDO('mysql:host='.
                self::$host.';dbname='.self::$dbname,
                self::$user,self::$pass);
            }
        }catch(Exception $e){
            echo 'Erro: '.$e->getMessage();
            die;
        }
        return self::$connect;
    }

    public function getConn(){
        return self::conectar();
    }

    public static function dd(...$variavel)
    {
        var_dump($variavel);
        die;
    }
}
