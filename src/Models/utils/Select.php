<?php

namespace Src\Models\utils;

use FFI\Exception;
use PDO;
class Select extends Connection {
 
    private $links;
    private $query;

    public function select($query,  $links = null){
        $this->query = $query;  
        
        if(!empty($links)) {
            parse_str($links, $this->links);
        }
                
        $this->query = parent::getConn()->prepare($this->query);

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
            return $this->query->fetchAll();
        
        }catch(Exception $e){
            echo 'Erro: '.$e->getMessage();
        }
    }
  
}