<?php

namespace Src\Models;

use Exception;
use Src\Models\utils\Delete;
use Src\Models\utils\Insert;
use Src\Models\utils\Select;
use Src\Models\utils\Update;

class Card {

    public function getCamposInserirCart()
    {
        $model = new Select();
        $modos['carta_nome'] = $model->select("SELECT tab_jogos.nome_carta_campo, tab_jogos.nome_jogo_carta_campo 
                                                FROM jogos 
                                                INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id
                                                WHERE jogos.usuario_id = {$_SESSION['user_id']}");

        $modos['modos'] = $model->select("SELECT id, descricao_modo FROM modo_jogos ORDER BY id ASC");

        foreach ($modos['modos'] as $key => $modo) {
            $modos['modos'][$key]['atributos'] = $model->select("SELECT items.id id_item, items.descricao descricao_item,
                                                                        (SELECT SUBSTRING(descricao, 2, 20)  FROM atributo_items LIMIT 1) descricao_atributo
                                                                 FROM  items
                                                                ");
        }
        return $modos;
    }

    public function getInsertCard()
    {
        $model = new Select();
        $carta['carta_campos'] = $model->select("SELECT tab_jogos.tipo_jogo_campo, tab_jogos.nome_carta_campo,
                                                        tab_jogos.nome_jogo_carta_campo, jogos.id jogo_id
                                                 FROM jogos 
                                                 INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id
                                                 WHERE jogos.usuario_id = {$_SESSION['user_id']} LIMIT 1")[0];

        $carta['jogos'] = $model->select("SELECT jogos.id jogo_id, jogos.tipo_jogo_valor 
                                          FROM jogos 
                                          INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id 
                                          WHERE jogos.usuario_id = {$_SESSION['user_id']}");        
            // var_dump($carta);
            // die;
        return $carta;
    }

    public function inserirCard($request)
    {
        $model = new Insert();    
        $sel = new Select();
        try{

            $valida = $model->lastInsert("cartas", $request);
            if($valida!=false){
                $modos = $sel->select("SELECT id FROM modo_jogos ORDER BY id");
                if(!empty($modos)){
                    $temp['carta_id'] = $valida;          
                    foreach ($modos as $key => $modo) {          
                        $temp['modo_jogo_id'] = $modo['id'];          
                        $val = $model->insert("carta_modos", $temp);
                    }
                }
            }else{
                return false;
            }
            return $valida;  
        }catch(Exception $e){
            return false;  
        } 
    }

    public function getInsertModos(int $request)
    {    
        // $model = new Select();
        // $carta = $model->select("SELECT nome_valor, nome_jogo_carta_valor FROM cartas WHERE id = {$request}");
        // $result = [
        //     'campos' => $this->getUpdateCardModos($request),
        //     'carta' => $carta
        // ];
        // return $result;
        return $this->getUpdateCardModos($request);
    }

    public function getInsertCardModo(int $id_card, int $id_modo)
    {
        return $this->getUpdateCardModo($id_card, $id_modo);
    }
    
    public function insertCardModo($request)
    {        
        if(count($request)==2){
            return $this->insertAllDefaultModo($request['id_carta'], $request['id_modo']);
        }else{
            return $this->updateCardModo($request);
        }
    }

    public function insertAllDefaultModo(int $id_carta, int $id_modo)
    {
        $sel = new Select();
        $ins = new Insert();
        try{          
            $Carta_mod = $sel->select("SELECT carta_modos.id
                                        FROM carta_modos
                                        LEFT JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id               
                                        WHERE
                                        modo_item_cartas.carta_modo_id IS NULL AND
                                        carta_modos.carta_id = {$id_carta} AND 
                                        carta_modos.modo_jogo_id = {$id_modo}
                                        ")[0];

            $atributos =  $sel->select("SELECT atributo_items.id atributo_item_id
                                        FROM atributo_items
                                        INNER JOIN items ON items.id = atributo_items.item_id
                                        WHERE atributo_items.descricao = 'ZNão se aplica'
                                        ");
            // var_dump($Carta_mod);
            // die;
            $temp['carta_modo_id'] = $Carta_mod['id'];
            $temp['created_at'] = date('Y-m-d H:i:s'); 
            foreach ($atributos as $key => $value) {                
                $temp['atributo_item_id'] = $value['atributo_item_id'];
                $var = $ins->insert("modo_item_cartas", $temp);
            }
            
        }catch(Exception $e){
            return false;
        }   
        return true;   
    }

    public function getUpdateCardPart1(int $request)
    {
        $model = new Select();
        $carta['carta_campos'] = $model->select("SELECT tab_jogos.nome_carta_campo, tab_jogos.nome_jogo_carta_campo 
                                                 FROM jogos 
                                                 INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id
                                                 WHERE usuario_id = {$_SESSION['user_id']}")[0];

        $carta['card_info'] = $model->select("SELECT id id_carta, nome_valor nome_carta_valor, nome_jogo_carta_valor 
                                               FROM cartas WHERE id = {$request}")[0];   
        $carta['jogos'] = $model->select("SELECT jogos.id jogo_id, jogos.tipo_jogo_valor 
                                          FROM jogos 
                                          INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id 
                                          WHERE jogos.usuario_id = {$_SESSION['user_id']}");
        return $carta;
    }
    
    public function updateCardPart1($request)
    {
        foreach ($request as $key => $value) {
            if($key!='id')
                $temp[$key] = $value;
        }
                
        $model = new Update();        
        if($model->update("cartas", $temp, "WHERE id = :id", "id={$request['id']}"))
            return true;
        else
            return false;
    }
    
    public function getUpdateCardModos(int $request)
    {   
        $model = new Select();
        $modos = $model->select("SELECT modo_jogos.id id_modo_jogo, modo_jogos.descricao_modo                                                                                                                                                          
                                 FROM carta_modos
                                 RIGHT JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id                               
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
                                                  WHERE carta_modos.modo_jogo_id = {$modo['id_modo_jogo']} AND carta_modos.carta_id = {$request}
                                                    ");                       
        }

        $carta = $model->select("SELECT nome_valor, nome_jogo_carta_valor FROM cartas WHERE id = {$request}");
        $result = [
            'campos' => $modos,
            'carta' => $carta
        ];           
        return $result;
    }

    public function getUpdateCardModo(int $id_card, int $id_modo)
    {   
        $model = new Select();
        $modo['cabeca'] = $model->select("SELECT modo_jogos.id, modo_jogos.descricao_modo, cartas.nome_valor
                                 FROM modo_jogos, cartas
                                 WHERE cartas.id = {$id_card} AND modo_jogos.id = {$id_modo}
                                 ")[0]; 

        // $modo['items_campo'] = $model->select("SELECT id id_item, descricao FROM items");         
        $modo['items_campo'] = $model->select("SELECT items.id id_item, items.descricao, 
                                                        (SELECT 
                                                        GROUP_CONCAT(CASE WHEN
                                                                        EXISTS(SELECT *
                                                                                FROM modo_item_cartas 
                                                                                INNER JOIN carta_modos ON carta_modos.id = modo_item_cartas.carta_modo_id                                                                                
                                                                                WHERE 
                                                                                carta_modos.modo_jogo_id  = {$id_modo} AND carta_modos.carta_id = {$id_card} AND atributo_items.id = modo_item_cartas.atributo_item_id
                                                                                )  
                                                                     THEN (SELECT  GROUP_CONCAT(modo_item_cartas.id)
                                                                            FROM modo_item_cartas 
                                                                            INNER JOIN carta_modos ON carta_modos.id = modo_item_cartas.carta_modo_id                                                                                
                                                                            WHERE 
                                                                            carta_modos.modo_jogo_id = {$id_modo} AND carta_modos.carta_id = {$id_card} AND atributo_items.id = modo_item_cartas.atributo_item_id                                                                            
                                                                            ) 
                                                                     ELSE null
                                                                     END) id_atributo_item                                                              
                                                                    
                                                                  FROM  atributo_items
                                                                  WHERE atributo_items.item_id = items.id
                                                                  ) modo_item_carta_id
                                                FROM items
                                                ");         
        
        foreach ($modo['items_campo'] as $key => $item) {
            $modo['items_campo'][$key]['valor'] = $model->select("SELECT id id_atributo_item,
                                                                         (CASE WHEN descricao = 'ZNão se aplica' THEN 'Não se aplica'
                                                                         ELSE descricao
                                                                         END) descricao,
                                                                    (CASE WHEN
                                                                        EXISTS(SELECT * 
                                                                                FROM modo_item_cartas 
                                                                                INNER JOIN carta_modos ON carta_modos.id = modo_item_cartas.carta_modo_id                                                                                
                                                                                WHERE 
                                                                                carta_modos.modo_jogo_id = {$id_modo} AND carta_modos.carta_id = {$id_card} AND atributo_items.id = modo_item_cartas.atributo_item_id
                                                                            ) 
                                                                     THEN 'true'
                                                                     ELSE 'false'
                                                                     END) checked
                                                                  FROM  atributo_items
                                                                  WHERE atributo_items.item_id = {$item['id_item']}
                                                                ");
            // $modo['items_campo'][$key]['valor'] = $model->select("SELECT id id_atributo_item, descricao descricao_valor
            //                                                       FROM  atributo_items
            //                                                       WHERE atributo_items.item_id = {$item['id_item']}
            //                                                     ");
        }

        // $modo['valores'] = $model->select("SELECT atributo_items.item_id, modo_item_cartas.atributo_item_id
        //                             FROM modo_item_cartas 
        //                             INNER JOIN carta_modos ON carta_modos.id = modo_item_cartas.carta_modo_id
        //                             INNER JOIN atributo_items ON atributo_items.id = modo_item_cartas.atributo_item_id
        //                             WHERE modo_item_cartas.carta_modo_id = {$id_modo} AND carta_modos.carta_id = {$id_card}
        //                          "); 

        // var_dump($modo);
        // die;
        return $modo;
    }

    public function updateCardModo($request)
    {        
        // var_dump(count($request));
        // die;
        $sel = new Select();
        $teste = $sel->select("SELECT * 
                                 FROM modo_item_cartas 
                                 INNER JOIN carta_modos ON carta_modos.id = modo_item_cartas.carta_modo_id                                                                                
                                 WHERE 
                                 carta_modos.modo_jogo_id = {$request['id_modo']} AND carta_modos.carta_id = {$request['id_carta']}
                                    ");
        if(!empty($teste)) {
            $up = new Update();
            try{    
                foreach ($request as $key => $value) {
                    if($key!='id_carta' && $key!='id_modo'){
                        $temp['atributo_item_id'] = $value;
                        $var = $up->update("modo_item_cartas", $temp, "WHERE id = :id", "id={$key}");
                    }
                }
            }catch(Exception $e){
                return false;
            }        
        } else {
            $ins = new Insert();
            try{
                $Carta_mod = $sel->select("SELECT id
                                            FROM carta_modos                                             
                                            WHERE 
                                            carta_id = {$request['id_carta']} AND modo_jogo_id = {$request['id_modo']}
                                            ")[0];

                $temp['carta_modo_id'] = $Carta_mod['id'];
                foreach ($request as $key => $value) {
                    if($key!='id_carta' && $key!='id_modo'){
                        $temp['atributo_item_id'] = $value;
                        $var = $ins->insert("modo_item_cartas", $temp);
                    }
                }

                // if(count($request)<14){
                //     $this->insertAllDefaultModo($request['id_carta'], $request['id_modo']);
                // }
            }catch(Exception $e){
                return false;
            }      
        }
        return true;
    }

    public function deleteCard(int $id_carta)
    {  
        $del = new Delete();
        return $del->delete("cartas", "WHERE id =:id", "id={$id_carta}");
    }
}
