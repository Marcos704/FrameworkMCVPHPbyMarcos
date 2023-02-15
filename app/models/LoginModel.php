<?php

namespace app\models;

use app\core\Model;
use app\packages\seguranca\Seguranca;
use app\packages\validacao\Validacao;

class LoginModel extends Model
{
    public Seguranca $seguranca;
    public Validacao $validacao;

    public function usuarioExistente($data)
    {
        if($this->obterTotalRegistros("tbusuarios","cpfUsuario", $data['cpfUsuario'], null, null)<=0)
        {
            return false;
        }else
        {
            return true;
        }
    }
    public function login($data)
    {
        $seguranca = new Seguranca();
        $dados = $this->obterRegistros("tbusuarios","cpfUsuario",$data['cpfUsuario'], null, 1, null);
        if($dados != null)
        {
            if($seguranca->descriptografar($data['senhaUsuario'],$dados[0]->senhaUsuario))
            {
                return true;
            }
        }
        return false;
    }
    public function carregarInformacoes($data)
    {
        return $this->obterRegistros("tbusuarios","cpfUsuario",$data['cpfUsuario'], null, 2, null);
    }
    public function carregarPermissoes($data)
    {
        return $this->obterRegistros("tbpermissoes","pCPF",$data['cpfUsuario'], null, 2, null);
    }
    public function carregarModulos($data)
    {
        return $this->obterRegistros("tbmodulos","mCPF",$data['cpfUsuario'], null, 2, null);
    }
}