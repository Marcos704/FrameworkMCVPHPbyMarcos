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
if(@$_GET['cpfUsuario']!=""){
  $_SESSION['cpf_usuario'] = $_GET['cpfUsuario'];echo 'd';
}
if (!$validacao->SECURITY_BLOCK_SYSTEM("mEditUsuario", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Editar | M: Usuario | S: False');
}
$DATA = $userModel->obterUsuarioCadastradoPorCPF($_SESSION['cpf_edicao']);
$PERMISSAO = $userModel->obterPermissoes($_SESSION['cpf_edicao']);
?>
<div class="container p-1 m-2" style="<?php echo $d; ?>">
  <div class="card">
    <?php add("headerCards"); ?>
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Ediçao de Permissão</h1>
          <div class="text-danger" id="retornoMsn">*Preencha os Campos</div>
        </div>
      </div>
      <div class="container container-centered">
        <div id="inforCPF">
          <div class="box-form-control">
            <label>Dados do Usuário</label>
            <table class="table-infor">
                <tbody>
                    <tr>
                    <th >cpf:</th>
                    <th >nome:</th>
                    </tr>
                    <tr>
                    <td><?php echo @$DATA[0]->cpf_usuario; ?></td>
                    <td><?php echo @$DATA[0]->nome_usuario." ". @$DATA[0]->sobrenome_usuario; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form method="POST" id="editar-usuario" data-stopformrefresh>
                <div class="form-row">
                  <div class="col-lg-12">
                    <div class="accordion" id="accordionPermissoes">
                      <div class="card">
                        <div class="card-header text-center" id="idPermissoes">
                          <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePermissoes" aria-expanded="true" aria-controls="collapsePermissoes">
                              <strong> Atribuir Permissões</strong>
                            </button>
                          </h2>
                        </div>

                        <div id="collapsePermissoes" class="collapse show" aria-labelledby="accordionPermissoes" data-parent="#accordionPermissoes">
                          <div class="card-body p-1 m-2">
                            <div class="accordion" id="accordionExample">
                                <div class="form-row">
                                <div class="col-lg-4 p-1">
                                    <input type="hidden" class="form-control" id="cpf_usuario" name="cpf_usuario" value="<?php echo @$_SESSION['cpf_edicao']; ?>">
                                </div>
                                </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-6">
                                  <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                      <h4 class="card-title text-primary"><strong>Central do Usuário</strong></h4><br>

                                      <hr>
                                      <table style="width: 100%">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="hidden" name="mCadUsuario" value="1"><input type="checkbox" id="mCadUsuario"  <?php echo $PERMISSAO[0]->mCadUsuario == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mCadUsuario">(Cadastrar)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="hidden" name="mListUsuario" value="1"><input type="checkbox" id="mListUsuario"  <?php echo $PERMISSAO[0]->mListUsuario == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mListUsuario">(Listar)</label>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="hidden" name="mEditUsuario" value="1"><input type="checkbox" id="mEditUsuario"  <?php echo $PERMISSAO[0]->mEditUsuario == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mEditUsuario">(Editar)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="hidden" name="mExcludUsuario" value="1"><input type="checkbox" id="mExcludUsuario"  <?php echo $PERMISSAO[0]->mExcludUsuario == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mExcludUsuario">(Excluir)</label>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                  <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                      <h4 class="card-title text-primary"><strong>Central de Proposta</strong></h4><br>
                                      <hr>
                                      <table style="width: 100%">
                                        <tbody>
                                          <tr>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mCadPropostaPF" value="1" <?php echo $PERMISSAO[0]->mCadPropostaPF == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mCadPropostaPF">(Cadastrar PF)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mListPropostaPF" value="1" <?php echo $PERMISSAO[0]->mListPropostaPF == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mListPropostaPF">(Listar PF)</label>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mCadPropostaPJ" value="1" <?php echo $PERMISSAO[0]->mCadPropostaPJ == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mCadPropostaPJ">(Cadastrar PJ)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mListPropostaPJ" value="1" <?php echo $PERMISSAO[0]->mListPropostaPJ == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mListPropostaPJ">(Listar PJ)</label>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mEditPropostaPF" value="1" <?php echo $PERMISSAO[0]->mEditPropostaPF == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mEditPropostaPF">(Editar PF)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mEditPropostaPJ" value="1" <?php echo $PERMISSAO[0]->mEditPropostaPJ == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mEditPropostaPJ">(Editar PJ)</label>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mExcludPropostaPF" value="1" <?php echo $PERMISSAO[0]->mExcludPropostaPF == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mExcludPropostaPF">(Excluir PF)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mExcludPropostaPJ" value="1" <?php echo $PERMISSAO[0]->mExcludPropostaPJ == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mExcludPropostaPJ">(Excluir PJ)</label>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                  <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                      <h4 class="card-title text-primary"><strong>Central de Banco</strong></h4><br>
                                      <hr>
                                      <table style="width: 100%">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mCadBanco" value="1" <?php echo $PERMISSAO[0]->mCadBanco == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mCadBanco">(Cadastrar)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mListBanco" value="1" <?php echo $PERMISSAO[0]->mListBanco == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mListBanco">(Listar)</label>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mEditBanco" value="1" <?php echo $PERMISSAO[0]->mEditBanco == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mEditBanco">(Editar)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mExcludBanco" value="1" <?php echo $PERMISSAO[0]->mExcludBanco == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mExcludBanco">(Excluir)</label>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-md-6">
                                  <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                      <h4 class="card-title text-primary"><strong>Configurações</strong></h4><br>
                                      <hr>
                                      <table style="width: 100%">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mAdministradora" value="1" <?php echo $PERMISSAO[0]->mAdministradora == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mAdministradora">(Cadastrar Administradora)</label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-check form-check-inline">
                                                <input type="checkbox" name="mConfSistema" value="1" <?php echo $PERMISSAO[0]->mConfSistema == 1 ? "checked" : null ?>>
                                                <label class="form-check-label" for="mConfSistema">(Config. Sistema)</label>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              <div class="col-lg-4 col-md-6">
                                <div class="card" style="width: 18rem;">
                                  <div class="card-body">
                                    <h4 class="card-title text-primary"><strong>Sistema</strong></h4><br>
                                    <hr>
                                    <table style="width: 100%">
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input type="checkbox" name="isUsuarioAtivo" id="isUsuarioAtivo" value="1" <?php echo $PERMISSAO[0]->isUsuarioAtivo == 1 ? "checked" : null ?>>
                                              <label class="form-check-label" for="isUsuarioAtivo">(Ativar/Inativar Usuario)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input type="checkbox" name="vmDashboard" value="1" id="vmDashboard" <?php echo $PERMISSAO[0]->vmDashboard == 1 ? "checked" : null ?>>
                                              <label class="form-check-label" for="vmDashboard">(Dashboard)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input type="checkbox" name="vmUsuario" value="1" id="vmUsuario" <?php echo $PERMISSAO[0]->vmUsuario == 1 ? "checked" : null ?>>
                                              <label class="form-check-label" for="vmUsuario">(Mod.Usuario)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input type="checkbox" name="vmProposta" value="1" id="vmProposta" <?php echo $PERMISSAO[0]->vmProposta == 1 ? "checked" : null ?>>
                                              <label class="form-check-label" for="vmProposta">(Mod. Proposta)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input type="checkbox" name="vmBanco" value="1" id="vmBanco" <?php echo $PERMISSAO[0]->vmBanco == 1 ? "checked" : null ?>>
                                              <label class="form-check-label" for="vmBanco">(Mod. Banco)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input type="checkbox" name="vmConfiguracoes" value="1" id="vmConfiguracoes" <?php echo $PERMISSAO[0]->vmConfiguracoes == 1 ? "checked" : null ?>>
                                              <label class="form-check-label" for="vmConfiguracoes">(Mod. Configurações)</label>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
<script src="<?php echo URL_BASE ?>assets/js_master/usuario/permissoes.js"></script>