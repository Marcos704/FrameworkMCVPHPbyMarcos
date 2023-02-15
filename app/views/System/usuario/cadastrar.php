<?php
@session_start();

use app\functions\Time;
use app\functions\Util;
use app\core\validacao\Valitation;

$validacao = new Valitation();
$responser = new Util();
if (!$validacao->SECURITY_BLOCK_SYSTEM("mCadUsuario", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Cadastro | M: Usuario | S: False');
}

$time = new Time();

?>
<div class="container p-1" style="<?php echo $d; ?>">
  <div class="card">
    <?php add("headerCards"); ?>
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Cadastro de Usuário</h1>
          <div class="text-danger" id="retornoMsn">*Preencha os Campos</div>
        </div>
      </div>
      <div class="container container-centered">
        <div id="inforCPF">
          <div class="box-form-control">
            <form method="POST" id="cadastrar-usuario" data-stopformrefresh>
              <div class="box-form-control">
                <hr>
                <div class="form-row">
                  <div class="col-lg-4 p-1">
                    <input type="hidden" class="form-control" id="cpf_usuario" name="cpf_usuario" value="<?php echo @$_SESSION['novoUsuario_CPF']; ?>">
                    <input type="text" class="form-control" value="<?php echo @$_SESSION['novoUsuario_CPF']; ?>" disabled>
                  </div>
                  <div class="col-lg-2">
                    <input type="hidden" class="form-control" id="datacadastro_usuario" name="datacadastro_usuario" value="<?php echo $time->getDataHoraAtual() ?>">
                    <input type="text" class="form-control" value="<?php echo $time->getDataHoraAtual() ?>" disabled="disabled">
                  </div>

                </div>
                <div class="col-lg-4 p-1">
                  <div>
                    <select class="form-control" name="tipo_usuario" data-obrigatorio="sim">
                      <option selected disabled value="null"> - Tipo de usuário - </option>
                      <option value="Suporte">Suporte</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Funcionario">Funcionário</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-4 p-1">
                    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Nome" data-obrigatorio="sim">
                  </div>
                  <div class="col-lg-4 p-1">
                    <input type="text" class="form-control" id="sobrenome_usuario" name="sobrenome_usuario" placeholder="Sobrenome" data-obrigatorio="sim">
                  </div>
                  <div class="col-lg-4 p-1">
                    <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Email" data-obrigatorio="sim">
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-lg-4 p-1">
                    <div class="input-group">
                      <input type="password" class="form-control" id="senha_usuario" name="senha_usuario" placeholder="Senha" data-obrigatorio="sim">
                      <div class="input-group-append">
                        <div class="input-group-text transparent">
                          <a id="btn-eyes1" style="color:#D6D5A8" href="#"><i id="eyes1" class="fa-solid fa-eye"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 p-1">
                    <div class="input-group">
                      <input type="password" class="form-control" id="confirmar_senha_usuario" name="confirmar_senha_usuario" placeholder="Confirme sua senha" data-obrigatorio="sim">
                      <div class="input-group-append">
                        <div class="input-group-text transparent">
                          <a id="btn-eyes2" style="color:#D6D5A8" href="#"><i id="eyes2" class="fa-solid fa-eye"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <hr>
                <div class="form-row">
                  <div class="col-lg-12">
                    <div class="accordion" id="accordionPermissoes">
                      <div id="collapsePermissoes" class="collapse show" aria-labelledby="accordionPermissoes" data-parent="#accordionPermissoes">
                        <div class="card-body p-1 m-2">
                          <div class="accordion" id="accordionExample">
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
                                              <input class="form-check-input" type="checkbox" id="mCadUsuario" name="mCadUsuario" value="1">
                                              <label class="form-check-label" for="mCadUsuario">(Cadastrar)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mListUsuario" name="mListUsuario" value="1">
                                              <label class="form-check-label" for="mListUsuario">(Listar)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mEditUsuario" name="mEditUsuario" value="1">
                                              <label class="form-check-label" for="mEditUsuario">(Editar)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mExcludUsuario" name="mExcludUsuario" value="1">
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
                                              <input class="form-check-input" type="checkbox" id="mCadPropostaPF" name="mCadPropostaPF" value="1">
                                              <label class="form-check-label" for="mCadPropostaPF">(Cadastrar PF)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mListPropostaPF" name="mListPropostaPF" value="1">
                                              <label class="form-check-label" for="mListPropostaPF">(Listar PF)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mCadPropostaPJ" name="mCadPropostaPJ" value="1">
                                              <label class="form-check-label" for="mCadPropostaPJ">(Cadastrar PJ)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mListPropostaPJ" name="mListPropostaPJ" value="1">
                                              <label class="form-check-label" for="mListPropostaPJ">(Listar PJ)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mEditPropostaPF" name="mEditPropostaPF" value="1">
                                              <label class="form-check-label" for="mEditPropostaPF">(Editar PF)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mEditPropostaPJ" name="mEditPropostaPJ" value="1">
                                              <label class="form-check-label" for="mEditPropostaPJ">(Editar PJ)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mExcludPropostaPF" name="mExcludPropostaPF" value="1">
                                              <label class="form-check-label" for="mExcludPropostaPF">(Excluir PF)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mExcludPropostaPJ" name="mExcludPropostaPJ" value="1">
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
                                              <input class="form-check-input" type="checkbox" id="mCadBanco" name="mCadBanco" value="1">
                                              <label class="form-check-label" for="mCadBanco">(Cadastrar)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mListBanco" name="mListBanco" value="1">
                                              <label class="form-check-label" for="mListBanco">(Listar)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mEditBanco" name="mEditBanco" value="1">
                                              <label class="form-check-label" for="mEditBanco">(Editar)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mExcludBanco" name="mExcludBanco">
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
                                              <input class="form-check-input" type="checkbox" id="mAdministradora" name="mAdministradora" value="1">
                                              <label class="form-check-label" for="mAdministradora">(Cadastrar Administradora)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="mConfSistema" name="mConfSistema" value="1">
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
                                              <input class="form-check-input" type="checkbox" id="isUsuarioAtivo" name="isUsuarioAtivo" value="1">
                                              <label class="form-check-label" for="isUsuarioAtivo">(Ativar/Inativar Usuario)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="vmDashboard" name="vmDashboard" value="1">
                                              <label class="form-check-label" for="vmDashboard">(Dashboard)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="vmUsuario" name="vmUsuario" value="1">
                                              <label class="form-check-label" for="vmUsuario">(Mod.Usuario)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="vmProposta" name="vmProposta" value="1">
                                              <label class="form-check-label" for="vmProposta">(Mod. Proposta)</label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="vmBanco" name="vmBanco">
                                              <label class="form-check-label" for="vmBanco">(Mod. Banco)</label>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" id="vmConfiguracoes" name="vmConfiguracoes" value="1">
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
                <br>
                <div class="form-row">
                  <div class="col-lg-12 text-center">
                    <button id="btn-cadastrar" type="submit" class="btn btn-custom-primary">Salvar</button>
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
<script src="<?php echo URL_BASE ?>assets/js_master/usuario/cadastrarUsuario.js"></script>