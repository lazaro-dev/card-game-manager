<?php

namespace Src\Models;

use Src\Models\utils\Insert;
use Src\Models\utils\Select;
use Src\Models\utils\Update;

class Table {
    
    public function getUpdateTable()
    {
        $sel = new Select();
        $tab = $sel->select("SELECT * FROM tab_jogos WHERE id = 1")[0];        
        return $tab;
    }

    public function updateTable($request)
    {
        $up = new Update();
        $var = $up->update("tab_jogos", $request, "WHERE id = :id", "id=1");
        return $var;
    }

    public function getUpdateModos()
    {
        $sel = new Select();
        $modos = $sel->select("SELECT * FROM tab_jogos WHERE id = 1")[0];
        return $modos;
    }
}