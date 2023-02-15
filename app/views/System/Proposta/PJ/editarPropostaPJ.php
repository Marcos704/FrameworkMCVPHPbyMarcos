<?php
@session_start();

use app\functions\Time;
use app\functions\Util;
use app\core\validacao\Valitation;
use app\models\clienteCNPJModel;

$responser = new Util();
$validacao = new Valitation();

if (!$validacao->SECURITY_BLOCK_SYSTEM("mEditPropostaPJ", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Editar | M: PropostaPJ | S: False');
}

$time = new Time();
$fichaService = new clienteCNPJModel();
$DATA = $fichaService->obterDadosFichaPJId($_SESSION['id_ficha_edicao']);
// Variaveis para lógica de tipo Bem
$tipoServico =  $DATA[0]->nome_servico_pessoa_juridica;
$tipoImovel = $DATA[0]->tipo_imovel_pessoa_juridica;
$tipoVeiculo = $DATA[0]->marca_veiculo_pessoa_juridica;
$administradora = $DATA[0]->marca_veiculo_pessoa_juridica;
?>
<div class="container p-1">
  <form method="POST" id="editar_ficha_pessoa_juridica">
    <input type="hidden" value="<?php echo $_GET['data']; ?>" name="idProposta" required>
    <div id="infoBasicas" class="container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h2 class="sub-title">Informações Basicas</h2>
              <div class="text-danger" id="msn-inforBasicas">*Preencha os Campos</div>
            </div>
          </div>
          <div class="container container-centered">
            <div id="inforBasicas">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-4">
                      <label for="razao_social_pessoa_juridica">Razão Social</label>
                      <input type="text" class="form-control form-control-user" id="razao_social_pessoa_juridica" name="razao_social_pessoa_juridica" value="<?php echo $DATA[0]->razao_social_pessoa_juridica ?>" placeholder="Razão Social">
                    </div>
                    <div class="col-lg-4">
                      <label for="nome_fantasia_pessoa_juridica">Nome Fantasia</label>
                      <input type="text" class="form-control form-control-user" id="nome_fantasia_pessoa_juridica" name="nome_fantasia_pessoa_juridica" value="<?php echo $DATA[0]->nome_fantasia_pessoa_juridica ?>" placeholder="Razão Social">
                    </div>
                    <div class="col-lg-2">
                      <label for="data_de_fundacao_pessoa_juridica">Fundação</label>
                      <input type="date" class="form-control form-control-user" id="data_de_fundacao_pessoa_juridica" name="data_de_fundacao_pessoa_juridica" value="<?php echo $DATA[0]->data_de_fundacao_pessoa_juridica ?>">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="tipo_empresa_pessoa_juridica">Tipo de Empresa</label>
                      <input type="text" class="form-control form-control-user" id="tipo_empresa_pessoa_juridica" name="tipo_empresa_pessoa_juridica" placeholder="Tipo de Empresa" value="<?php echo $DATA[0]->tipo_empresa_pessoa_juridica ?>">
                    </div>
                    <div class="col-lg-2">
                      <label for="atividade_pessoa_juridica">Atividade</label>
                      <input type="text" class="form-control form-control-user" id="atividade_pessoa_juridica" name="atividade_pessoa_juridica" value="<?php echo $DATA[0]->atividade_pessoa_juridica ?>" placeholder="Atividade">
                    </div>
                    <div class="col-lg-2">
                      <label for="numero_registro_pessoa_juridica">Numero de Registro</label>
                      <input type="number" class="form-control form-control-user" id="numero_registro_pessoa_juridica" name="numero_registro_pessoa_juridica" placeholder="Numero de Registro" value="<?php echo $DATA[0]->numero_registro_pessoa_juridica ?>">
                    </div>
                    <div class="col-lg-2">
                      <label for="faturamento_pessoa_juridica">Faturamento</label>
                      <input type="text" class="form-control form-control-user" id="faturamento_pessoa_juridica" name="faturamento_pessoa_juridica" placeholder="Faturamento" value="<?php echo $DATA[0]->faturamento_pessoa_juridica ?>">
                    </div>
                    <div class="col-lg-2">
                      <label for="cnpj_pessoa_juridica">CNPJ</label>
                      <input type="hidden" class="form-control form-control-user" id="cnpj_pessoa_juridica" name="cnpj_pessoa_juridica" value="<?php echo $DATA[0]->cnpj_pessoa_juridica ?>">
                      <input type="hidden" class="form-control form-control-user" id="id_proposta_pessoa_juridica" name="id_proposta_pessoa_juridica">
                      <input type="text" class="form-control form-control-user" value="<?php echo $DATA[0]->cnpj_pessoa_juridica ?>" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="inscricao_estadual_pessoa_juridica">Inscrição Estadual</label>
                      <input type="text" class="form-control form-control-user" id="inscricao_estadual_pessoa_juridica" name="inscricao_estadual_pessoa_juridica" placeholder="Inscrição Estadual" value="<?php echo $DATA[0]->inscricao_estadual_pessoa_juridica ?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-12 text-center">
                      <a href="#" id="btn-prox-infor-basicas" class="btn btn-custom-primary">Proximo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="infoContatoEndereco" class="ocultar-componente container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h5 class="sub-title">Contatos e Endereços</h5>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-2">
              <label for="cep_pessoa_juridica">CEP</label>
              <input type="text" class="form-control form-control-user" id="cep_pessoa_juridica" name="cep_pessoa_juridica" value="<?php echo $DATA[0]->cep_pessoa_juridica ?>" placeholder="CEP">
            </div>
            <div class="col-lg-3">
              <label for="rua_pessoa_juridica">Rua/Avenida</label>
              <input type="text" class="form-control form-control-user" id="rua_pessoa_juridica" name="rua_pessoa_juridica" placeholder="Rua/Avenida" value="<?php echo $DATA[0]->rua_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <label for="bairro_pessoa_juridica">Bairro</label>
              <input type="text" class="form-control form-control-user" id="bairro_pessoa_juridica" name="bairro_pessoa_juridica" placeholder="Bairro" value="<?php echo $DATA[0]->bairro_pessoa_juridica ?>">
            </div>
            <div class="col-lg-1">
              <label for="numero_pessoa_juridica">Numero</label>
              <input type="text" class="form-control form-control-user" id="numero_pessoa_juridica" name="numero_pessoa_juridica" placeholder="N°" value="<?php echo $DATA[0]->numero_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <label for="cidade_pessoa_juridica">Cidade</label>
              <input type="text" class="form-control form-control-user" id="cidade_pessoa_juridica" name="cidade_pessoa_juridica" placeholder="Cidade" value="<?php echo $DATA[0]->cidade_pessoa_juridica ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-4">
              <label for="complemento_pessoa_juridica">Complemento</label>
              <input type="text" class="form-control form-control-user" id="complemento_pessoa_juridica" name="complemento_pessoa_juridica" placeholder="Complemento" value="<?php echo $DATA[0]->complemento_pessoa_juridica ?>">
            </div>
            <div class="col-lg-1">
              <label for="estado_pessoa_juridica">UF</label>
              <input type="text" class="form-control form-control-user" id="estado_pessoa_juridica" name="estado_pessoa_juridica" placeholder="UF" value="<?php echo $DATA[0]->estado_pessoa_juridica ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-3">
              <label for="telefone_pessoa_juridica">Fone</label>
              <input type="text" class="form-control form-control-user" id="telefone_pessoa_juridica" name="telefone_pessoa_juridica" placeholder="(00) 1234-5678" value="<?php echo $DATA[0]->telefone_pessoa_juridica ?>">
            </div>
            <div class="col-lg-4">
              <label for="email_pessoa_juridica">Email</label>
              <input type="email" class="form-control form-control-user" id="email_pessoa_juridica" name="email_pessoa_juridica" placeholder="Email" value="<?php echo $DATA[0]->email_pessoa_juridica ?>">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-contatos-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-contatos-proximo" class="btn btn-custom-primary">Proximo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="infoRepresentantePatrimonio" class="ocultar-componente container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h2 class="sub-title">Representante/Patrimonio</h2>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-5">
              <label for="nome_socio_pessoa_juridica">Nome do Representante</label>
              <input type="text" class="form-control form-control-user" id="nome_socio_pessoa_juridica" name="nome_socio_pessoa_juridica" placeholder="Nome do Representante" value="<?php echo $DATA[0]->nome_socio_pessoa_juridica ?>">
            </div>
            <div class="col-lg-3">
              <label for="data_de_nascimento_socio_pessoa_juridica">Data de Nascimento</label>
              <input type="date" class="form-control form-control-user" id="data_de_nascimento_socio_pessoa_juridica" name="data_de_nascimento_socio_pessoa_juridica" placeholder="DD/MM/AAAA" value="<?php echo $DATA[0]->data_de_nascimento_socio_pessoa_juridica ?>">
            </div>
            <div class="col-lg-3">
              <div>
                <select name="genero_socio_pessoa_juridica" id="genero_socio_pessoa_juridica">
                  <option selected value="<?php echo $DATA[0]->genero_socio_pessoa_juridica ?>"><?php echo $DATA[0]->genero_socio_pessoa_juridica ?></option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-lg-4">
              <label for="nome_mae_socio_pessoa_juridica">Nome da Mãe</label>
              <input type="text" class="form-control form-control-user" id="nome_mae_socio_pessoa_juridica" name="nome_mae_socio_pessoa_juridica" placeholder="Nome da Mãe" value="<?php echo $DATA[0]->nome_mae_socio_pessoa_juridica ?>">
            </div>
            <div class="col-lg-4">
              <label for="nome_pai_socio_pessoa_juridica">Nome do Pai</label>
              <input type="text" class="form-control form-control-user" id="nome_pai_socio_pessoa_juridica" name="nome_pai_socio_pessoa_juridica" placeholder="Nome do Pai" value="<?php echo $DATA[0]->nome_pai_socio_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <label for="cpf_socio_pessoa_juridica">CPF</label>
              <input type="text" class="form-control form-control-user" id="cpf_socio_pessoa_juridica" name="cpf_socio_pessoa_juridica" placeholder="CPF" value="<?php echo $DATA[0]->cpf_socio_pessoa_juridica ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-2">
              <label for="nacionalidade_socio_pessoa_juridica">Nacionalidade</label>
              <input type="text" class="form-control form-control-user" id="nacionalidade_socio_pessoa_juridica" name="nacionalidade_socio_pessoa_juridica" placeholder="Nacionalidade" value="<?php echo $DATA[0]->nacionalidade_socio_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <div>
                <select name="ppe_socio_pessoa_juridica" id="ppe_socio_pessoa_juridica">
                  <option selected value="<?php echo $DATA[0]->ppe_socio_pessoa_juridica ?>"><?php echo $DATA[0]->ppe_socio_pessoa_juridica ?></option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                </select>
              </div>
            </div>
            <div class="col-lg-3">
              <div>
                <select id="patrimonio_select">
                  <option selected value="null"> - Possui Patrimonio - </option>
                  <option value="null">Não possui</option>
                  <option value="1">1 - Patrimonio</option>
                  <option value="2">2 - Patrimonios</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div>
                <select id="tipo_bem">
                  <option selected value="<?php if ($tipoServico != null) {
                                            echo "servico";
                                          } else if ($tipoImovel != null) {
                                            echo "imovel";
                                          } else if ($tipoVeiculo != null) {
                                            echo "veiculo";
                                          } else {
                                            echo "null";
                                          } ?>">
                    <?php if ($tipoServico != null) {
                      echo "Serviço";
                    } else if ($tipoImovel != null) {
                      echo "Imovel";
                    } else if ($tipoVeiculo != null) {
                      echo "Veiculo";
                    } else {
                      echo "null";
                    } ?>
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-5">
              <label for="primeiro_patrimonio_pessoa_juridica">Patrimonio/bem</label>
              <input type="text" class="form-control form-control-user" id="primeiro_patrimonio_pessoa_juridica" name="primeiro_patrimonio_pessoa_juridica" placeholder="Patrimonio/Bem" value="<?php echo $DATA[0]->primeiro_patrimonio_pessoa_juridica ?>" disabled>
              <div id="pt1"></div>
            </div>
            <div class="col-lg-3">
              <label for="valor_primeiro_patrimonio_pessoa_fisica">Valor*</label>
              <input type="text" class="form-control form-control-user" id="valor_primeiro_patrimonio_pessoa_juridica" name="valor_primeiro_patrimonio_pessoa_juridica" placeholder="Valor" value="<?php echo $DATA[0]->valor_primeiro_patrimonio_pessoa_juridica ?>" disabled>
              <div id="ptv1"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-5">
              <label for="segundo_patrimonio_pessoa_fisica">Patrimonio/bem</label>
              <input type="text" class="form-control form-control-user" id="segundo_patrimonio_pessoa_juridica" name="segundo_patrimonio_pessoa_juridica" placeholder="Patrimonio/Bem" value="<?php echo $DATA[0]->segundo_patrimonio_pessoa_juridica ?>" disabled>
              <div id="pt2"></div>
            </div>
            <div class="col-lg-3">
              <label for="valor_segundo_patrimonio_pessoa_fisica">Valor*</label>
              <input type="text" class="form-control form-control-user" id="valor_segundo_patrimonio_pessoa_juridica" name="valor_segundo_patrimonio_pessoa_juridica" placeholder="Valor" value="<?php echo $DATA[0]->valor_segundo_patrimonio_pessoa_juridica ?>" disabled>
              <div id="ptv2"></div>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-repesentantes-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-repesentantes-proximo" class="btn btn-custom-primary">Proximo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="infoBemImovel" class="ocultar-componente container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h5 class="sub-title">Imovel</h5>
              <div class="text-danger">*Preencha os Campos</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-2">
              <label for="tipo_imovel_pessoa_juridica">Tipo de Imovel</label>
              <input type="text" class="form-control form-control-user" id="tipo_imovel_pessoa_juridica" name="tipo_imovel_pessoa_juridica" placeholder="Casa" value="<?php echo $DATA[0]->tipo_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <label for="utilidade_imovel_pessoa_juridica">Finalidade</label>
              <input type="text" class="form-control form-control-user" id="utilidade_imovel_pessoa_juridica" name="utilidade_imovel_pessoa_juridica" placeholder="Residencial" value="<?php echo $DATA[0]->utilidade_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-4">
              <label for="observacao_imovel_pessoa_juridica">Observação</label>
              <input type="text" class="form-control form-control-user" id="observacao_imovel_pessoa_juridica" name="observacao_imovel_pessoa_juridica" placeholder="Observação" value="<?php echo $DATA[0]->observacao_imovel_pessoa_juridica ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-2">
              <label for="cep_imovel_pessoa_juridica">CEP</label>
              <input type="text" class="form-control form-control-user" id="cep_imovel_pessoa_juridica" name="cep_imovel_pessoa_juridica" placeholder="CEP" value="<?php echo $DATA[0]->cep_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-3">
              <label for="rua_imovel_pessoa_juridica">Rua/Avenida</label>
              <input type="text" class="form-control form-control-user" id="rua_imovel_pessoa_juridica" name="rua_imovel_pessoa_juridica" placeholder="Rua/Avenida" value="<?php echo $DATA[0]->rua_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <label for="bairro_imovel_pessoa_juridica">Bairro</label>
              <input type="text" class="form-control form-control-user" id="bairro_imovel_pessoa_juridica" name="bairro_imovel_pessoa_juridica" placeholder="Bairro" value="<?php echo $DATA[0]->bairro_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-1">
              <label for="numero_imovel_pessoa_juridica ">Nº</label>
              <input type="number" class="form-control form-control-user" id="numero_imovel_pessoa_juridica" name="numero_imovel_pessoa_juridica" placeholder="N°" value="<?php echo $DATA[0]->numero_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-2">
              <label for="cidade_imovel_pessoa_juridica">Cidade</label>
              <input type="text" class="form-control form-control-user" id="cidade_imovel_pessoa_juridica" name="cidade_imovel_pessoa_juridica" placeholder="Cidade" value="<?php echo $DATA[0]->cidade_imovel_pessoa_juridica ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-4">
              <label for="complemento_imovel_pessoa_juridica">Complemento</label>
              <input type="text" class="form-control form-control-user" id="complemento_imovel_pessoa_juridica" name="complemento_imovel_pessoa_juridica" placeholder="Complemento" value="<?php echo $DATA[0]->complemento_imovel_pessoa_juridica ?>">
            </div>
            <div class="col-lg-1">
              <label for="estado_imovel_pessoa_juridica">UF</label>
              <input type="text" class="form-control form-control-user" id="estado_imovel_pessoa_juridica" name="estado_imovel_pessoa_juridica" placeholder="UF" value="<?php echo $DATA[0]->estado_imovel_pessoa_juridica ?>">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-imovel-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-imovel-proximo" class="btn btn-custom-primary">Proximo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="infoBemVeiculo" class="ocultar-componente container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h5 class="sub-title">Veículo</h5>
              <div class="text-danger">*Preencha os Campos</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-2">
              <select id="tipo_veiculo_pessoa_juridica" name="tipo_veiculo_pessoa_juridica">
                <option selected value="null"> - Veiculo - </option>
                <option value="Carro">Carro</option>
                <option value="Caminhão">Caminhão</option>
                <option value="Moto">Moto</option>
              </select>
            </div>
            <div class="col-lg-3">
              <select id="estado_veiculo_pessoa_juridica" name="estado_veiculo_pessoa_juridica">
                <option selected value="null"> - Estado do Veiculo - </option>
                <option value="Novo">Novo</option>
                <option value="Semi-novo">Semi-novo</option>
              </select>
            </div>
            <div class="col-lg-2">
              <label for="marca_veiculo_pessoa_juridica">Marca do Veiculo</label>
              <input type="Text" class="form-control form-control-user" id="marca_veiculo_pessoa_juridica" name="marca_veiculo_pessoa_juridica" value="<?php echo $DATA[0]->marca_veiculo_pessoa_juridica ?>" placeholder="Marca do Veiculo">
            </div>
            <div class="col-lg-2">
              <label for="modelo_veiculo_pessoa_juridica">Modelo</label>
              <input type="text" class="form-control form-control-user" id="modelo_veiculo_pessoa_juridica" name="modelo_veiculo_pessoa_juridica" value="<?php echo $DATA[0]->modelo_veiculo_pessoa_juridica ?>" placeholder="Modelo">
            </div>
            <div class="col-lg-1">
              <label for="ano_veiculo_pessoa_juridica">Ano do Modelo</label>
              <input type="number" class="form-control form-control-user" id="ano_veiculo_pessoa_juridica" name="ano_veiculo_pessoa_juridica" value="<?php echo $DATA[0]->ano_veiculo_pessoa_juridica ?>" placeholder="2022">
            </div>
            <div class="col-lg-1">
              <label for="ano_fabricacao_veiculo_pessoa_juridica">Ano de Fabricação</label>
              <input type="number" class="form-control form-control-user" id="ano_fabricacao_veiculo_pessoa_juridica" name="ano_fabricacao_veiculo_pessoa_juridica" value="<?php echo $DATA[0]->ano_fabricacao_veiculo_pessoa_juridica ?>" placeholder="2022">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-veiculo-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-veiculo-proximo" class="btn btn-custom-primary">Proximo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="infoBemServico" class="ocultar-componente container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h5 class="sub-title">Serviço</h5>
              <div class="text-danger">*Preencha os Campos</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-2">
              <label for="nome_servico_pessoa_juridica">Nome do Serviço</label>
              <input type="text" class="form-control form-control-user" id="nome_servico_pessoa_juridica" name="nome_servico_pessoa_juridica" value="<?php echo $DATA[0]->nome_servico_pessoa_juridica ?>" placeholder="Nome do serviço">
            </div>
            <div class="col-lg-2">
              <label for="tipo_servico_pessoa_juridica">Tipo de Serviço</label>
              <input type="text" class="form-control form-control-user" id="tipo_servico_pessoa_juridica" name="tipo_servico_pessoa_juridica" value="<?php echo $DATA[0]->tipo_servico_pessoa_juridica ?>" placeholder="Tipo de Serviço">
            </div>
            <div class="col-lg-5">
              <label for="descricao_servico_pessoa_juridica">Descrição do Serviço</label>
              <textarea class="form-control form-control-user-text-area" id="descricao_servico_pessoa_juridica" name="descricao_servico_pessoa_juridica"><?php echo $DATA[0]->descricao_servico_pessoa_juridica ?></textarea>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-servico-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-servico-proximo" class="btn btn-custom-primary">Proximo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="infoConsultor" class="ocultar-componente container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar Ficha Pessoa Juridica</h1>
              <h5 class="sub-title">Finalizar Cadastro</h5>
              <div class="text-danger">*Preencha os Campos</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-6">
              <label for="consultor_analise_pessoa_juridica">Consultor</label>
              <input type="text" class="form-control form-control-user" id="consultor_analise_pessoa_juridica" id="consultor_analise_pessoa_juridica" placeholder="<?php echo @$_SESSION['nome_usuario'] ?>" disabled>
              <input type="hidden" class="form-control form-control-user" name="consultor_analise_pessoa_juridica" value="<?php echo @$_SESSION['nome_usuario'] ?>">
            </div>
            <div class="col-lg-2">
              <label for="data_atendimento_pessoa_juridica">Data de criação</label>
              <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d') ?>" id="data_atendimento_pessoa_juridica" disabled>
              <input type="hidden" class="form-control form-control-user" name="data_atendimento_pessoa_juridica" value="<?php echo date('Y-m-d') ?>">
            </div>
            <div class="col-lg-2">
              <label for="validade_proposta_pessoa_juridica">Validade da proposta</label>
              <input type="date" class="form-control form-control-user" id="validade_proposta_pessoa_juridica" value="<?php echo $DATA[0]->validade_proposta_pessoa_juridica ?>" name="validade_proposta_pessoa_juridica">
            </div>
            <div class="col-lg-2">
              <label for="estado_analise_pessoa_juridica">Estado da proposta</label>
              <input type="text" class="form-control form-control-user" value="<?php echo $DATA[0]->estado_analise_pessoa_juridica ?>" disabled>
              <input type="hidden" class="form-control form-control-user" name="estado_analise_pessoa_juridica" value="<?php echo $DATA[0]->estado_analise_pessoa_juridica ?>">
            </div>
          </div>
          <div class="form-row center">
            <div class="col-md-2">
              <select id="cnpj_bancos" name="cnpj_banco">
                <option selected value="<?php echo $DATA[0]->cnpj_banco ?>"><?php echo $DATA[0]->cnpj_banco ?></option>
              </select>
            </div>
            <div class="col-lg-2">
              <label for="valor_bruto_pessoa_juridica">Valor do Credito</label>
              <input type="number" class="form-control form-control-user" id="valor_bruto_pessoa_juridica" name="valor_bruto_pessoa_juridica" value="<?php echo $DATA[0]->valor_bruto_pessoa_juridica ?>" placeholder="R$ 2000">
            </div>
            <div class="col-md-3">
              <select id="tipo_credito_pessoa_juridica" name="tipo_credito_pessoa_juridica">
                <option selected value="<?php echo $DATA[0]->tipo_credito_pessoa_juridica ?>"><?php echo $DATA[0]->tipo_credito_pessoa_juridica ?>S </option>
              </select>
            </div>
            <div class="col-lg-2">
              <label for="valor_adesao_pessoa_juridica">Valor de Adesão</label>
              <input type="number" class="form-control form-control-user" id="valor_adesao_pessoa_juridica" name="valor_adesao_pessoa_juridica" value="<?php echo $DATA[0]->valor_adesao_pessoa_juridica ?>" placeholder="R$ 2000">
            </div>
          </div>
          <hr>
          <div class="center">
            <h5>Preenchimento de Parcelas</h5>
          </div>
          <div class="form-row center">
            <div class="center">
              <div class="col-lg-5">
                <label for="parcela1_pessoa_juridica">(1º) Parcela</label>
                <input type="number" class="form-control form-control-user" id="parcela1_pessoa_juridica" name="parcela1_pessoa_juridica" value="<?php echo $DATA[0]->parcela1_pessoa_juridica ?>" placeholder="5">
              </div>
              <div class="col-lg-5">
                <label for="valor_parcela1_pessoa_juridica">(1º) Valor da Parcela</label>
                <input type="number" class="form-control form-control-user" id="valor_parcela1_pessoa_juridica" name="valor_parcela1_pessoa_juridica" value="<?php echo $DATA[0]->valor_parcela1_pessoa_juridica ?>" placeholder="R$ 2000">
              </div>
              <div class="col-lg-2">
              </div>
            </div>
          </div>
          <div class="form-row center">
            <div class="center">
              <div class="col-lg-5">
                <label for="parcela2_pessoa_juridica">(2º) Parcela</label>
                <input type="number" class="form-control form-control-user" id="parcela2_pessoa_juridica" name="parcela2_pessoa_juridica" value="<?php echo $DATA[0]->parcela2_pessoa_juridica ?>" placeholder="5">
              </div>
              <div class="col-lg-5">
                <label for="valor_parcela2_pessoa_juridica">(2º) Valor da Parcela</label>
                <input type="number" class="form-control form-control-user" id="valor_parcela2_pessoa_juridica" name="valor_parcela2_pessoa_juridica" value="<?php echo $DATA[0]->valor_parcela2_pessoa_juridica ?>" placeholder="R$ 2000">
              </div>
              <div class="col-lg-2">
              </div>
            </div>
          </div>
          <div class="form-row center">
            <div class="center">
              <div class="col-lg-5">
                <label for="parcela3_pessoa_juridica">(3º) Parcela</label>
                <input type="number" class="form-control form-control-user" id="parcela3_pessoa_juridica" name="parcela3_pessoa_juridica" value="<?php echo $DATA[0]->parcela3_pessoa_juridica ?>" placeholder="5">
              </div>
              <div class="col-lg-5">
                <label for="valor_parcela3_pessoa_juridica">(3º) Valor da Parcela</label>
                <input type="number" class="form-control form-control-user" id="valor_parcela3_pessoa_juridica" name="valor_parcela3_pessoa_juridica" value="<?php echo $DATA[0]->valor_parcela3_pessoa_juridica ?>" placeholder="R$ 2000">
              </div>
              <div class="col-lg-2">
              </div>
            </div>
          </div>
          <div class="form-row center">
            <div class="center">
              <div class="col-lg-5">
                <label for="parcela4_pessoa_juridica">(4º) Parcela</label>
                <input type="number" class="form-control form-control-user" id="parcela4_pessoa_juridica" name="parcela4_pessoa_juridica" value="<?php echo $DATA[0]->parcela4_pessoa_juridica ?>" placeholder="5">
              </div>
              <div class="col-lg-5">
                <label for="valor_parcela4_pessoa_juridica">(4º) Valor da Parcela</label>
                <input type="number" class="form-control form-control-user" id="valor_parcela4_pessoa_juridica" name="valor_parcela4_pessoa_juridica" value="<?php echo $DATA[0]->valor_parcela4_pessoa_juridica ?>" placeholder="R$ 2000">
              </div>
              <div class="col-lg-2">
              </div>
            </div>
          </div>
          <div class="form-row center">
            <div class="center">
              <div class="col-lg-5">
                <label for="parcela5_pessoa_juridica">(5º) Parcela</label>
                <input type="number" class="form-control form-control-user" id="parcela5_pessoa_juridica" name="parcela5_pessoa_juridica" value="<?php echo $DATA[0]->parcela5_pessoa_juridica ?>" placeholder="5">
              </div>
              <div class="col-lg-5">
                <label for="valor_parcela5_pessoa_juridica">(5º) Valor da Parcela</label>
                <input type="number" class="form-control form-control-user" id="valor_parcela5_pessoa_juridica" name="valor_parcela5_pessoa_juridica" value="<?php echo $DATA[0]->valor_parcela5_pessoa_juridica ?>" placeholder="R$ 2000">
              </div>
              <div class="col-lg-2">
              </div>
            </div>
          </div>
          <div class="form-row center">
            <div class="center">
              <div class="col-lg-5">
                <label for="parcela6_pessoa_juridica">(6º) Parcela</label>
                <input type="number" class="form-control form-control-user" id="parcela6_pessoa_juridica" name="parcela6_pessoa_juridica" value="<?php echo $DATA[0]->parcela6_pessoa_juridica ?>" placeholder="5">
              </div>
              <div class="col-lg-5">
                <label for="valor_parcela6_pessoa_juridica">(6º) Valor da Parcela</label>
                <input type="number" class="form-control form-control-user" id="valor_parcela6_pessoa_juridica" name="valor_parcela6_pessoa_juridica" value="<?php echo $DATA[0]->valor_parcela6_pessoa_juridica ?>" placeholder="R$ 2000">
              </div>
              <div class="col-lg-2">
              </div>
            </div>
          </div>
          <hr>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-consultor-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-bem-consultor-proximo" class="btn btn-custom-primary">Próximo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="salvarProposta" class="ocultar-componente container container-centered">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Editar de Ficha Pessoa Juridica</h1>
              <h5 class="sub-title">Finalizar Edição</h5>
              <div class="text-danger" id="retornoMsn1">Deseja finalizar a edição ?</div>
            </div>
          </div>
          <hr>
          <br>
          <div class="form-row">
            <div class="col-lg-6 text-center">
              <a href="#" id="btn-salvar-proposta-voltar" class="btn btn-custom-primary">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
              <button id="btn-salvar-proposta-salvar" class="btn btn-custom-primary" type="submit">Salvar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pj/editarPropostaPJ.js"></script>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pj/dinamicsPropostaPJ.js"></script>