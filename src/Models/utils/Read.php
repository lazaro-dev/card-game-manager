<?php

namespace Src\Models\utils;

use FFI\Exception;
use PDO;

if(!defined('URL')){
    header("Location: /");
    exit();
}

class Read extends Conn{
    // private $select;
    private $links;
    private $result;
    private $query;
    // private $connection;

    public function getResult(){
        return $this->result;
    }    

    public function read($query,  $links = null){
        $this->query = $query;  
        
        if(!empty($links)) {
            parse_str($links, $this->links);
        }
        
        $this->conn();
        try{
            if($this->links){
                foreach ($this->links as $link => $valor) {
                    if($link=='limit'||$link == 'offset'){
                        $valor = (int)$valor; 
                    }                
    
                    if(is_int($valor))
                        $param = PDO::PARAM_INT;
                    elseif(is_bool($valor))
                        $param = PDO::PARAM_BOOL;
                    elseif(is_null($valor))
                        $param = PDO::PARAM_NULL;
                    elseif(is_string($valor))
                        $param = PDO::PARAM_STR;
                    else
                        $param = FALSE;
                       
                    if($param)
                        $this->query->bindValue(":{$link}",$valor,$param);                        
                } 
            }
           
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        
        }catch(Exception $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    private function conn(){
        $this->query = parent::getConn()->prepare($this->query);
        // $this->query = $this->connection->prepare($this->select);
        // $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }  
}