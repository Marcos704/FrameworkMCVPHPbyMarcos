<?php
@session_start();
use app\functions\Util;
use app\core\validacao\Valitation;
use app\models\BancoModel;

$responser = new Util();
$validacao = new Valitation();
$dataBanco = new BancoModel();
$arrayInforBancos = $dataBanco->obterRegistros("tb_bancos_administradoras",null,null,null,2,false);

if (!$validacao->SECURITY_BLOCK_SYSTEM("mCadPropostaPF", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Cadastrar | M: PropostaPF | S: False');
}
?>
<div class="container p-1"  style="<?php echo $d;?>">
  <form method="POST" id="cadastrar_ficha_pessoa_fisica">
    <div class="container container-centered">
      <div class="card">
      <?php add("headerCards");?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title">Cadastro de Ficha Pessoa Fisica</h1>
              <h2 id="page-title" class="sub-title">Informações Basicas</h2>
              <div class="text-danger" id="retornoMsn1">*Preencha os Campos</div>
              <hr>
            </div>
          </div>
          <div class="container container-centered">
            <div id="inforBasicas" class="container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-5">
                      <label for="nome_pessoa_fisica">Nome <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="nome_pessoa_fisica" name="nome_pessoa_fisica" placeholder="Nome">
                    </div>
                    <div class="col-lg-3">
                      <label for="data_de_nascimento_pessoa_fisica">Data de Nascimento <small class="text-danger">*</small></label>
                      <input type="Date" class="form-control form-control-user" id="data_de_nascimento_pessoa_fisica" name="data_de_nascimento_pessoa_fisica" placeholder="dd/mm/aaaa">
                    </div>
                    <div class="col-lg-3">
                      <div>
                        <select name="genero_pessoa_fisica" id="genero_pessoa_fisica">
                          <option selected value="null"> - Gênero * - </option>
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-lg-4">
                      <label for="nome_da_mae_pessoa_fisica">Nome da Mãe <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="nome_da_mae_pessoa_fisica" name="nome_da_mae_pessoa_fisica" placeholder="Nome da Mãe">
                    </div>
                    <div class="col-lg-4">
                      <label for="nome_do_pai_pessoa_fisica">Nome do Pai</label>
                      <input type="text" class="form-control form-control-user" id="nome_do_pai_pessoa_fisica" name="nome_do_pai_pessoa_fisica" placeholder="Nome do Pai">
                    </div>
                    <div class="col-lg-2">
                      <label for="cpf_pessoa_fisica">Cpf <small class="text-danger">*</small></label>
                      <input type="hidden" class="form-control form-control-user" id="cpf_pessoa_fisica" name="cpf_pessoa_fisica" value="<?php echo @$_SESSION['cpf']; ?>">
                      <input type="text" class="form-control form-control-user" value="<?php echo @$_SESSION['cpf']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="rg_pessoa_fisica">RG <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="rg_pessoa_fisica" name="rg_pessoa_fisica" placeholder="RG">
                    </div>
                    <div class="col-lg-2">
                      <label for="orgao_expeditor_pessoa_fisica">Orgão Expeditor <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="orgao_expeditor_pessoa_fisica" name="orgao_expeditor_pessoa_fisica" placeholder="Orgão Expeditor">
                    </div>
                    <div class="col-lg-2">
                      <label for="naturalidade_pessoa_fisica">Naturalidade <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="naturalidade_pessoa_fisica" name="naturalidade_pessoa_fisica" placeholder="Naturalidade">
                    </div>
                    <div class="col-lg-2">
                      <label for="nacionalidade_pessoa_fisica">Nacionalidade <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="nacionalidade_pessoa_fisica" name="nacionalidade_pessoa_fisica" placeholder="Nacionalidade">
                    </div>
                    <div class="col-lg-3">
                      <div>
                        <select class="form-control" name="estado_civil_pessoa_fisica" id="estado_civil_pessoa_fisica">
                          <option selected value="null"> - Estado Civil * - </option>
                          <option value="Solteiro(a)">Solteiro(a)</option>
                          <option value="Casado(a)">Casado(a)</option>
                          <option value="Divorciado(a)">Divorciado(a)</option>
                          <option value="Viuvo(a)">Viuvo(a)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-12 text-center">
                      <a href="#" id="btn-prox-infor-basicas-pf" class="btn btn-custom-primary">Proximo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="infoContatoEndereco" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="cep_pessoa_fisica">CEP <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="cep_pessoa_fisica" name="cep_pessoa_fisica" placeholder="CEP">
                    </div>
                    <div class="col-lg-3">
                      <label for="rua_pessoa_fisica">Rua/Avenida <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="rua_pessoa_fisica" name="rua_pessoa_fisica" placeholder="Rua/Avenida">
                    </div>
                    <div class="col-lg-2">
                      <label for="bairro_pessoa_fisica">Bairro <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="bairro_pessoa_fisica" name="bairro_pessoa_fisica" placeholder="Bairro">
                    </div>
                    <div class="col-lg-1">
                      <label for="numero_pessoa_fisica">Numero <small class="text-danger">*</small></label>
                      <input type="number" class="form-control form-control-user" id="numero_pessoa_fisica" name="numero_pessoa_fisica" placeholder="N°">
                    </div>
                    <div class="col-lg-2">
                      <label for="cidade_pessoa_fisica">Cidade <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="cidade_pessoa_fisica" name="cidade_pessoa_fisica" placeholder="Cidade">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-4">
                      <label for="complemento_pessoa_fisica">Complemento</label>
                      <input type="text" class="form-control form-control-user" id="complemento_pessoa_fisica" name="complemento_pessoa_fisica" placeholder="Complemento">
                    </div>
                    <div class="col-lg-1">
                      <label for="estado_pessoa_fisica">UF <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="estado_pessoa_fisica" name="estado_pessoa_fisica" placeholder="UF">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-3">
                      <label for="celular_pessoa_fisica">Celular <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="celular_pessoa_fisica" name="celular_pessoa_fisica" placeholder="(00) 1 2345-6789">
                    </div>
                    <div class="col-lg-3">
                      <label for="telefone_fixo_pessoa_fisica">Telefone <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="telefone_fixo_pessoa_fisica" name="telefone_fixo_pessoa_fisica" placeholder="(00) 1234-5678">
                    </div>
                    <div class="col-lg-4">
                      <label for="email_pessoa_fisica">Email <small class="text-danger">*</small></label>
                      <input type="email" class="form-control form-control-user" id="email_pessoa_fisica" name="email_pessoa_fisica" placeholder="Email">
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
            <div id="infoDadosFinanceiros" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="profissao_pessoa_fisica">Profissão <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="profissao_pessoa_fisica" name="profissao_pessoa_fisica" placeholder="Profissão">
                    </div>
                    <div class="col-lg-3">
                      <label for="empresa_empregadora_pessoa_fisica">Empresa Empregadora <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="empresa_empregadora_pessoa_fisica" name="empresa_empregadora_pessoa_fisica" placeholder="Empresa Empregadora">
                    </div>
                    <div class="col-lg-2">
                      <label for="renda_mensal_pessoa_fisica">Renda Mensal <small class="text-danger">*</small></label>
                      <input class="form-control form-control-user" type="number" id="renda_mensal_pessoa_fisica" name="renda_mensal_pessoa_fisica" placeholder="Renda Mensal">
                    </div>
                    <div class="col-lg-2">
                      <div>
                        <select name="score_pessoa_fisica" id="score_pessoa_fisica">
                          <option selected value="null"> - Score * - </option>
                          <option value="Sim">Sim</option>
                          <option value="Não">Não</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-2">
                      <div>
                        <select name="ppe_pessoa_fisica" id="ppe_pessoa_fisica">
                          <option selected value="null"> - PPE * - </option>
                          <option value="Sim">Sim</option>
                          <option value="Não">Não</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div>
                        <select name="casa_propria_pessoa_fisica" id="casa_propria_pessoa_fisica">
                          <option selected value="null"> - Casa Propria * - </option>
                          <option value="Sim">Sim</option>
                          <option value="Nao">Não</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <label for="valor_aluguel_pessoa_fisica">Valor do Aluguel <small class="text-danger">*</small></label>
                      <input class="form-control form-control-user" type="number" id="valor_aluguel_pessoa_fisica" name="valor_aluguel_pessoa_fisica" placeholder="Valor do Aluguel">
                      <div id="alugel_false"></div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-4">
                      <label for="referencia_pessoal_pessoa_fisica">Referencia Pessoal <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="referencia_pessoal_pessoa_fisica" name="referencia_pessoal_pessoa_fisica" placeholder="Referencia Pessoal">
                    </div>
                    <div class="col-lg-3">
                      <label for="telefone_pessoal_pessoa_fisica">Telefone <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="telefone_pessoal_pessoa_fisica" name="telefone_pessoal_pessoa_fisica" placeholder="(00) 1234-5678">
                    </div>
                    <div class="col-lg-2">
                      <label for="grau_parentesco_pessoa_fisica">Grau de Parentesco <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="grau_parentesco_pessoa_fisica" name="grau_parentesco_pessoa_fisica" placeholder="Grau de Parentesco">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-3">
                      <div>
                        <select id="patrimonio_select">
                          <option selected value="null"> - Possui Patrimonio *- </option>
                          <option value="0">Não possui</option>
                          <option value="1">1 - Patrimonio</option>
                          <option value="2">2 - Patrimonios</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div>
                        <select id="tipo_bem_pessoa_fisica">
                          <option selected value="null"> - Tipo de Bem * - </option>
                          <option value="imovel">Imovel</option>
                          <option value="veiculo">Veiculo</option>
                          <option value="servico">Serviço</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-5">
                      <label for="primeiro_patrimonio_pessoa_fisica">Patrimonio/bem <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="primeiro_patrimonio_pessoa_fisica" name="primeiro_patrimonio_pessoa_fisica" placeholder="Patrimonio/Bem" value="0" disabled>
                      <div id="pt1"></div>
                    </div>
                    <div class="col-lg-3">
                      <label for="valor_primeiro_patrimonio_pessoa_fisica">Valor <small class="text-danger">*</small></label>
                      <input type="text" type="number" class="form-control form-control-user" id="valor_primeiro_patrimonio_pessoa_fisica" name="valor_primeiro_patrimonio_pessoa_fisica" placeholder="Valor" value="0" disabled>
                      <div id="ptv1"></div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-5">
                      <label for="segundo_patrimonio_pessoa_fisica">Patrimonio/bem</label>
                      <input type="text" class="form-control form-control-user" id="segundo_patrimonio_pessoa_fisica" name="segundo_patrimonio_pessoa_fisica" placeholder="Patrimonio/Bem" value="0" disabled>
                      <div id="pt2"></div>
                    </div>
                    <div class="col-lg-3">
                      <label for="valor_segundo_patrimonio_pessoa_fisica">Valor*</label>
                      <input type="text" type="number" class="form-control form-control-user" id="valor_segundo_patrimonio_pessoa_fisica" name="valor_segundo_patrimonio_pessoa_fisica" placeholder="Valor" value="0" disabled>
                      <div id="ptv2"></div>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-6 text-center">
                      <a href="#" id="btn-financeiro-voltar" class="btn btn-custom-primary">Voltar</a>
                    </div>
                    <div class="col-lg-6 text-center">
                      <a href="#" id="btn-financeiro-proximo" class="btn btn-custom-primary">Proximo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="infoBemImovel" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="tipo_imovel_pessoa_fisica">Tipo de Imovel <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="tipo_imovel_pessoa_fisica" name="tipo_imovel_pessoa_fisica" placeholder="Casa">
                    </div>
                    <div class="col-lg-2">
                      <label for="utilidade_imovel_pessoa_fisica">Finalidade <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="utilidade_imovel_pessoa_fisica" name="utilidade_imovel_pessoa_fisica" placeholder="Residencial">
                    </div>
                    <div class="col-lg-4">
                      <label for="observacao_imovel_pessoa_fisica">Observação <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="observacao_imovel_pessoa_fisica" name="observacao_imovel_pessoa_fisica" placeholder="Observação">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="cep_imovel_pessoa_fisica">CEP <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="cep_imovel_pessoa_fisica" name="cep_imovel_pessoa_fisica" placeholder="CEP">
                    </div>
                    <div class="col-lg-3">
                      <label for="rua_imovel_pessoa_fisica">Rua/Avenida <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="rua_imovel_pessoa_fisica" name="rua_imovel_pessoa_fisica" placeholder="Rua/Avenida">
                    </div>
                    <div class="col-lg-2">
                      <label for="bairro_imovel_pessoa_fisica">Bairro <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="bairro_imovel_pessoa_fisica" name="bairro_imovel_pessoa_fisica" placeholder="Bairro">
                    </div>
                    <div class="col-lg-1">
                      <label for="numero_imovel_pessoa_fisica ">Nº <small class="text-danger">*</small></label>
                      <input type="number" class="form-control form-control-user" id="numero_imovel_pessoa_fisica" name="numero_imovel_pessoa_fisica" placeholder="N°">
                    </div>
                    <div class="col-lg-2">
                      <label for="cidade_imovel_pessoa_fisica">Cidade <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="cidade_imovel_pessoa_fisica" name="cidade_imovel_pessoa_fisica" placeholder="Cidade">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-4">
                      <label for="complemento_imovel_pessoa_fisica">Complemento</label>
                      <input type="text" class="form-control form-control-user" id="complemento_imovel_pessoa_fisica" name="complemento_imovel_pessoa_fisica" placeholder="Complemento">
                    </div>
                    <div class="col-lg-1">
                      <label for="estado_imovel_pessoa_fisica">UF <small class="text-danger">*</small></label>
                      <input type="text" class="form-control form-control-user" id="estado_imovel_pessoa_fisica" name="estado_imovel_pessoa_fisica" placeholder="UF">
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
            <div id="infoBemVeiculo" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-2">
                      <select id="tipo_veiculo_pessoa_fisica" name="tipo_veiculo_pessoa_fisica">
                        <option selected value="null"> - Veiculo - </option>
                        <option value="Carro">Carro</option>
                        <option value="Caminhão">Caminhão</option>
                        <option value="Moto">Moto</option>
                      </select>
                    </div>
                    <div class="col-lg-3">
                      <select id="estado_veiculo_pessoa_fisica" name="estado_veiculo_pessoa_fisica">
                        <option selected value="null"> - Estado do Veiculo - </option>
                        <option value="Novo">Novo</option>
                        <option value="Semi-novo">Semi-novo</option>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="marca_veiculo_pessoa_fisica">Marca do Veiculo</label>
                      <input type="Text" class="form-control form-control-user" id="marca_veiculo_pessoa_fisica" name="marca_veiculo_pessoa_fisica" placeholder="Marca do Veiculo">
                    </div>
                    <div class="col-lg-2">
                      <label for="modelo_veiculo_pessoa_fisica">Modelo</label>
                      <input type="text" class="form-control form-control-user" id="modelo_veiculo_pessoa_fisica" name="modelo_veiculo_pessoa_fisica" placeholder="Modelo">
                    </div>
                    <div class="col-lg-1">
                      <label for="ano_veiculo_pessoa_fisica">Ano do Modelo</label>
                      <input type="number" class="form-control form-control-user" id="ano_veiculo_pessoa_fisica" name="ano_veiculo_pessoa_fisica" placeholder="2022">
                    </div>
                    <div class="col-lg-1">
                      <label for="ano_fabricacao_veiculo_pessoa_fisica">Ano de Fabricação</label>
                      <input type="number" class="form-control form-control-user" id="ano_fabricacao_veiculo_pessoa_fisica" name="ano_fabricacao_veiculo_pessoa_fisica" placeholder="2022">
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
            <div id="infoBemServico" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-2">
                      <label for="nome_servico_pessoa_fisica">Nome do Serviço</label>
                      <input type="text" class="form-control form-control-user" id="nome_servico_pessoa_fisica" name="nome_servico_pessoa_fisica" placeholder="Nome do serviço">
                    </div>
                    <div class="col-lg-2">
                      <label for="tipo_servico_pessoa_fisica">Tipo de Serviço</label>
                      <input type="text" class="form-control form-control-user" id="tipo_servico_pessoa_fisica" name="tipo_servico_pessoa_fisica" placeholder="Tipo de Serviço">
                    </div>
                    <div class="col-lg-5">
                      <label for="descricao_servico_pessoa_fisica">Descrição do Serviço</label>
                      <textarea class="form-control form-control-user-text-area" id="descricao_servico_pessoa_fisica" name="descricao_servico_pessoa_fisica" value="Em analise"></textarea>
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
            <div id="infoConsultor" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
                  <div class="form-row">
                    <div class="col-lg-6">
                      <label for="consultor_analise_pessoa_fisica">Consultor</label>
                      <input type="text" class="form-control form-control-user" id="consultor_analise_pessoa_fisica" id="consultor_analise_pessoa_fisica" placeholder="<?php echo @$_SESSION['nome_usuario'] ?>" disabled>
                      <input type="hidden" class="form-control form-control-user" name="consultor_analise_pessoa_fisica" value="<?php echo @$_SESSION['nome_usuario'] ?>">
                    </div>
                    <div class="col-lg-2">
                      <label for="data_atendimento_pessoa_fisica">Data de criação</label>
                      <input type="date" class="form-control form-control-user" value="<?php echo date('Y-m-d') ?>" placeholder="20/09/2022" id="data_atendimento_pessoa_fisica" disabled>
                      <input type="hidden" class="form-control form-control-user" name="data_atendimento_pessoa_fisica" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col-lg-2">
                      <label for="validade_proposta_pessoa_fisica">Validade da proposta</label>
                      <input type="date" class="form-control form-control-user" id="validade_proposta_pessoa_fisica" name="validade_proposta_pessoa_fisica" value="24/09/2022">
                    </div>
                    <div class="col-lg-2">
                      <label for="estado_analise_pessoa_fisica">Estado da proposta</label>
                      <input type="text" class="form-control form-control-user" value="Em analise" disabled>
                      <input type="hidden" class="form-control form-control-user" name="estado_analise_pessoa_fisica" value="Em analise">
                    </div>
                  </div>
                  <div class="form-row center">
                    <div class="col-md-2">
                      <select id="cnpj_bancos" name="cnpj_banco">
                        <option selected value="null"> - Banco/Adm - </option>
                        <?php
                            for ($i = 0; $i < count($arrayInforBancos); $i++) {
                              foreach ($arrayInforBancos[$i] as $key => $value) {
                            }?>
                            <option value="<?php echo $arrayInforBancos[$i]['nome_banco_administradora']?>"><?php echo $arrayInforBancos[$i]['nome_banco_administradora']?></option>
                            <?php }?>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="valor_bruto_pessoa_fisica">Valor do Credito</label>
                      <input type="number" class="form-control form-control-user" id="valor_bruto_pessoa_fisica" name="valor_bruto_pessoa_fisica" placeholder="R$ 2000">
                    </div>
                    <div class="col-md-3">
                      <select id="tipo_credito_pessoa_fisica" name="tipo_credito_pessoa_fisica">
                        <option selected value="null"> - Tipo de Credito - </option>
                        <option value="CDC">CDC</option>
                        <option value="Consorcio">Consorcio</option>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="valor_adesao_pessoa_fisica">Valor de Adesão</label>
                      <input type="number" class="form-control form-control-user" id="valor_adesao_pessoa_fisica" name="valor_adesao_pessoa_fisica" placeholder="R$ 2000">
                    </div>
                  </div>
                  <hr>
                  <div class="center">
                    <h5>Preenchimento de Parcelas</h5>
                  </div>
                  <div class="form-row center">
                    <div class="center">
                      <div class="col-lg-5">
                        <label for="parcela1_pessoa_fisica">(1º) Parcela</label>
                        <input type="number" class="form-control form-control-user" id="parcela1_pessoa_fisica" name="parcela1_pessoa_fisica" placeholder="5">
                      </div>
                      <div class="col-lg-5">
                        <label for="valor_parcela1_pessoa_fisica">(1º) Valor da Parcela</label>
                        <input type="number" class="form-control form-control-user" id="valor_parcela1_pessoa_fisica" name="valor_parcela1_pessoa_fisica" placeholder="R$ 2000">
                      </div>
                      <div class="col-lg-2">
                      </div>
                    </div>
                  </div>
                  <div class="form-row center">
                    <div class="center">
                      <div class="col-lg-5">
                        <label for="parcela2_pessoa_fisica">(2º) Parcela</label>
                        <input type="number" class="form-control form-control-user" id="parcela2_pessoa_fisica" name="parcela2_pessoa_fisica" placeholder="5">
                      </div>
                      <div class="col-lg-5">
                        <label for="valor_parcela2_pessoa_fisica">(2º) Valor da Parcela</label>
                        <input type="number" class="form-control form-control-user" id="valor_parcela2_pessoa_fisica" name="valor_parcela2_pessoa_fisica" placeholder="R$ 2000">
                      </div>
                      <div class="col-lg-2">
                      </div>
                    </div>
                  </div>
                  <div class="form-row center">
                    <div class="center">
                      <div class="col-lg-5">
                        <label for="parcela3_pessoa_fisica">(3º) Parcela</label>
                        <input type="number" class="form-control form-control-user" id="parcela3_pessoa_fisica" name="parcela3_pessoa_fisica" placeholder="5">
                      </div>
                      <div class="col-lg-5">
                        <label for="valor_parcela3_pessoa_fisica">(3º) Valor da Parcela</label>
                        <input type="number" class="form-control form-control-user" id="valor_parcela3_pessoa_fisica" name="valor_parcela3_pessoa_fisica" placeholder="R$ 2000">
                      </div>
                      <div class="col-lg-2">
                      </div>
                    </div>
                  </div>
                  <div class="form-row center">
                    <div class="center">
                      <div class="col-lg-5">
                        <label for="parcela4_pessoa_fisica">(4º) Parcela</label>
                        <input type="number" class="form-control form-control-user" id="parcela4_pessoa_fisica" name="parcela4_pessoa_fisica" placeholder="5">
                      </div>
                      <div class="col-lg-5">
                        <label for="valor_parcela4_pessoa_fisica">(4º) Valor da Parcela</label>
                        <input type="number" class="form-control form-control-user" id="valor_parcela4_pessoa_fisica" name="valor_parcela4_pessoa_fisica" placeholder="R$ 2000">
                      </div>
                      <div class="col-lg-2">
                      </div>
                    </div>
                  </div>
                  <div class="form-row center">
                    <div class="center">
                      <div class="col-lg-5">
                        <label for="parcela5_pessoa_fisica">(5º) Parcela</label>
                        <input type="number" class="form-control form-control-user" id="parcela5_pessoa_fisica" name="parcela5_pessoa_fisica" placeholder="5">
                      </div>
                      <div class="col-lg-5">
                        <label for="valor_parcela5_pessoa_fisica">(5º) Valor da Parcela</label>
                        <input type="number" class="form-control form-control-user" id="valor_parcela5_pessoa_fisica" name="valor_parcela5_pessoa_fisica" placeholder="R$ 2000">
                      </div>
                      <div class="col-lg-2">
                      </div>
                    </div>
                  </div>
                  <div class="form-row center">
                    <div class="center">
                      <div class="col-lg-5">
                        <label for="parcela6_pessoa_fisica">(6º) Parcela</label>
                        <input type="number" class="form-control form-control-user" id="parcela6_pessoa_fisica" name="parcela6_pessoa_fisica" placeholder="5">
                      </div>
                      <div class="col-lg-5">
                        <label for="valor_parcela6_pessoa_fisica">(6º) Valor da Parcela</label>
                        <input type="number" class="form-control form-control-user" id="valor_parcela6_pessoa_fisica" name="valor_parcela6_pessoa_fisica" placeholder="R$ 2000">
                      </div>
                      <div class="col-lg-2">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-6 text-center">
                      <a href="#"id="btn-bem-consultor-voltar" class="btn btn-custom-primary">Voltar</a>
                    </div>
                    <div class="col-lg-6 text-center">
                      <a href="#" id="btn-bem-consultor-proximo" class="btn btn-custom-primary" >Proximo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="salvarProposta" class="ocultar-componente container-centered">
              <div class="box-form-control">
                <div class="box-form-control">
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
          </div>
        </div>
      </div>
    </div>
  </form>
</div>



<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pf/dinamicsPropostaPF.js"></script>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pf/gerarPropostaPF.js"></script>