<?php
@session_start();

use app\services\BancoService;
use app\functions\Util;
use app\core\validacao\Valitation;

$responser = new Util();
$validacao = new Valitation();

if (!$validacao->SECURITY_BLOCK_SYSTEM("mListBanco", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Listar | M: Banco | S: False');
}
$model = new BancoService();
$data = $model->obterBancosCadastrados();
?>
<div class="container p-1"  style="<?php echo $d;?>">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Bancos e Administradoras</h1>
          <div id="retornoMsn"></div>
          <hr>
        </div>
        <div class="container container-centered">
          <div class="table-responsive">
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr role="row">
                      <th>CNPJ</th>
                      <th>Banco</th>
                      <th >Logo</th>
                      <th >Opções</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    for ($i = 0; $i < count($data); $i++) {
                      foreach ($data[$i] as $key => $value) {
                      }
                      $cnpj = $data[$i]['cnpj_banco_administradora'];
                      $banco = $data[$i]['nome_banco_administradora'];
                      $logo_cnpj = $data[$i]['cnpj_banco_administradora'];
                    ?>
                      <tr class="odd">
                        <td class="text-center"><?php echo $cnpj ?></td>
                        <td class="text-center"><?php echo $banco ?></td>
                        <td class="text-center">
                          <a title="Visualizar Logo" href="<?php echo URL_BASE . "System/exibirLogoBanco?data=" . $logo_cnpj ?>">
                            <i class="fas fa-file-image"></i>
                          </a>
                        </td>
                        <td class="text-center">
                          |
                          <a title="Editar" href="<?php echo URL_BASE . "System/editarBanco?data=" . $logo_cnpj ?>">
                            <i class="fa fa-pencil"></i>
                          </a>
                          |
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
    </div>
  </div>