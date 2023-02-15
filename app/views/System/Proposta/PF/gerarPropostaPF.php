<?php
@session_start();

use app\functions\Util;
use app\core\validacao\Valitation;
use app\models\BancoModel;

$responser = new Util();
$validacao = new Valitation();
$dataBanco = new BancoModel();
$arrayInforBancos = $dataBanco->obterRegistros("tb_bancos_administradoras", null, null, null, 2, false);

if (!$validacao->SECURITY_BLOCK_SYSTEM("mCadPropostaPF", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Cadastrar | M: PropostaPF | S: False');
}
?>
<div class="container p-1" style="<?php echo $d; ?>">
  <form method="POST" id="cadastrar_ficha_pessoa_fisica">
    <div class="container container-centered">
      <div class="card">
        <?php add("headerCards"); ?>
        <div class="card-body">
          <div id="inforIniciais" class="container-centered">
            <div class="col-xl-12">
              <h2 style="text-align: center;">Informações Básicas</h2>
              <div class="col-xl-12 etapaform">

                <div class="form-row">

                  <div class="col-xl-5">
                    <label for="nome_pessoa_fisica"> Nome Completo</label>
                    <input type="text" class="form-control" name="nome_pessoa_fisica" id="nome_pessoa_fisica" placeholder="Nome" data-obrigatorio>
                  </div>

                  <div class="col-xl-3">
                    <label for="data_de_nascimento_pessoa_fisica"> Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_de_nascimento_pessoa_fisica" id="data_de_nascimento_pessoa_fisica" placeholder="2022-2-2" data-obrigatorio>
                  </div>

                  <div class="col-xl-4">
                    <label for="genero_pessoa_fisica"> Gênero </label>
                    <select class="form-control" id="genero_pessoa_fisica" name="genero_pessoa_fisica" aria-label="Genero" data-obrigatorio>
                      <option selected disabled value="null">Escolha aqui</option>
                      <option value="masculino"> Masculino </option>
                      <option value="feminino"> Feminino </option>
                      <option value="Prefiro não dizer"> Prefiro não dizer </option>
                    </select>
                  </div>

                </div>

                <div class="form-row">

                  <div class="col-xl-4">
                    <label for="nome_da_mae_pessoa_fisica"> Nome da Mãe </label>
                    <input type="text" class="form-control" name="nome_da_mae_pessoa_fisica" id="nome_da_mae_pessoa_fisica" placeholder="Nome da mãe" data-obrigatorio>
                  </div>

                  <div class="col-xl-4">
                    <label for="nome_do_pai_pessoa_fisica"> Nome do pai </label>
                    <input type="text" class="form-control" name="nome_do_pai_pessoa_fisica" id="nome_do_pai_pessoa_fisica" placeholder="Nome do pai">
                  </div>

                  <div class="col-xl-4">
                    <label for="cpf_pessoa_fisica"> CPF </label>
                    <input type="hidden" class="form-control" id="cpf_pessoa_fisica" name="cpf_pessoa_fisica" value="<?php echo @$_SESSION['cpf']; ?>">
                    <input type="text" class="form-control" value="<?php echo @$_SESSION['cpf']; ?>" disabled>
                  </div>

                </div>

                <div class="form-row">

                  <div class="col-xl-3">
                    <label for="naturalidade_pessoa_fisica">Naturalidade</label>
                    <input type="text" class="form-control" name="naturalidade_pessoa_fisica" id="naturalidade_pessoa_fisica" placeholder="Naturalidade" data-obrigatorio>
                  </div>

                  <div class="col-xl-3">
                    <label for="nacionalidade_pessoa_fisica">Nacionalidade</label>
                    <input type="text" class="form-control" name="nacionalidade_pessoa_fisica" id="nacionalidade_pessoa_fisica" placeholder="Nacionalidade" data-obrigatorio>
                  </div>

                  <div class="col-xl-3">
                    <label for="rg_pessoa_fisica"> Número do RG </label>
                    <input type="text" class="form-control" name="rg_pessoa_fisica" id="rg_pessoa_fisica" placeholder="Número do RG" data-obrigatorio data-rg>
                  </div>

                  <div class="col-xl-3">
                    <label for="orgao_expeditor_pessoa_fisica"> Orgão Expedidor</label>
                    <input type="text" class="form-control" name="orgao_expeditor_pessoa_fisica" id="orgao_expeditor_pessoa_fisica" placeholder="Orgão Expedidor" data-obrigatorio>
                  </div>

                </div>

                <div class="row">

                  <div class="col-xl-4">
                    <label for="estado_civil_pessoa_fisica">Estado Civil</label>
                    <select class="form-control form-selecao" name="estado_civil_pessoa_fisica" id="estado_civil_pessoa_fisica" data-obrigatorio>
                      <option selected disabled value="null">Escolha aqui</option>
                      <option value="solteiro">Solteiro</option>
                      <option value="casado">Casado</option>
                      <option value="divorciado">Divorciado</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 etapaform">
              <h2 style="text-align: center; margin-top:2rem;">Contato e Endereço</h2>

              <div class="form-row">

                <div class="col-xl-3">
                  <label for="celular_pessoa_fisica">Núm. do Celular </label>
                  <input type="text" class="form-control" name="celular_pessoa_fisica" id="celular_pessoa_fisica" placeholder="(01) 23456-7890" required>
                </div>

                <div class="col-xl-3">
                  <label for="telefone_fixo_pessoa_fisica">Telefone Residencial </label>
                  <input type="text" class="form-control" name="telefone_fixo_pessoa_fisica" id="telefone_fixo_pessoa_fisica" placeholder="1234-5678">
                </div>

                <div class="col-xl-6">
                  <label for="email_pessoa_fisica">E-mail </label>
                  <input type="text" class="form-control" name="email_pessoa_fisica" id="email_pessoa_fisica" placeholder="exemplo@email.com" required>

                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-3">
                  <label for="cep_pessoa_fisica">CEP</label>
                  <input type="text" class="form-control" name="cep_pessoa_fisica" id="cep_pessoa_fisica" placeholder="01234-567" required>
                </div>

                <div class="col-xl-6">
                  <label for="rua_pessoa_fisica">Rua/Avenida </label>
                  <input type="text" class="form-control" name="rua_pessoa_fisica" id="rua_pessoa_fisica" placeholder="Nome da Rua/Avenida" required>
                </div>

                <div class="col-xl-3">
                  <label for="bairro_pessoa_fisica">Bairro</label>
                  <input type="text" class="form-control" name="bairro_pessoa_fisica" id="bairro_pessoa_fisica" placeholder="Bairro" required>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="complemento_pessoa_fisica">Complemento</label>
                  <input type="text" class="form-control" name="complemento_pessoa_fisica" id="complemento_pessoa_fisica" placeholder="Complemento">
                </div>

                <div class="col-xl-2">
                  <label for="numero_pessoa_fisica">Núm.</label>
                  <input type="text" class="form-control" name="numero_pessoa_fisica" id="numero_pessoa_fisica" placeholder="N." required>
                </div>

                <div class="col-xl-4">
                  <label for="cidade_pessoa_fisica"> Cidade </label>
                  <input type="text" class="form-control" name="cidade_pessoa_fisica" id="cidade_pessoa_fisica" placeholder="Cidade" required>
                </div>

                <div class="col-xl-2">
                  <label for="estado_pessoa_fisica"> UF</label>
                  <input type="text" class="form-control" name="estado_pessoa_fisica" id="estado_pessoa_fisica" placeholder="UF" required>
                </div>

              </div>

            </div>

            <div class="col-xl-12 etapaform">

              <h2 style="text-align: center; margin-top:2rem;">Dados Financeiros</h2>

              <div class="form-row">

                <div class="col-xl-3">
                  <label for="profissao_pessoa_fisica">Profissão</label>
                  <input type="text" class="form-control" name="profissao_pessoa_fisica" id="profissao_pessoa_fisica" placeholder="Profissão" required>
                </div>

                <div class="col-xl-3">
                  <label for="empresa_empregadora_pessoa_fisica">Empresa</label>
                  <input type="text" class="form-control" name="empresa_empregadora_pessoa_fisica" id="empresa_empregadora_pessoa_fisica" placeholder="Empresa Empregadora" required>
                </div>

                <div class="col-xl-3">
                  <label for="renda_mensal_pessoa_fisica">Renda mensal </label>
                  <input type="text" class="form-control" name="renda_mensal_pessoa_fisica" id="renda_mensal_pessoa_fisica" placeholder="Renda mensal" required>

                </div>

                <div class="col-xl 2">
                  <label for="score_pessoa_fisica">Score</label>
                  <select class="form-control" name="score_pessoa_fisica" id="score_pessoa_fisica" required placeholder="Score">
                    <option disabled selected>Score</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                  </select>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-3">
                  <label for="ppe_pessoa_fisica">PPE</label>
                  <select class="form-control" name="ppe_pessoa_fisica" id="ppe_pessoa_fisica" required placeholder="PPE">
                    <option disabled selected>PPE</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                  </select>
                </div>

                <div class="col-xl-3">
                  <label for="casa_propria_pessoa_fisica">Casa própria</label>
                  <select class="form-control" name="casa_propria_pessoa_fisica" id="casa_propria_pessoa_fisica" required placeholder="Casa Própria">
                    <option disabled selected>Casa própria</option>
                    <option value="sim">Sim</option>
                    <option value="não">Não</option>
                  </select>
                </div>

                <div class="col-xl-3">
                  <label for="valor_aluguel_pessoa_fisica"> Aluguel</label>
                  <input type="text" class="form-control" name="valor_aluguel_pessoa_fisica" id="valor_aluguel_pessoa_fisica" placeholder="Aluguel">
                </div>

                <div class="col-xl-3">
                  <label for="patrimonio">Casa própria</label>
                  <select class="form-control" name="patrimonio" id="patrimonio" required placeholder="Patrimônio" required>
                    <option disabled selected>Patrimônio</option>
                    <option value="true">Tem</option>
                    <option value="false">Não tem</option>
                  </select>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="referencia_pessoal_pessoa_fisica">Referência Pessoal</label>
                  <input type="text" class="form-control" name="referencia_pessoal_pessoa_fisica" id="referencia_pessoal_pessoa_fisica" placeholder="Nome da referência pessoal" required>
                </div>

                <div class="col-xl-2">
                  <label for="grau_parentesco_pessoa_fisica">Parentesco</label>
                  <input type="text" class="form-control" name="grau_parentesco_pessoa_fisica" id="grau_parentesco_pessoa_fisica" placeholder="Parentesco" required>
                </div>

                <div class="col-xl-3">
                  <label for="telefone_pessoal_pessoa_fisica">Celular</label>
                  <input type="text" class="form-control" name="telefone_pessoal_pessoa_fisica" id="telefone_pessoal_pessoa_fisica" placeholder="Celular" required>
                </div>

                <div class="col-xl-3">
                  <label for="bem">Bem</label>
                  <select class="form-control" name="bem" id="bem" required placeholder="Bem" required>
                    <option disabled selected>Bem</option>
                    <option value="imovel">Imóvel</option>
                    <option value="veiculo">Veículo</option>
                    <option value="Servico">Serviço</option>
                  </select>

                </div>

              </div>

              <h3 style="margin-top: 2rem;">Patrimônio</h3>

              <div class="form-row">

                <div class="col-xl-8">
                  <label for="primeiro_patrimonio_pessoa_fisica">Patrimônio</label>
                  <input type="text" class="form-control" name="valor_primeiro_patrimonio_pessoa_fisica" id="valor_primeiro_patrimonio_pessoa_fisica" placeholder="Patrimônio">
                </div>

                <div class="col-xl-4">
                  <label for="valor_primeiro_patrimonio_pessoa_fisica">Valor</label>
                  <input type="text" class="form-control" name="valor_primeiro_patrimonio_pessoa_fisica" id="valor_primeiro_patrimonio_pessoa_fisica" placeholder="Valor">
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-8">
                  <label for="segundo_patrimonio_pessoa_fisica">Patrimônio</label>
                  <input type="text" class="form-control" name="segundo_patrimonio_pessoa_fisica" id="segundo_patrimonio_pessoa_fisica" placeholder="Patrimônio">
                </div>

                <div class="col-xl-4">
                  <label for="valor_segundo_patrimonio_pessoa_fisica">Valor</label>
                  <input type="text" class="form-control" name="valor_segundo_patrimonio_pessoa_fisica" id="valor_segundo_patrimonio_pessoa_fisica" placeholder="Valor">
                </div>

              </div>
              <div class="text-center">
                <br>
                <div class="form-row">
                  <div class="col-lg-12 text-center">
                    <a href="#" id="btn-patrimonio-proximo" class="btn btn-custom-primary">Proximo</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div id="infoBemImovel" class="ocultar-componente container-centered">
            <div class="col-xl-12 etapaform">
              <h2 style="text-align: center; margin-top:2rem;">Imóvel</h2>

              <div class="form-row">

                <div class="col-xl-2">
                  <label for="tipo_imovel_pessoa_fisica">Tipo de Imovel</label>
                  <select class="form-control" id="tipo_imovel_pessoa_fisica" required placeholder="Tipo de Imovel" required>
                    <option disabled selected>Tipo de Imovel</option>
                    <option value="Casa">Casa</option>
                    <option value="Terreno">Terreno</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Construção">Construção</option>
                  </select>
                </div>
                <div class="col-xl-2">
                  <label for="cep_imovel_pessoa_fisica">CEP do imóvel</label>
                  <input type="text" class="form-control" name="cep_imovel_pessoa_fisica" placeholder="CEP">
                </div>

                <div class="col-xl-6">
                  <label for="rua_imovel_pessoa_fisica">Endereço do imóvel </label>
                  <input type="text" class="form-control" name="rua_imovel_pessoa_fisica" placeholder="Rua/Avenida">
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-2">
                  <label for="utilidade_imovel_pessoa_fisica">Finalidade</label>
                  <select class="form-control" id="utilidade_imovel_pessoa_fisica" required placeholder="Finalidade" required>
                    <option disabled selected>Finalidade</option>
                    <option value="Residencial">Residencial</option>
                    <option value="Investimento">Investimento</option>
                    <option value="Negócio">Negócio</option>
                  </select>
                </div>

                <div class="col-xl-2">
                  <label for="tipo_imovel_zona_pessoa_fisica">Zona</label>
                  <select class="form-control" id="tipo_imovel_zona_pessoa_fisica" required placeholder="Zona" required>
                    <option disabled selected>Zona</option>
                    <option value="Rural">Rural</option>
                    <option value="Urbana">Urbana</option>
                  </select>
                </div>

                <div class="col-xl-3">
                  <label for="bairro_imovel_pessoa_fisica"> Bairro do imóvel </label>
                  <input type="text" class="form-control" name="bairro_imovel_pessoa_fisica" placeholder="Bairro">
                </div>

                <div class="col-xl-5">
                  <label for="complemento_imovel_pessoa_fisica">Complemento do imóvel</label>
                  <input type="text" class="form-control" name="complemento_imovel_pessoa_fisica" placeholder="Complemento">
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-3">
                  <label for="numero_imovel_pessoa_fisica">Número</label>
                  <input type="text" class="form-control" name="numero_imovel_pessoa_fisica" placeholder="Número">
                </div>


                <div class="col-xl-3">
                  <label for="cidade_imovel_pessoa_fisica">Cidade</label>
                  <input type="text" class="form-control" name="cidade_imovel_pessoa_fisica" placeholder="Cidade">
                </div>

                <div class="col-xl-3">
                  <label for="estado_imovel_pessoa_fisica">UF</label>
                  <input type="text" class="form-control" name="estado_imovel_pessoa_fisica" placeholder="UF">
                </div>

              </div>

              <div class="form-row">
                <div class="col-xl-12">
                  <label for="observacao_imovel_pessoa_fisica">Observações</label>
                  <textarea name="observacao_imovel_pessoa_fisica" class="form-control" placeholder="Relate informações adicionais"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div id="infoBemVeiculo" class="ocultar-componente container-centered">
            <div class="col-xl-12 etapaform">
              <h2 style="text-align: center; margin-top:2rem;">Veículo</h2>

              <div class="form-row">

                <div class="col-xl-2">
                  <label for="tipo_veiculo_pessoa_fisica">Tipo de veículo </label>
                  <select class="form-control" id="tipo_veiculo_pessoa_fisica" name="tipo_veiculo_pessoa_fisica" required>
                    <option selected disabled>Veículo</option>
                    <option value="carro">Carro</option>
                    <option value="moto">Moto</option>
                    <option value="caminhao">Caminhão</option>
                  </select>
                </div>

                <div class="col-xl-2">
                  <label for="estado_veiculo_pessoa_fisica">Estado</label>
                  <input type="text" class="form-control" name="estado_veiculo_pessoa_fisica" placeholder="Estado">
                </div>

                <div class="col-xl-2">
                  <label for="marca_veiculo_pessoa_fisica">Marca do veículo</label>
                  <input type="text" class="form-control" name="marca_veiculo_pessoa_fisica" placeholder="Marca">
                </div>

                <div class="col-xl-2">
                  <label for="modelo_veiculo_pessoa_fisica">Modelo do veículo</label>
                  <input type="text" class="form-control" name="modelo_veiculo_pessoa_fisica" placeholder="Modelo">
                </div>

                <div class="col-xl-2">
                  <label for="ano_veiculo_pessoa_fisica">Ano do modelo</label>
                  <input type="text" class="form-control" name="ano_veiculo_pessoa_fisica" placeholder="Ano do modelo">
                </div>

                <div class="col-xl-2">
                  <label for="ano_fabricacao_veiculo_pessoa_fisica">Ano de fabricação</label>
                  <input type="text" class="form-control" name="ano_fabricacao_veiculo_pessoa_fisica" placeholder="Ano de fabricação">
                </div>

              </div>
            </div>
          </div>
          <div id="infoBemServico" class="ocultar-componente container-centered">
            <div class="col-xl-12 etapaform">
              <h2 style="text-align: center; margin-top:2rem;">Serviço</h2>

              <div class="form-row">

                <div class="col-xl-6">
                  <label for="nome_servico_pessoa_fisica">Nome do serviço</label>
                  <input type="text" class="form-control" name="nome_servico_pessoa_fisica" placeholder="Nome">
                </div>

                <div class="col-xl-6">
                  <label for="tipo_servico_pessoa_fisica">Tipo de serviço</label>
                  <input type="text" class="form-control" name="tipo_servico_pessoa_fisica" placeholder="Tipo">
                </div>

              </div>

              <div class="form-row">
                <div class="col-xl-12">
                  <label for="descricao_servico_pessoa_fisica">Descrição do serviço</label>
                  <textarea name="descricao_servico_pessoa_fisica" class="form-control" placeholder="Descreva o serviço em questão"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div id="infoConsultor" class="ocultar-componente container-centered">
            <div class="col-xl-12 etapaform">
              <h2 style="text-align: center; margin-top:2rem;">Proposta</h2>

              <div class="form-row">

                <div class="col-xl-5">
                  <label for="consultor_analise_pessoa_fisica">Nome do consultor</label>
                  <input type="text" class="form-control" name="consultor_analise_pessoa_fisica" placeholder="Consultor" disabled>
                </div>

                <div class="col-xl-2">
                  <label for="data_atendimento_pessoa_fisica">Data de criação</label>
                  <input type="date" class="form-control" name="data_atendimento_pessoa_fisica" placeholder="" disabled>
                </div>

                <div class="col-xl-2">
                  <label for="validade_proposta_pessoa_fisica">Data de vencimento</label>
                  <input type="date" class="form-control" name="validade_proposta_pessoa_fisica" placeholder="" disabled>
                </div>

                <div class="col-xl-3">
                  <label for="estado_analise_pessoa_fisica">Estado da proposta</label>
                  <input type="text" class="form-control" name="estado_analise_pessoa_fisica" placeholder="Estado" disabled>
                </div>
              </div>

              <div class="form-row">

                <div class="col-xl-3">
                  <label for="cnpj_banco">Banco/Admninistradora</label>
                  <select class="form-control" id="cnpj_banco" required placeholder="Banco">
                    <option disabled selected>Banco</option>
                    <option value="cdc">Nubank</option>
                  </select>
                </div>

                <div class="col-xl-2">
                  <label for="credito_interesse_pessoa_juridica">Crédito de Interesse</label>
                  <input type="text" class="form-control" name="credito_interesse_pessoa_juridica" placeholder="Valor" required>
                </div>

                <div class="col-xl-2">
                  <label for="credito_total_pessoa_fisica">Credito Total</label>
                  <input type="text" class="form-control" name="credito_total_pessoa_fisica" placeholder="Valor">
                </div>

                <div class="col-xl-3">
                  <label for="tipo_credito_pessoa_fisica">Tipo de crédito</label>
                  <select class="form-control" id="tipo_credito_pessoa_fisica" required placeholder="Crédito">
                    <option disabled selected>Crédito</option>
                    <option value="cdc com adesao">CDC Com Adesão</option>
                    <option value="cdc sem adesao">CDC Sem Adesão</option>
                    <option value="consorcio sem adesao">Consórcio Sem Adesão</option>
                    <option value="consorcio com adesao">Consórcio Com Adesão</option>
                  </select>
                </div>


                <div class="col-xl-2">
                  <label for="valor_adesao_pessoa_fisica">Valor de Adesão</label>
                  <input type="text" class="form-control" name="valor_adesao_pessoa_fisica" placeholder="Valor" disabled>
                </div>
              </div>

              <div class="form-row">
                <div class="col-xl-3">
                  <label for="valor_inicial_pessoa_fisica">Valor da 1° Parcela / Inicial</label>
                  <input type="text" class="form-control" name="valor_inicial_pessoa_fisica" placeholder="Valor">
                </div>
                <div class="col-xl-2">
                  <label for="prazo_inicial_pessoa_fisica">Prazo Inicial</label>
                  <input type="text" class="form-control" name="prazo_inicial_pessoa_fisica" placeholder="Valor" required>
                </div>
                <div class="col-xl-2">
                  <label for="prazo_maximo_pessoa_fisica">Prazo Maximo</label>
                  <input type="text" class="form-control" name="prazo_maximo_pessoa_fisica" placeholder="Valor" required>
                </div>
              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela1_pessoa_fisica">Prazos/Numero de Meses</label>
                  <input type="text" class="form-control" name="parcela1_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela1_pessoa_fisica">Valor da parcela</label>
                  <input type="text" class="form-control" name="valor_parcela1_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela2_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="parcela2_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela2_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="valor_parcela2_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela3_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="parcela3_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela3_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="valor_parcela3_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela4_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="parcela4_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela4_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="valor_parcela4_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela5_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="parcela5_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela5_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="valor_parcela5_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela6_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="parcela6_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela6_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="valor_parcela6_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row">

                <div class="col-xl-4">
                  <label for="parcela7_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="parcela7_pessoa_fisica" placeholder="Prazo/Numero de Meses" disabled>
                </div>

                <div class="col-xl-4">
                  <label for="valor_parcela7_pessoa_fisica"></label>
                  <input type="text" class="form-control" name="valor_parcela6_pessoa_fisica" placeholder="Valor da parcela" disabled>
                </div>

              </div>

              <div class="form-row col-xl-4">
                <button style="margin:2rem;" class="btn btn-primary" action="">Adicionar parcela</button>
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
  </form>
</div>



<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pf/dinamicsPropostaPF.js"></script>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/proposta/pf/gerarPropostaPF.js"></script>