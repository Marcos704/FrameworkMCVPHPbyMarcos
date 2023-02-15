<?php
@session_start();

use app\functions\Time;
use app\functions\Util;
use app\models\UserModel;
use app\core\validacao\Valitation;

$validacao = new Valitation();
$time = new Time();
$responser = new Util();
$userModel = new UserModel();
if (!$validacao->SECURITY_BLOCK_SYSTEM("mEditUsuario", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Editar | M: Usuario | S: False');
}
$DATA = $userModel->obterUsuarioCadastradoPorCPF($_SESSION['cpf_edicao']);
?>
<div class="container p-1 m-2" style="<?php echo $d; ?>">
  <div class="card">
    <?php add("headerCards"); ?>
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Ediçao de Usuário</h1>
          <div class="text-danger" id="retornoMsn">*Preencha os Campos</div>
        </div>
      </div>
      <div class="container container-centered">
        <div id="inforCPF">
          <div class="box-form-control">
            <hr>
            <form method="POST" id="editar-usuario" data-stopformrefresh>
              <div class="box-form-control">
                <div class="form-row">
                  <div class="col-lg-4 p-1">
                    <input type="hidden" class="form-control" id="cpf_usuario" name="cpf_usuario" value="<?php echo @$_SESSION['cpf_edicao']; ?>">
                    <input type="text" class="form-control" value="<?php echo @$_SESSION['cpf_edicao']; ?>" disabled required>
                  </div>
                  <div class="col-lg-2 p-1">
                    <input type="hidden" class="form-control" id="datacadastro_usuario" name="datacadastro_usuario" value="<?php echo $time->getDataHoraAtual() ?>">
                    <input type="text" class="form-control" value="<?php echo $time->getDataHoraAtual() ?>" disabled="disabled">
                  </div>

                </div>
                <div class="form-row">
                  <div class="col-lg-3 p-1">
                    <input type="text" class="form-control" id="nome_usuario" value="<?php echo $DATA[0]->nome_usuario ?>" name="nome_usuario" placeholder="Nome" data-obrigatorio="sim">
                  </div>
                  <div class="col-lg-4 p-1">
                    <input type="text" class="form-control" id="sobrenome_usuario" value="<?php echo $DATA[0]->sobrenome_usuario ?>" name="sobrenome_usuario" placeholder="Sobrenome" data-obrigatorio="sim">
                  </div>
                  <div class="col-lg-4 p-1">
                    <input type="email" class="form-control" id="email_usuario" value="<?php echo $DATA[0]->email_usuario ?>" name="email_usuario" placeholder="Email" data-obrigatorio="sim">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-4 p-1">
                    <input type="password" class="form-control" id="senha_usuario" name="senha_usuario" placeholder="Senha" data-obrigatorio="sim">
                  </div>
                  <div class="col-lg-4 p-1">
                    <input type="password" class="form-control" id="confirmar_senha_usuario" name="confirmar_senha_usuario" placeholder="Confirme sua senha" data-obrigatorio="sim">
                  </div>
                  <div class="col-lg-4 p-1 ">
                    <div>
                      <select class="form-control" name="tipo_usuario" data-obrigatorio="sim">
                        <option selected value="null"> - Tipo de usuário - </option>
                        <option value="Suporte">Suporte</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Funcionario">Funcionário</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div id="componte"></div>
              <div class="form-row">
                <div class="col-lg-12 text-center">
                  <button id="btn-editar" class="btn btn-custom-primary" type="submit">Salvar</button>
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

<!-- Ajax para a tela por marquinhos brow-->
<script src="<?php echo URL_BASE ?>assets/js_master/usuario/editarUsuario.js"></script>