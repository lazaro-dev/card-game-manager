<?php

namespace Src\Models;

// use Src\Models\utils\Create;
use Src\Models\utils\Select;

class Usuario {
    
    public function getTable(int $user_id)
    {
        $table = new Select();
        $teste = $table->select("SELECT jogos.id id_jogo, jogos.tipo_jogo_campo, jogos.tipo_jogo_valor, jogos.usuario_id,
                                        jogos.created_at cre_jogo, jogos.updated_at up_jogo, 
                                        cartas.id id_carta, cartas.nome_campo, cartas.nome_valor, cartas.nome_jogo_carta_campo,
                                        cartas.nome_jogo_carta_valor, cartas.jogo_id, cartas.created_at cre_carta, cartas.updated_at up_carta
                                    FROM jogos 
                                    INNER JOIN cartas ON cartas.jogo_id = jogos.id                                    
                                    WHERE jogos.usuario_id = {$user_id}");
                                

        $teste2 = $table->select("SELECT carta_modos.* FROM cartas                                   
                                    INNER JOIN carta_modos ON carta_modos.carta_id = cartas.id
                                    WHERE cartas.id = 1");
        var_dump($teste);
        die;

        return null;
    }

    public function getUsuarios()
    {
        $model = new Select();
            
        return $model->select("SELECT * FROM usuarios");
    }
}