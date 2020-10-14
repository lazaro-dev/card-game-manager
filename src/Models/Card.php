<?php

namespace Src\Models;

// use Src\Models\utils\Create;
use Src\Models\utils\Select;
use Src\Models\utils\Update;

class Card {

    public function getCamposInserirCart($request=null)
    {
        $model = new Select();
        $modos['carta_nome'] = $model->select("SELECT nome_carta_campo, nome_jogo_carta_campo FROM jogos WHERE usuario_id = {$_SESSION['user_id']}");
        $modos['modos'] = $model->select("SELECT id, descricao_modo FROM modo_jogos ORDER BY id ASC");

        foreach ($modos['modos'] as $key => $modo) {
            $modos['modos'][$key]['atributos'] = $model->select("SELECT items.id id_item, items.descricao descricao_item,
                                                                        (SELECT SUBSTRING(descricao, 2, 20)  FROM atributo_items LIMIT 1) descricao_atributo
                                                                 FROM  items
                                                                ");
        }
        return $modos;
    }

    public function getCamposInserirCart1($request=null)
    {
        $model = new Select();
        $carta['carta_campos'] = $model->select("SELECT nome_carta_campo, nome_jogo_carta_campo 
                                                 FROM jogos WHERE usuario_id = {$_SESSION['user_id']}")[0];              
        return $carta;
    }

    public function inserirCart1($request=null)
    {
        
    }
    
    public function getUpdateCardPart1(int $request)
    {
        $model = new Select();
        $carta['carta_campos'] = $model->select("SELECT nome_carta_campo, nome_jogo_carta_campo 
                                                 FROM jogos WHERE usuario_id = {$_SESSION['user_id']}")[0];        

$carta['card_info'] = $model->select("SELECT id id_carta, nome_valor nome_carta_valor, nome_jogo_carta_valor 
                                              FROM cartas WHERE id = {$request}")[0];        
        return $carta;
    }
    
    public function updateCardPart1($request)
    {
        $model = new Update();        
        if($model->update("cartas", $request, "WHERE id = :id", "id={$request['id']}"))
        return true;
        else
        return false;
    }
    
    public function getUpdateCardModos(int $request)
    {   
        $model = new Select();
        $modos = $model->select("SELECT modo_jogos.id id_modo_jogo, modo_jogos.descricao_modo                                                                                                                                                          
                                                FROM carta_modos
                                                INNER JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id                               
                                                WHERE carta_modos.carta_id = {$request}
                                                ORDER BY modo_jogos.id ASC"); 
        
        foreach ($modos as $i => $modo) {            
            $modos[$i]['items'] = $model->select("SELECT carta_modos.modo_jogo_id, items.descricao item_desc, 
                                                                        (CASE WHEN atributo_items.descricao = 'ZNão se aplica' THEN 'Não se aplica'
                                                                         ELSE atributo_items.descricao
                                                                         END) atr_desc
                                                                    FROM carta_modos
                                                                    INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id
                                                                    INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
                                                                    INNER JOIN items ON atributo_items.item_id = items.id 
                                                                    WHERE carta_modos.modo_jogo_id = {$modo['id_modo_jogo']}
                                                    ");                       
        }   
        // var_dump($modos);
        // die;    
        return $modos;
    }

    public function getUpdateCardModo(int $id_card, int $id_modo)
    {
        // var_dump($id_card, $id_modo);
        // die;
    }
}