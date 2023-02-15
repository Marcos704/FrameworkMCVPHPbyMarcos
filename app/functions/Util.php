<?php

namespace app\functions;

use app\core\validacao\Valitation;

class Util
{
    public function gerarChaveAleatoria()
    {
        $ParametroDiferenciacao = mt_rand();
        $ParametroIdentificacao = "ENGCRIA";
        $ParametroDataGeracao   = date('dmY');
        $NovaChave              = $ParametroDiferenciacao . $ParametroIdentificacao . $ParametroDataGeracao;

        if ($NovaChave != null) {
            return $NovaChave;
        }
    }
    public function acessoVerification()
    {
        @session_start();
        $acesso = new Valitation();
        $acesso->URL_ACESS_CHECK(obterDadosSessao("dadosUsuario","ativoUsuario"));
    }

    public function isSessaoExistente($Responser)
    {
        if (isset($_SESSION[$Responser]) != null) {
            echo @$_SESSION[$Responser];
            unset($_SESSION[$Responser]);
        }
    }
    public function MENU_LINK()
    {
        @session_start();
        $nivel = $_SESSION['tipo_usuario'];
        if ($nivel) {
            include_once(MENU_SISTEMA);
        }
    }
    public function OPCAO_PAGINA()
    {
        @session_start();
        $nivel = $_SESSION['tipo_usuario'];
        switch ($nivel) {
            case 'Suporte':
                include_once(OPCAO_SUPORTE_MASTER);
                break;
            case 'Administrador':
                include_once(OPCAO_SUPORTE_MASTER);
                break;
            case 'Funcionario':
                include_once(OPCAO_FUNCIONARIO);
                break;
        }
    }
    public function NOTIFICACOES_PAGE()
    {
        @session_start();
        $nivel = $_SESSION['tipo_usuario'];
        switch ($nivel) {
            case 'Suporte':
                include_once(NOTIFICACOES);
                break;
            case 'Administrador':
                include_once(NOTIFICACOES);
                break;
            case 'Funcionario':
                break;
        }
    }
    public function TITULO_PAGINA()
    {
        @session_start();
        $nivel = $_SESSION['tipo_usuario'];
        switch ($nivel) {
            case 'Suporte':
                echo TITULO_SUPORTE;
                break;
            case 'Administrador':
                echo TITULO_ADMINISTRADOR;
                break;
            case 'Funcionario':
                echo TITULO_FUNCIONARIO;
                break;
        }
    }
    public function msg($type, $message)
    {
        if ($type == 'erro') {
?>
            <div class="modal" tabindex="-1" id="msg" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body bg-danger">
                            <div class="container text-center">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Erro! </strong><?php echo $message; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#msg').modal('show');
            </script>

<?php
        } else
        if ($type == 'infor') {
            echo '<h3 class="text-primary">' . $message . '</h3>';
            exit();
        } else
        if ($type == 'success') {
            echo '<h3 class="text-success">' . $message . '</h3>';
            exit();
        }
        return 'display:none;';
    }
}
