<?php

namespace Src\Models;

// use Src\Models\utils\Create;
use Src\Models\utils\Select;

class Usuario {
    
    public function getTable(int $user_id)
    {
        $table = new Select();
        $linhas = $table->select("SELECT  cart.id id_carta, cart.nome_valor, cart.nome_jogo_carta_valor, cart.jogo_id                                            
                                  FROM jogos 
                                  INNER JOIN cartas cart ON cart.jogo_id = jogos.id                                                           
                                  WHERE jogos.usuario_id = {$user_id}                                                        
                                    ");                                        

        $aux = $table->select("SELECT jogos.id id_jogo, modo_jogos.id id_modo_jogo, modo_jogos.descricao_modo
                               FROM jogos
                               INNER JOIN cartas ON cartas.jogo_id = jogos.id
                               INNER JOIN modo_jogos ON cartas.jogo_id = jogos.id
                               WHERE jogos.usuario_id = {$user_id}
                               ORDER BY modo_jogos.id ASC");
                               
        $colunas = $table->select("SELECT jogos.id id_jogo, jogos.tipo_jogo_campo, jogos.tipo_jogo_valor, jogos.nome_carta_campo, 
                                          jogos.nome_jogo_carta_campo
                                    FROM jogos
                                    INNER JOIN cartas ON cartas.jogo_id = jogos.id
                                    INNER JOIN modo_jogos ON cartas.jogo_id = jogos.id
                                    WHERE jogos.usuario_id = {$user_id} LIMIT 1
                                    GROUP BY jogos.id");


        $colunas[0]['tipos_col'] = $aux; 

        

        $modos_jogo_linha = $table->select("SELECT modo_item_cartas.carta_modo_id, carta_modos.modo_jogo_id, 
                                       GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1) ORDER BY modo_item_cartas.id) AS string_camp
                                FROM carta_modos 
                                INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id
                                INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id                                    
                                WHERE carta_modos.carta_id = 1
                                GROUP BY modo_item_cartas.carta_modo_id,carta_modos.modo_jogo_id 
                                ORDER BY modo_item_cartas.carta_modo_id ASC                            
                                "
                                );
        foreach ($modos_jogo_linha as $key => $modo) {
            $modos_jogo_linha[$key]['string_camp'] = str_replace(",","",$modo['string_camp']);                                
        }
        
        // var_dump($modos_jogo_linha);
        // die;
        $linhas['tipos_jogos'] = $modos_jogo_linha;
        
        $tabela = [
            'colunas' => $colunas,
            'linhas' => $linhas
        ];

        var_dump($tabela);
        die;

        return $tabela;
    }

    public function getUsuarios()
    {
        $model = new Select();
            
        return $model->select("SELECT * FROM usuarios");
    }
}

// SELECT carta_modos.modo_jogo_id, modo_jogos.descricao_modo, GROUP_CONCAT(atributo_items.descricao, 1, 1) AS string_camp
// FROM carta_modos 
// INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id
// INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
// INNER JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id
// WHERE carta_modos.carta_id = 1
// GROUP BY carta_modos.modo_jogo_id
// ORDER BY modo_item_cartas.id ASC

// SELECT carta_modos.modo_jogo_id, modo_jogos.descricao_modo, GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1)) AS string_camp
//                                     FROM carta_modos 
//                                     INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = carta_modos.id
//                                     INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
//                                     INNER JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id
//                                     WHERE carta_modos.carta_id = 1
//                                     GROUP BY carta_modos.modo_jogo_id
//                                     ORDER BY modo_item_cartas.id ASC

// --jogos.id id_jogo, jogos.tipo_jogo_campo, jogos.tipo_jogo_valor, jogos.usuario_id,
// --jogos.created_at cre_jogo, jogos.updated_at up_jogo, 
// $teste = $table->select("SELECT jogos.id id_jogo, jogos.tipo_jogo_campo, jogos.tipo_jogo_valor, jogos.usuario_id,
//                                         jogos.created_at cre_jogo, jogos.updated_at up_jogo, 
//                                         cartas.id id_carta, cartas.nome_campo, cartas.nome_valor, cartas.nome_jogo_carta_campo,
//                                         cartas.nome_jogo_carta_valor, cartas.jogo_id, cartas.created_at cre_carta, cartas.updated_at up_carta
//                                     FROM jogos 
//                                     INNER JOIN cartas ON cartas.jogo_id = jogos.id                                    
//                                     WHERE jogos.usuario_id = {$user_id}");

// $teste2 = $table->select(" SELECT modos.id_carta_modo, modo_jogos.descricao_modo, SUBSTRING(atributo_items.descricao, 1, 1) letra
// FROM 
//     (SELECT carta_modos.id id_carta_modo, carta_modos.modo_jogo_id
//     FROM cartas                                   
//     INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id
//     -- INNER JOIN modo_jogos ON modo_jogos.id = carta_modos.modo_jogo_id
//     WHERE cartas.id = {$teste[0]['id_carta']}) modos                                        
// INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = modos.id_carta_modo
// INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
// INNER JOIN modo_jogos ON modo_jogos.id = modos.modo_jogo_id
// ");


// $teste = $table->select("SELECT cartas_temp.id_jogo, cartas_temp.tipo_jogo_campo, cartas_temp.tipo_jogo_valor, cartas_temp.usuario_id,
//                                         cartas_temp.cre_jogo, cartas_temp.up_jogo, 
//                                         cartas_temp.id_carta, cartas_temp.nome_campo, cartas_temp.nome_valor, cartas_temp.nome_jogo_carta_campo,
//                                         cartas_temp.nome_jogo_carta_valor, cartas_temp.jogo_id, cartas_temp.cre_carta, cartas_temp.up_carta
//                                     FROM 
//                                         (SELECT jogos.id id_jogo, jogos.tipo_jogo_campo, jogos.tipo_jogo_valor, jogos.usuario_id,
//                                                 jogos.created_at cre_jogo, jogos.updated_at up_jogo, 
//                                                 cartas.id id_carta, cartas.nome_campo, cartas.nome_valor, cartas.nome_jogo_carta_campo,
//                                                 cartas.nome_jogo_carta_valor, cartas.jogo_id, cartas.created_at cre_carta, cartas.updated_at up_carta
//                                         FROM jogos 
//                                         INNER JOIN cartas ON cartas.jogo_id = jogos.id                             
//                                         WHERE jogos.usuario_id = {$user_id}) cartas_temp
//                                     INNER JOIN carta_modos ON carta_modos.carta_id = cartas_temp.id_carta
//                                     INNER JOIN 
                                    
//                                     ");







/* $teste2 = $table->select("SELECT tabela1.id_carta_modo, tabela1.descricao_modo,
                                         INSERT(
                                                (SELECT CAST(atributo_items.descricao AS VARCHAR(10)) + ';' AS [text()]
                                                                        FROM 
                                                                            (SELECT carta_modos.id id_carta_modo, carta_modos.modo_jogo_id
                                                                                FROM cartas                                   
                                                                                INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id                                                                    
                                                                                WHERE cartas.id = {$teste[0]['id_carta']}) modos                                        
                                                                                INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = modos.id_carta_modo
                                                                                INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
                                                                                INNER JOIN modo_jogos ON modo_jogos.id = modos.modo_jogo_id) tabela2 
                                                                        WHERE tabela1.id_carta_modo = tabela2.id_carta_modo
                                                                        FOR XML PATH(''), TYPE).value('.[1]', 'VARCHAR(MAX)'), '') as concatenada
                                                                        
                                    FROM (SELECT modos.id_carta_modo, modo_jogos.descricao_modo, SUBSTRING(atributo_items.descricao, 1, 1) letra
                                                                FROM 
                                                                    (SELECT carta_modos.id id_carta_modo, carta_modos.modo_jogo_id
                                                                    FROM cartas                                   
                                                                    INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id                                                                    
                                                                    WHERE cartas.id = {$teste[0]['id_carta']}) modos                                        
                                                                INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = modos.id_carta_modo
                                                                INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
                                                                INNER JOIN modo_jogos ON modo_jogos.id = modos.modo_jogo_id) tabela1 */


            //                                 $teste2 = $table->select("SELECT modos.id_carta_modo, modo_jogos.descricao_modo, GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1)) AS letra
            //                                 FROM 
            //                                     (SELECT carta_modos.id id_carta_modo, carta_modos.modo_jogo_id
            //                                     FROM cartas                                   
            //                                     INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id                                                                    
            //                                     WHERE cartas.id = {$teste[0]['id_carta']}) modos                                        
            //                                 INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = modos.id_carta_modo
            //                                 INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
            //                                 INNER JOIN modo_jogos ON modo_jogos.id = modos.modo_jogo_id
            //     -- GROUP BY tabela1.id_carta_modo,tabela1.descricao_modo
            // ");

            // $teste2 = $table->select("SELECT modos.id_cart, modos.id_carta_modo, modo_jogos.descricao_modo, GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1)) AS letra
        // FROM 
        //     (SELECT cartas.id id_cart, carta_modos.id id_carta_modo, carta_modos.modo_jogo_id
        //     FROM cartas                                   
        //     INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id                                                                    
        //     ) modos                                        
        // INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = modos.id_carta_modo
        // INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
        // INNER JOIN modo_jogos ON modo_jogos.id = modos.modo_jogo_id 
        //                         ");


        // SELECT  cart.id id_carta, cart.nome_valor, cart.nome_jogo_carta_valor, cart.jogo_id,
        //                                     tabela.id_cart, tabela.id_carta_modo, tabela.descricao_modo, tabela.letra
        //                           FROM jogos 
        //                           INNER JOIN cartas cart ON cart.jogo_id = jogos.id                             
        //                           INNER JOIN (SELECT modos.id_cart, modos.id_carta_modo, modo_jogos.descricao_modo, GROUP_CONCAT(SUBSTRING(atributo_items.descricao, 1, 1)) AS letra
        //                                       FROM 
        //                                             (SELECT cartas.id id_cart, carta_modos.id id_carta_modo, carta_modos.modo_jogo_id
        //                                             FROM cartas                                   
        //                                             INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id    
        //                                             ORDER BY carta_modos.modo_jogo_id ASC                                                                                                                              
        //                                             ) modos                                        
        //                                       INNER JOIN modo_item_cartas ON modo_item_cartas.carta_modo_id = modos.id_carta_modo
        //                                       INNER JOIN atributo_items ON modo_item_cartas.atributo_item_id = atributo_items.id
        //                                       INNER JOIN modo_jogos ON modo_jogos.id = modos.modo_jogo_id) tabela ON tabela.id_cart = cart.id
        //                           WHERE jogos.usuario_id = {$user_id}  