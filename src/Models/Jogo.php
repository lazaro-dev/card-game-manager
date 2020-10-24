<?php

namespace Src\Models;

use Src\Models\utils\Insert;
use Src\Models\utils\Select;
use Src\Models\utils\Update;

class Jogo {
    
    public function getInsertJogo()
    {
        $sel = new Select();
        $jogo = $sel->select("SELECT id ,tipo_jogo_campo FROM tab_jogos LIMIT 1")[0];        
        return $jogo;
    }
    public function insertJogo($request)
    {
        $sel = new Select();
        $jogo = $sel->select("SELECT * FROM jogos WHERE usuario_id = {$_SESSION['user_id']}");
        
        if($jogo==null){         
            $ins = new Insert();
            $temp['tipo_jogo_valor'] = $request['tipo_jogo_valor'];      
            $temp['usuario_id'] = $_SESSION['user_id'];             
            $temp['tab_jogo_id'] = "1";             
            $temp['created_at'] = date('Y-m-d H:i:s');          
            $var = $ins->insert("jogos", $temp);

            return $var;
        }else{
            return false;
        }
    }
    
    public function getUpdateJogo()
    {
        $sel = new Select();
        $jogo['campos'] = $this->getInsertJogo();
        $jogo['valor'] = $sel->select("SELECT * FROM jogos WHERE usuario_id = {$_SESSION['user_id']}")[0];
        return $jogo;
    }
    
    public function updateJogo($request)
    {
        
        $temp['tipo_jogo_valor'] = $request['tipo_jogo_valor'];
        $temp['updated_at'] = date('Y-m-d H:i:s');        
        
        $up = new Update();
        if($up->update("jogos", $temp, "WHERE id = :id", "id={$request['id_jogo']}"))
            return true;
        else
            return false;        
    }
}