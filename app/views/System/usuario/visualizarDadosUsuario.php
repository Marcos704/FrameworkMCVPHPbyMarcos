<?php
@session_start();

use app\services\UserService;
use app\models\UserModel;
use app\core\validacao\Valitation;
use app\functions\Util;

$validacao = new Valitation();
$responser = new Util();
$d = "";
if(!$validacao->SECURITY_BLOCK_SYSTEM("mListUsuario",$_SESSION['cpf_usuario'])){
  $d = $responser->msg('erro','Nível de Permissão requerida!<br>P: Listar | M: Usuario | S: False');
}

$model = new UserService();
$userModel = new UserModel();
$DATA = $userModel->obterUsuarioCadastradoPorCPF($_SESSION['cpf_usuario']);
$PERMISSOES = $userModel->obterPermissoes($_SESSION['cpf_usuario']);
$data = $model->callBackUsuariosCadastrados();
?>
<div class="container p-1" style="<?php echo $d;?>">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Visualizar Usuários Cadastrados</h1>
          <div id="retornoMsn"></div>
          <hr>
        </div>
        <div class="container container-centered">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <table id="example2" class="table table-bordered table-hover" width="100%">
                <thead>
                  <tr role="row">
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i = 0; $i < count($data); $i++) {
                    foreach ($data[$i] as $key => $value) {
                    }
                    $cpf = $data[$i]['cpf_usuario'];
                    $email = $data[$i]['email_usuario'];
                    $tipo = $data[$i]['tipo_usuario'];
                    $nome = $data[$i]['nome_usuario'];
                  ?>
                    <tr data-id="<?php echo $cpf ?>">
                      <td><?php echo $cpf ?></td>
                      <td><?php echo $nome ?></td>
                      <td><?php echo $email ?></td>
                      <td><?php echo $tipo ?></td>
                      <td><?php if($PERMISSOES[0]->mEditUsuario == 1){ ?>
                        <a title="Editar" href="<?php echo URL_BASE . "System/edicaoDadosRapida?data=" . $cpf ?>">
                          Editar<i class="fa fa-pencil"></i>
                        </a><?php } if($PERMISSOES[0]->mExcludUsuario == 1 && $cpf != $_SESSION['cpf_usuario']){ ?>|
                        <a title="Apagar" href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $cpf ?>">
                          Apagar<i class="fa-solid fa-trash-arrow-up text-danger"></i>
                        </a>
                        <?php } if($PERMISSOES[0]->mCadPermissao == 1){?> |
                          <a title="Permissoes" href="<?php echo URL_BASE . "System/permissaoUsuario?cadPermissao=true&cpfUsuario=" . $cpf ?>">
                          Permissoes<i class="fa-solid fa-key"></i>
                          </a>
                          <?php }?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col text-center">
                <h3>
                  <i class="fa-solid fa-circle-exclamation fa-2x text-danger"></i>
                </h3>
                <h5>Deseja excluir o registro selecionado? <br>Não será possível recuperar os dados após a exclusão.</h5>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a id="btnExcluir" type="button" class="btn btn-danger">Excluir</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Ajax para a tela por marquinhos brow-->
    <script src="<?php echo URL_BASE ?>assets/js_master/usuario/visualizarDados.js"></script>