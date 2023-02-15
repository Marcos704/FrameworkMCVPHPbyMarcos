<?php

namespace app\packages\validacao;

use app\core\Controller;
use app\core\Model;

class Validacao extends Model
{
    private Controller $controller;

    public function validarUsuario()
    {
        @session_start();
        $this->controller = new Controller();
        if(isSessaoAtiva() && obterDadosSessao("dadosUsuario", "tpUsuario") != null){
            $this->controller->redirect(DASHBOAR);
        }
    }
    public function MENU_LINK($MENU)
    {
        require_once($MENU);
    }

    public function getURL($url)
    {
        if (substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], $url)) == $url) {
            return true;
        }
        return false;
    }
    public function pageAcess()
    {
        @session_start();
        //echo "aqui: ".$_SESSION['status_sessao_usuario']; exit;
        if ($_SESSION['status_sessao_usuario'] == "deslogado" || $_SESSION['status_sessao_usuario'] == null || $_SESSION['isUsuarioAtivo'] != 1) {
            return true;
        }
    }
    public function isPass()
    {
        @session_start();
        if (
            $this->isVariavelSessaoExistente($_SESSION['status_sessao_usuario'])
            && $this->isSessionOk("status_sessao_usuario", "longado")
            && $this->isVariavelSessaoExistente($_SESSION['cpf_usuario'])
            && $this->isVariavelSessaoExistente($_SESSION['chave_usuario'])
        ) {
            return true;
        } else {
            return false;
        }
    }
    public function isSessionOk($varSessao, $verificador)
    {
        @session_start();
        if (isSessaoAtiva()) {
            if (@$_SESSION[$varSessao] == $verificador) {
                return true;
            }
            return false;
        }
        return false;
    }
    public function isVariavelSessaoExistente($varSessao)
    {
        @session_start();
        if (isSessaoAtiva()) {
            if (@$_SESSION[$varSessao] != " ") {
                return true;
            }
            return false;
        }
        return false;
    }
    public function isSessaoExistente($Responser)
    {
        if (isset($_SESSION[$Responser]) != null) {
            echo $_SESSION[$Responser];
            unset($_SESSION[$Responser]);
        }
    }

    public function isCPFValido($cpf)
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
    /** 
     * @param   mixed       $cnpj = Recebe o cnpj a ser validado
     * @return  boolean     false-> CNPJ inválido
     *                      true-> CNPJ válido
     * *Solução encontrada em : https://gist.github.com/guisehn/3276302
     */
    public function isCNPJValido($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
    /** 
     * @param   mixed       $data = Recebe o valor inserido nos campos
     * @return  boolean     false-> senha menor que 8 caracteres ou 
     *                              Senha sem caracteres especiais
     *                      true-> Senha Ok
     */
    public function verificarCampoSenha($data)
    {
        if (strlen($data) < 8) {
            return false;
        }
        if (!preg_match('/^[a-zA-Z0-9]+/', $data)) {
            return false;
        }
        return true;
    }
}
