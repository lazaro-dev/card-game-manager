<?php

namespace Src\Models;

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

        $colunas = $table->select("SELECT jogos.id id_jogo, tab_jogos.tipo_jogo_campo, jogos.tipo_jogo_valor, tab_jogos.nome_carta_campo, 
                                          tab_jogos.nome_jogo_carta_campo
                                    FROM jogos
                                    INNER JOIN tab_jogos ON tab_jogos.id = jogos.tab_jogo_id
                                    WHERE usuario_id = {$user_id} LIMIT 1
                                    ");

        $aux = $table->select("SELECT jog.id_jogo id_jogo, modo_jogos.id id_modo_jogo, modo_jogos.descricao_modo
                                      
                               FROM (SELECT cartas.id id_carta, jogos.id id_jogo
                                     FROM jogos 
                                     INNER JOIN cartas ON cartas.jogo_id = jogos.id
                                     WHERE usuario_id = {$user_id} LIMIT 1) jog                               
                               INNER JOIN carta_modos ON carta_modos.carta_id = jog.id_carta
                               RIGHT JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id                               
                               ORDER BY modo_jogos.id ASC");

        $colunas[0]['tipos_col'] = $aux;         

        foreach ($cartas as $i => $carta) {
            $cartas[$i]['tipos_jogos'] = $table->select("SELECT modo_item_cartas.carta_modo_id, carta_modos.modo_jogo_id, 
                                                   GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1) ORDER BY modo_item_cartas.id) AS string_camp
                                            FROM carta_modos
                                            LEFT JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id 
                                            LEFT JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
                                            WHERE carta_modos.carta_id = {$carta['id_carta']}
                                            GROUP BY modo_item_cartas.carta_modo_id,carta_modos.modo_jogo_id
                                            ORDER BY carta_modos.modo_jogo_id ASC");
                    
            foreach ($cartas[$i]['tipos_jogos'] as $j => $modo) {
                $cartas[$i]['tipos_jogos'][$j]['string_camp'] = str_replace(",","",$modo['string_camp']);                                
            }
        }
        
        $tabela = [
            'colunas' => $colunas,
            'cartas' => $cartas
        ];        

        // var_dump($tabela);
        // die;
        return $tabela;
    }

}