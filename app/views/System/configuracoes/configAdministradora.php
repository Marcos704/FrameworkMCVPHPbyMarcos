<?php
@session_start();

use app\functions\Time;
use app\services\SystemService;
use app\functions\Util;
use app\core\validacao\Valitation;

$responser = new Util();
$validacao = new Valitation();

if (!$validacao->SECURITY_BLOCK_SYSTEM("mAdministradora", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Cadastro/Edição | M: Administradora | S: False');
}
$time = new Time();
$model = new SystemService();
@$dados = $model->obterDadosAdministradora();
?>
<div class="container p-1" style="<?php echo $d;?>">
  <div class="card">
    <?php add("headerCards"); ?>
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Informações Básicas da Administradora</h1>
          <div class="text-danger" id="retornoMsn1">*Preencha os Campos</div>
        </div>
      </div>
      <div class="container container-centered">
        <div>
          <div class="box-form-control">
            <form method="POST" id="administradora">
              <div class="box-form-control">
                <div class="form-row">
                  <div class="col-lg-2">
                    <input type="hidden" class="form-control form-control-user" id="dtCadInforAdministradora" name="dtCadInforAdministradora" value="<?php echo @$dados[0]->dtCadInforAdministradora == null ? $time->getDataHoraAtual() : null ?>" required>
                    
                    <input type="hidden" class="form-control form-control-user" id="idDadosAdministradora" name="idDadosAdministradora" value="<?php echo @$dados[0]->idDadosAdministradora != null ? @$dados[0]->idDadosAdministradora : "null" ?>">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->dtCadInforAdministradora == null ? $time->getDataHoraAtualFomatted() : null ?>" disabled="disabled" placeholder="Data e Hora" required>
                  </div>

                </div>
                <label id="labelTitulo" class="labelTitulo" for="inforJuridicas">Informações Básicas</label>&nbsp;
                <div id="inforJuridicas" class="form-row">
                  <div class="col-lg-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->cnpjAdministradora != null ? $dados[0]->cnpjAdministradora : null ?>" id="cnpjAdministradora" name="cnpjAdministradora" placeholder="CNPJ da Administradora" required>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->rsAdministradora != null ? $dados[0]->rsAdministradora : null ?>" id="rsAdministradora" name="rsAdministradora" placeholder="Razão Social" required>
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->apAdministradora != null ? $dados[0]->apAdministradora : null ?>" id="apAdministradora" name="apAdministradora" placeholder="Nome/Apelido da Empresa" required>
                  </div>
                </div>
                <label id="labelTitulo" class="labelTitulo" for="inforEndereo">Informações Endereço</label>&nbsp;
                <div id="inforEndereo" class="form-row">
                  <div class="col-lg-4">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->endAdministradora != null ? $dados[0]->endAdministradora : null ?>" id="endAdministradora" name="endAdministradora" placeholder="Endereço" required>
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->baAdministradora != null ? $dados[0]->baAdministradora : null ?>" id="baAdministradora" name="baAdministradora" placeholder="Bairro" required>
                  </div>
                  <div class="col-lg-1">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->numEndAdministradora != null ? $dados[0]->numEndAdministradora : null ?>" id="numEndAdministradora" name="numEndAdministradora" placeholder="Nº" required>
                  </div>
                  <div class="col-lg-2">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->foneAdministradora != null ? $dados[0]->foneAdministradora : null ?>" id="foneAdministradora" name="foneAdministradora" placeholder="Fone" required>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control form-control-user" value="<?php echo @$dados[0]->cmAdministradora != null ? $dados[0]->cmAdministradora : null ?>" id="cmAdministradora" name="cmAdministradora" placeholder="Complemento" required>
                  </div>
                </div>
                <label id="labelTitulo" class="labelTitulo" for="inforAdicionais">Informações Adicionais</label>&nbsp;
                <div id="inforAdicionais" class="form-row">
                  <div class="col-lg-8">
                    <textarea type="text" class="form-control form-control-user-text-area" rows="3" id="dsInforAdicionaisAdministradora" name="dsInforAdicionaisAdministradora" placeholder="Informações Adicionais"><?php echo htmlspecialchars(@$dados[0]->dsInforAdicionaisAdministradora) ?></textarea>
                  </div>
                </div>

                <br>
                <div class="form-row">
                  <div class="col-lg-12 text-center">
                    <button class="btn btn-custom-primary" type="submit">Salvar</button>
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
<script src="<?php echo URL_BASE ?>assets/js_master/config/Administradora.js"></script>