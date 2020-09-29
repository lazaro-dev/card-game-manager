<?php

namespace Src\Models\utils;

use Exception;

class Update extends Connection
{

    private $tabela;
    private $dados;
    private $query;
    private $termos;
    private $values;

    public function update($tabela, array $dados, $termos = null, $ParseString = null)
    {
        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->termos = (string) $termos;

        parse_str($ParseString, $this->values);
        
        foreach ($this->dados as $key => $Value) {
            $values[] = $key . '= :' . $key;
        }
        $values = implode(', ', $values);
        $this->query = "UPDATE {$this->tabela} SET {$values} {$this->termos}";

        $this->query = parent::getConn()->prepare($this->query);
        try {
            $this->query->execute(array_merge($this->dados, $this->values));
            return true;
        } catch (Exception $ex) {
            return null;
        }
    }    

}
