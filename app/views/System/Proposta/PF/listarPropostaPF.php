<?php
@session_start();

use app\services\ClienteCPFService;
use app\functions\Util;
use app\core\validacao\Valitation;
$responser = new Util();
$validacao = new Valitation();

if (!$validacao->SECURITY_BLOCK_SYSTEM("mListPropostaPF", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Listar | M: PropostaPF | S: False');
}

$model = new ClienteCPFService();
$data = $model->callBackPropostasPFCadastradas();
?>
<div class="container p-1" style="<?php echo $d;?>">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Propostas Pessoa Fisica</h1>
          <div id="retornoMsn"></div>
          <hr>
        </div>
        <div class="container container-centered">
          <div class="row">
            <div class="col-sm-12">
              <table  id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                  <tr role="row">
                    <th >Id</th>
                    <th >Nome Solicitante</th>
                    <th >CPF Solicitante</th>
                    <th >Tipo Bem</th>
                    <th >Consultor</th>
                    <th >Data Cadastro</th>
                    <th >Data Validade</th>
                    <th >Valor Credito</th>
                    <th >Tipo Credito</th>
                    <th >Situação</th>
                    <th >Opções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i = 0; $i < count($data); $i++) {
                    foreach ($data[$i] as $key => $value) {
                    }
                    $id = $data[$i]['id_proposta_pessoa_fisica'];
                    $nome = $data[$i]['nome_pessoa_fisica'];
                    $cpf = $data[$i]['cpf_pessoa_fisica'];
                    $consultor = $data[$i]['consultor_analise_pessoa_fisica'];
                    $dataAtendimento = $data[$i]['data_atendimento_pessoa_fisica'];
                    $dataValidade = $data[$i]['validade_proposta_pessoa_fisica'];
                    $creditoInteresse = $data[$i]['credito_interesse_pessoa_fisica'];
                    $tipoCredito = $data[$i]['tipo_credito_pessoa_fisica'];
                    $situacao = $data[$i]['estado_analise_pessoa_fisica'];
                    // Variaveis para lógica de tipo Bem
                    $tipoServico = $data[$i]['nome_servico_pessoa_fisica'];
                    $tipoImovel = $data[$i]['tipo_imovel_pessoa_fisica'];
                    $tipoVeiculo = $data[$i]['marca_veiculo_pessoa_fisica'];
                    $urlLinkPropostaDownload = URL_BASE."System/propostaPDF?data=" . $id. "&modo=downloadPDF";
                  ?>
                    <tr >
                      <td><?php echo $id ?></td>
                      <td><?php echo $nome ?></td>
                      <td><?php echo $cpf ?></td>
                      <td><?php if ($tipoServico != "null") {
                            echo "Serviço";
                          } else if ($tipoImovel != "null") {
                            echo "Imovel";
                          } else if ($tipoVeiculo != "null") {
                            echo "Veiculo";
                          } ?></td>
                      <td><?php echo $consultor ?></td>
                      <td><?php echo $dataAtendimento ?></td>
                      <td><?php echo $dataValidade ?></td>
                      <td><?php echo $creditoInteresse ?></td>
                      <td><?php echo $tipoCredito ?></td>
                      <td class="text-center"><?php if ($situacao == "Em analise") {
                            echo '<span class="badge badge-warning">Em analise</span>';
                          } else if ($situacao == "Aprovada") {
                            echo '<span class="badge badge-success">Aprovada</span>';
                          } else if ($situacao == "Negada") {
                            echo '<span class="badge badge-danger">Negada</span>';
                          } ?></td>
                      <td>
                        <a title="Editar" href="<?php echo URL_BASE . "System/editarFichaPFTela?data=" . $id ?>">
                        Editar <i class="fa fa-pencil text-primary"></i>
                        </a>|
                        <a title="PDF" href="<?php echo URL_BASE . "System/propostaPDF?dataPF=" . $id. "&modo=downloadPDF"?>" target="_blank" rel="noopener noreferrer">
                        PDF <i class="fa fa-file-pdf text-danger"></i>
                        </a> |
                        <a title="Movimentação" href="<?php echo URL_BASE . "System/movimentarFichaCPF?data=" . $id ?>">
                         Movimentar <i class="fas fa-random text-success"></i>
                        </a> <br>
                        <a title="Visualizar" href="<?php echo URL_BASE . "System/PropostaPDF/proposta_pdf?dataPF=" . $id . "&modo=visualizar" ?>" target="_blank" rel="noopener noreferrer">
                         Visualizar <i class="fas fa-eye text-primary"></i>
                        </a> |
                        <a title="compartilhar" href="https://api.whatsapp.com/send?phone=+55'<?php echo $data[$i]['celular_pessoa_fisica'] . '&text=%20' . $urlLinkPropostaDownload . '' ?>" target="_blank" rel="noopener noreferrer">
                         Compartilhar <i class="fa-brands fa-whatsapp text-color-green"></i>
                        </a>
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