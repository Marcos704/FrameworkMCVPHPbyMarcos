<?php
@session_start();
use app\functions\Util;
use app\core\validacao\Valitation;

$validacao = new Valitation();
$responser = new Util();
if(!$validacao->SECURITY_BLOCK_SYSTEM("mCadUsuario",$_SESSION['cpf_usuario'])){
  $d = $responser->msg('erro','Nível de Permissão requerida!<br>P: Cadastro | M: Usuario | S: False');
}

?>
<div class="container p-1" style="<?php echo $d;?>">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title">Verificação de Usuário</h1>
                    <div class="form-box-control-user">
                        <div class="text-danger" id="retornoMsn">Informe o seu CPF para prosseguir com o cadastro.</div>
                    </div>
                </div>
            </div>
            <div class="container container-centered">
                <div id="inforCPF">
                    <div class="box-form-control">
                        <!-- Form Cadastrar -->
                        <div id="cadastrar">
                            <form method="POST" id="pesquisar_usuario_cpf_cadastrar">
                                <div class="box-form-control">

                                    <div class="form-box-control-user">
                                        <div class="form-row">
                                            <div class="col-lg-12 text-center">
                                                <input type="text" class="form-control text-center" id="cpf_usuario" name="cpf_usuario" placeholder="CPF" data-obrigatorio data-cpf required>
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

                        <!-- Form Editar -->
                        <div id="editar" class="ocultar-componente">
                            <form method="POST" id="pesquisar_usuario_cpf_editar">
                                <div class="box-form-control">
                                    <div class="form-box-control-user">
                                        <div class="form-row">
                                            <div class="col-lg-12 text-center">
                                                <input type="hidden" class="form-control form-control-user-sm text-center" value="<?php echo @$_SESSION['cpf_edicao'] ?>" id="cpf_usuario_editar" name="cpf_usuario_editar" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-custom-edit">
                                                Editar
                                                <i class="fas fa-user-edit"></i>
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
<!-- Ajax para a tela por marquinhos brow-->
<script src="<?php echo URL_BASE ?>assets/js_master/usuario/verificar_CPF.js"></script>