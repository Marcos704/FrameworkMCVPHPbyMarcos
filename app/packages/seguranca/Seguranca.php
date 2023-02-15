<?php
namespace app\packages\seguranca;

use app\core\Controller;
use app\core\Model;
use app\packages\validacao\Validacao;

class Seguranca extends Model
{
    public Validacao $validacao;
     
    public function criptografarSenha($data)
    {
        return password_hash($data, PASSWORD_DEFAULT);
    }
    public function descriptografar($data, $hash)
    {
        return password_verify($data, $hash);
    }
    public function SECURITY_BLOCK_SYSTEM($key, $userKey)
    {
        //echo $key;die();
        //$modelAcess = new Model();
        @$data = $this->obterRegistros("tb_permissoes", "cpf_usuario", $userKey, null, 1, false);
        //debug($data);
        if (@$data[0]->$key == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function SECURITY_BLOCK_SYSTEM_ACESS_RECOVERY_PAGE($KEY)
    {
        $data = $this->obterRegistros("tb_recovery_password", "chave_solicitacao", $KEY, null, 1, false);
        if (date("Y-m-d H:i:s") <= @$data[0]->data_expiracao && @$data[0]->data_expiracao != null && @$data[0]->status_solicitacao == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function URL_ACESS_CHECK($key)
    {
        @session_start();
        $controller = new Controller();
        if ($key != 1) {
            windowsAlert("Você não tem permissão para acessar essa página!\\n(Nivel de acesso requerido)",true);
        }
        #if ($this->pageAcess()) {
        #    $s->alertDanger("Você não tem permissão! Favor, realizar o login.", "", "loginResponser", URL_BASE);
        #}
    }
}
