<?php

namespace Src\Models\utils;

use Exception;

class Delete extends Connection
{
    private $tabela;
    private $termos;
    private $values;
    private $query;

    public function delete($tabela, $termos, $ParseString)
    {
        $this->tabela = (string) $tabela;
        $this->termos = (string) $termos;
        parse_str($ParseString, $this->values);

        $this->query = "DELETE FROM {$this->tabela} {$this->termos}";
        $this->query = parent::getConn()->prepare($this->query);

        try {            
            $this->query->execute($this->values);   
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

}
