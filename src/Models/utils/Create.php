<?php

namespace Src\Models\utils;

use Exception;

if(!defined('URL')){
    header("Location: /");
    exit();
}

class Create extends Conn{

    private $tabela;
    private $dados;
    private $resultado;
    private $query;
    private $conn;

    public function getResultado(){
        return $this->resultado;
    }

    public function exeCreate($tabela,array $dados){
        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->getIntrucao();
        $this->executarInstrucao();
    }

    private function getIntrucao(){
        $colunas = implode(', ',array_keys($this->dados));
        //echo $colunas;
        $valores = ':'.implode(', :', array_keys($this->dados));
        //echo $valores;
        $this->query= "INSERT INTO {$this->tabela} ({$colunas}) VALUES ({$valores})";

    }

    private function executarInstrucao(){
        $this->conexao();
        try{
            $this->query->execute($this->dados);
            $this->resultado = $this->conn->lastInsertId();
        }catch(Exception $e){
            $this->resultado = null;
        }
    }
    private function conexao(){
        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->query);
    }
}