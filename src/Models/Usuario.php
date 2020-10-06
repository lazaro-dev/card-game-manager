<?php

namespace Src\Models;

// use Src\Models\utils\Create;
use Src\Models\utils\Select;

class Usuario {
    
    public function getTable(int $user_id)
    {
        $table = new Select();
        $cartas = $table->select("SELECT  cart.id id_carta, cart.nome_valor, cart.nome_jogo_carta_valor, cart.jogo_id                                            
                                  FROM jogos 
                                  INNER JOIN cartas cart ON cart.jogo_id = jogos.id                                                           
                                  WHERE jogos.usuario_id = {$user_id}                                                        
                                 ");                                        

        $colunas = $table->select("SELECT id id_jogo, tipo_jogo_campo, tipo_jogo_valor, nome_carta_campo, 
                                          nome_jogo_carta_campo
                                    FROM jogos                                                                                                            
                                    WHERE usuario_id = {$user_id} LIMIT 1
                                    ");

        $aux = $table->select("SELECT jog.id_jogo id_jogo, modo_jogos.id id_modo_jogo, modo_jogos.descricao_modo
                                      
                               FROM (SELECT cartas.id id_carta, jogos.id id_jogo
                                     FROM jogos 
                                     INNER JOIN cartas ON cartas.jogo_id = jogos.id
                                     WHERE usuario_id = {$user_id} LIMIT 1) jog                               
                               INNER JOIN carta_modos ON carta_modos.carta_id = jog.id_carta
                               INNER JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id                               
                               ORDER BY modo_jogos.id ASC");

        $colunas[0]['tipos_col'] = $aux;         

        foreach ($cartas as $i => $carta) {
            $cartas[$i]['tipos_jogos'] = $table->select("SELECT modo_item_cartas.carta_modo_id, carta_modos.modo_jogo_id, 
                                                   GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1) ORDER BY modo_item_cartas.id) AS string_camp
                                            FROM carta_modos
                                            INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id
                                            INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
                                            WHERE carta_modos.carta_id = {$carta['id_carta']}
                                            GROUP BY modo_item_cartas.carta_modo_id,carta_modos.modo_jogo_id
                                            ORDER BY modo_item_cartas.carta_modo_id ASC");
            
            // var_dump($modos_jogo_linha[$i]);
            // die;
            foreach ($cartas[$i]['tipos_jogos'] as $j => $modo) {
                $cartas[$i]['tipos_jogos'][$j]['string_camp'] = str_replace(",","",$modo['string_camp']);                                
            }
        }
        
        if(!empty($modos_jogo_linha[$i]) && count($modos_jogo_linha[$i]) < count($colunas[0]['tipos_col']) ) {
            
            // $modos_jogo_linha[$i]
            // var_dump(count($modos_jogo_linha[$i]) , count($colunas[0]['tipos_col']) );
            // die;
        }
        
        // $cartas['tipos_jogos'] = $modos_jogo_linha;
        
        $tabela = [
            'colunas' => $colunas,
            'cartas' => $cartas
        ];        

        // var_dump($tabela);
        // die;
        return $tabela;
    }

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
        // var_dump($modos);
        // die;
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
}