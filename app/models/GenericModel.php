<?php

namespace app\models;

use app\core\Model;

class GenericModel extends Model
{
    public function verificacaoInicial()
    {
        if( $this->obterTotalRegistros("tbusuarios",NULL, NULL, NULL, NULL) <= 0 ||
            $this->obterTotalRegistros("tbempresa", NULL, NULL, NULL, NULL, NULL) <= 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    public function salvarRegistro($tabela,$dados)
    {
        return $this->inserirRegistro($tabela,$dados);
    }
}
