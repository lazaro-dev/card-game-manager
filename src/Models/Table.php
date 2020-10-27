<?php

namespace Src\Models;

use Exception;
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
        $modos = $sel->select("SELECT id, descricao_modo FROM modo_jogos");       
        return $modos;
    }

    public function getUpdateModo(int $id_modo)
    {
        $sel = new Select();
        $modo = $sel->select("SELECT descricao_modo FROM modo_jogos WHERE id = {$id_modo}")[0];
        return $modo;      
    }

    public function updateModo($request)
    {
        $temp['updated_at'] = date('Y-m-d H:i:s'); 
        $temp['descricao_modo'] = $request['descricao_modo']; 
        $up = new Update();
        $var = $up->update("modo_jogos", $temp, "WHERE id = :id", "id={$request['id_modo']}");
        return $var;    
    }
    
    public function getUpdateItems()
    {
        $sel = new Select();        
        $items = $sel->select("SELECT id, descricao FROM items");  
        return $items;
    }
    
    public function getUpdateItem(int $id_item)
    {
        $sel = new Select();
        $aux = $sel->select("SELECT descricao FROM items WHERE id = {$id_item}")[0];
        $atributos['nome_item'] = $aux['descricao'];
        $atributos['atributos'] = $sel->select("SELECT id, descricao FROM atributo_items WHERE item_id = {$id_item} AND descricao <> 'ZNão se aplica'");
        return $atributos;
    }

    public function updateItem($request)
    {
        $up = new Update();
        $temp['updated_at'] = date('Y-m-d H:i:s'); 
        try{    
            foreach ($request as $key => $value) {
                if($key!='id_item'){
                    $temp['descricao'] = $value;
                    $var = $up->update("atributo_items", $temp, "WHERE id = :id", "id={$key}");
                    }
                }
        }catch(Exception $e){
            return false;
        }  
        return true;    
    }

}