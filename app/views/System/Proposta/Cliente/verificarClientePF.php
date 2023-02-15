<?php
@session_start();

use app\functions\Util;
use app\core\validacao\Valitation;

$validacao = new Valitation();
$responser = new Util();
if (!$validacao->SECURITY_BLOCK_SYSTEM("mCadPropostaPF", $_SESSION['cpf_usuario'])) {
    $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Cadastrar | M: PropostaPF | S: False');
}
?>
<div class="container p-1" style="<?php echo $d;?>">
    <?php add("headerCards"); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title">Pesquisar Clientes</h1>
                    <div class="form-box-control-user">
                        <div class="text-danger" id="retornoMsn">Informe o CPF para prosseguir.</div>
                    </div>
                </div>
            </div>
            <div class="container container-centered">
                <div id="inforCPF">
                    <div class="box-form-control">
                        <!-- Form Cadastrar -->
                        <div id="verificar_cliente_cpf">
                            <form method="POST" id="pesquisar_clientes_cpf">
                                <div class="box-form-control">

                                    <div class="form-box-control-user">
                                        <div class="form-row">
                                            <div class="col-lg-12 text-center">
                                                <input type="text" class="form-control text-center" id="cpf_pessoa_fisica" name="cpf_pessoa_fisica" placeholder="Informe..." data-decimal required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-custom-primary" id="btn-form-continuar" type="submit">
                                                Continuar
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pf/verificarClientePF.js"></script>