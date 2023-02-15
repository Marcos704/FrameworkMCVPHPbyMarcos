<?php

namespace app\Services;

use app\core\validacao\Valitation;
use app\models\GenericModel;

class RecoveryService
{
    private GenericModel    $genericModel;
    private Valitation      $valitation;

    public function recoveryPassword($dados, $kay)
    {
        $this->genericModel = new GenericModel();
        $this->valitation   = new Valitation();

        if ($this->valitation->isCPFValido($dados['cpf_usuario'])) {
            if ($dados['senha_usuario'] == $dados['confirmar_senha_usuario']) {
                if ($this->valitation->verificarCampoSenha($dados['senha_usuario'])) {
                    $cpf_usuario    = $dados['cpf_usuario'];
                    $dados['senha_usuario']     = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);
                    $dados2['status_solicitacao'] = 1; //Status fechado
                    unset($dados['confirmar_senha_usuario']);
                    unset($dados['cpf_usuario']);
                    if ($this->genericModel->atualizarRegistro("tb_usuario", "cpf_usuario", $cpf_usuario, $dados, false)
                        && $this->genericModel->atualizarRegistro("tb_recovery_password", "chave_solicitacao", $kay, $dados2, false)) {
                        echo 'SQL INFOR PASS';
                    } else {
                        echo 'SQL INFOR FAIL';
                    }
                } else {
                    echo 'Requisitos minimos nao atendidos';
                }
            } else {
                echo 'senhas nao conferem';
            }
        } else {
            echo 'cpf invalido';
        }
    }
}
