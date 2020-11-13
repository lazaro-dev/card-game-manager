<?php

namespace Src\Models;

use Src\Models\utils\Delete;
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
        // $sel = new Select();
        // $jogo = $sel->select("SELECT * FROM jogos WHERE usuario_id = {$_SESSION['user_id']}");
        
        // if($jogo==null){         
            $ins = new Insert();
            $temp['tipo_jogo_valor'] = $request['tipo_jogo_valor'];      
            $temp['usuario_id'] = $_SESSION['user_id'];             
            $temp['tab_jogo_id'] = "1";             
            $temp['created_at'] = date('Y-m-d H:i:s');          
            $var = $ins->insert("jogos", $temp);

            return $var;
        // }else{
        //     return false;
        // }
    }

    public function getUpdateJogos(int $user_id)
    {
        $sel = new Select();
        $jogos = $sel->select("SELECT jogos.id jogo_id, jogos.tipo_jogo_valor 
                                                    FROM jogos 
                                                    INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id 
                                                    WHERE jogos.usuario_id = {$user_id}");
        return $jogos;                                                    
    }
    
    public function getUpdateJogo(int $id_jogo)
    {
        $sel = new Select();
        $jogo['campos'] = $this->getInsertJogo();
        $jogo['valor'] = $sel->select("SELECT * FROM jogos WHERE usuario_id = {$_SESSION['user_id']} AND id = {$id_jogo}")[0];
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

    public function getDeleteJogo(int $id_user)
    {
        $sel= new Select();
        $jogos = $sel->select("SELECT id, tipo_jogo_valor FROM jogos WHERE usuario_id = {$id_user}");       
        return $jogos;
    }

    public function deleteJogo(int $id_jogo)
    {
        $del = new Delete();
        $var = $del->delete("jogos", "WHERE id =:id AND usuario_id = :id_user", "id={$id_jogo}&id_user={$_SESSION['user_id']}");
        return $var;
    }
}