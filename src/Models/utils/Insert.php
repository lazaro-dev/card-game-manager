<?php

namespace Src\Models\utils;

use Exception;

class Insert extends Connection{

    private $tabela;
    private $dados;
    private $query;
    private $conn;

    public function insert($tabela, array $dados){
        
        $this->tabela = (string) $tabela;
        $this->dados = $dados;

        $colunas = implode(', ',array_keys($this->dados));        
        $valores = ':'.implode(', :', array_keys($this->dados));
        
        $this->query= "INSERT INTO {$this->tabela} ({$colunas}) VALUES ({$valores})";
        
        $this->query = parent::getConn()->prepare($this->query);
        
        try{
            $this->query->execute($this->dados);
            return $this->conn->lastInsertId();
        }catch(Exception $e){
            return $this->resultado = null;
        }
    }
    
}