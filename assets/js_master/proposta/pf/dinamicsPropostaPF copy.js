$(document).ready(function () {
  $('#rg_pessoa_fisica').attr('inputmode', 'decimal');
  $('#cep_pessoa_fisica').attr('inputmode', 'decimal');
  $('#celular_pessoa_fisica').attr('inputmode', 'decimal');
  $('#telefone_fixo_pessoa_fisica').attr('inputmode', 'decimal');
  $('#valor_aluguel_pessoa_fisica').attr('inputmode', 'decimal');
  $('#renda_mensal_pessoa_fisica').attr('inputmode', 'decimal');
  $('#telefone_pessoal_pessoa_fisica').attr('inputmode', 'decimal');
  $('#renda_mensal_pessoa_fisica').attr('inputmode', 'decimal');
  $('#valor_aluguel_pessoa_fisica').attr('inputmode', 'decimal');
  $('#valor_primeiro_patrimonio_pessoa_fisica').attr('inputmode', 'decimal');
  $('#valor_segundo_patrimonio_pessoa_fisica').attr('inputmode', 'decimal');
  $('#numero_pessoa_fisica').attr('inputmode', 'decimal');

  $('#rg_pessoa_fisica').mask('000000000000-0');
  $('#cep_pessoa_fisica').mask('00000-000');
  $('#celular_pessoa_fisica').mask('(00)0 0000-0000');
  $('#telefone_fixo_pessoa_fisica').mask('(00)0000-0000');
  $('#telefone_pessoal_pessoa_fisica').mask('(00)0000-0000');
});
/**
 * Obtendo variaveis globais do formulario
*/
var mnsInforBasicas = document.getElementById("retornoMsn1");
/**
 * Fazendo a lógica dos botões do formulário 
 * obtendo as box para o formulario
*/
var boxInforBasicas = document.getElementById("inforBasicas");
var boxInfoContatoEndereco = document.getElementById("infoContatoEndereco");
var infoDadosFinanceiros = document.getElementById("infoDadosFinanceiros");
var boxBemImovel = document.getElementById("infoBemImovel");
var boxBemVeiculo = document.getElementById("infoBemVeiculo");
var boxBemServico = document.getElementById("infoBemServico");
var boxInfoConsultor = document.getElementById("infoConsultor");
var boxSalvarProposta = document.getElementById("salvarProposta");
var titlePage = document.getElementById("page-title");
/**Obtendo os campos que necessitam ser tratados
 *  - Formulario de Informações Básicas -
*/
var nome = document.getElementById("nome_pessoa_fisica");
var dataNascimento = document.getElementById("data_de_nascimento_pessoa_fisica");
var genero = document.getElementById("genero_pessoa_fisica");
var nomeMae = document.getElementById("nome_da_mae_pessoa_fisica");
var nomePai = document.getElementById("nome_do_pai_pessoa_fisica");
var rg = document.getElementById("rg_pessoa_fisica");
var orgaoExpeditor = document.getElementById("orgao_expeditor_pessoa_fisica");
var naturalidade = document.getElementById("naturalidade_pessoa_fisica");
var nacionalidade = document.getElementById("nacionalidade_pessoa_fisica");
var estadoCivil = document.getElementById("estado_civil_pessoa_fisica");
/**Obtendo os campos que necessitam ser tratados
 *  - Formulario Informações Contato/Endereco
*/
var cep = document.getElementById("cep_pessoa_fisica");
var rua = document.getElementById("rua_pessoa_fisica");
var bairro = document.getElementById("bairro_pessoa_fisica");
var numero = document.getElementById("numero_pessoa_fisica");
var cidade = document.getElementById("cidade_pessoa_fisica");
var complemento = document.getElementById("complemento_pessoa_fisica");
var uf = document.getElementById("estado_pessoa_fisica");
var celular = document.getElementById("celular_pessoa_fisica");
var foneFixo = document.getElementById("telefone_fixo_pessoa_fisica");
var email = document.getElementById("email_pessoa_fisica");
/**Obtendo os campos que necessitam ser tratados
 *  - Formulario Informações Dados Financeiros
*/
var profissao = document.getElementById("profissao_pessoa_fisica");
var empresa = document.getElementById("empresa_empregadora_pessoa_fisica");
var rendaMensal = document.getElementById("renda_mensal_pessoa_fisica");
var score = document.getElementById("score_pessoa_fisica");
var ppe = document.getElementById("ppe_pessoa_fisica");
var casaPropria = document.getElementById("casa_propria_pessoa_fisica");
var valorAlugel = document.getElementById("valor_aluguel_pessoa_fisica");
var referenciaPessoal = document.getElementById("referencia_pessoal_pessoa_fisica");
var telefonePessoal = document.getElementById("telefone_pessoal_pessoa_fisica");
var grauParentesco = document.getElementById("grau_parentesco_pessoa_fisica");
var patrimonio1 = document.getElementById("primeiro_patrimonio_pessoa_fisica");
var valorPatrimonio1 = document.getElementById("valor_primeiro_patrimonio_pessoa_fisica");
var patrimonio2 = document.getElementById("segundo_patrimonio_pessoa_fisica");
var valorPatrimonio2 = document.getElementById("valor_segundo_patrimonio_pessoa_fisica");
var pt1 = document.getElementById("pt1");
var ptv1 = document.getElementById("ptv1");
var pt2 = document.getElementById("pt2");
var ptv2 = document.getElementById("ptv2");
var alugelFalse = document.getElementById("alugel_false");
/**obtendo os campos que necessitam ser tratados
 *  - Formulario de CONSULTOR
*/
var validadeProposta = document.getElementById("validade_proposta_pessoa_fisica");
var bancoProposta = document.getElementById("cnpj_bancos");
var valorCreditoProposta = document.getElementById("valor_bruto_pessoa_fisica");
var tipoCreiditoProposta = document.getElementById("tipo_credito_pessoa_fisica");
var parcelaProposta1 = document.getElementById("parcela1_pessoa_fisica");
var valorParcelaProposta1 = document.getElementById("valor_parcela1_pessoa_fisica");
/**
 * Obtendo os campos que necessitam de lógica
 * - Formulario de Bem Imovel - 
*/
var tipoImovel = document.getElementById("tipo_imovel_pessoa_fisica");
var finalidadeImovel = document.getElementById("utilidade_imovel_pessoa_fisica");
var observacaoImovel = document.getElementById("observacao_imovel_pessoa_fisica");
var cepImovel = document.getElementById("cep_imovel_pessoa_fisica");
var ruaImovel = document.getElementById("rua_imovel_pessoa_fisica");
var bairroImovel = document.getElementById("bairro_imovel_pessoa_fisica");
var numeroImovel = document.getElementById("numero_imovel_pessoa_fisica");
var cidadeImovel = document.getElementById("cidade_imovel_pessoa_fisica");
var complementoImovel = document.getElementById("complemento_imovel_pessoa_fisica");
var ufImovel = document.getElementById("estado_imovel_pessoa_fisica");
/**
 * - Formulario de Bem Veiculo -
*/
var tipoVeiculo = document.getElementById("tipo_veiculo_pessoa_fisica");
var estadoVeiculo = document.getElementById("estado_veiculo_pessoa_fisica");
var marcaVeiculo = document.getElementById("marca_veiculo_pessoa_fisica");
var modeloVeiculo = document.getElementById("modelo_veiculo_pessoa_fisica");
var anoVeiculo = document.getElementById("ano_veiculo_pessoa_fisica");
var anoFabricacaoVeiculo = document.getElementById("ano_fabricacao_veiculo_pessoa_fisica");
/**
 * - Formulario de Bem Serviço - 
*/
var nomeServico = document.getElementById("nome_servico_pessoa_fisica");
var tipoServico = document.getElementById("tipo_servico_pessoa_fisica");
var descricaoServico = document.getElementById("descricao_servico_pessoa_fisica");

/**
 * - Formulario de Consultor
 * - Lógica para as parcelar 
*/
//var valorPacelaView = document.getElementById("valor_parcela_pessoa_juridica_view");
/*
document.getElementById("btn-prox-infor-basicas-pf").onclick = function () {

  if (nome.value === ""
    || dataNascimento.value === ""
    || genero.value === "null"
    || nomeMae.value === ""
    || rg.value === ""
    || orgaoExpeditor.value === ""
    || naturalidade.value === ""
    || nacionalidade.value === ""
    || estadoCivil.value === "null") {
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Campos Obrigatórios não preenchidos!</p> - Os campos obrigatórios estão marcados com asterisco(*)</div>";
  } else {
    mnsInforBasicas.innerHTML = "Informe os campos";
    titlePage.innerHTML = "Contato e Endereço";
    boxInforBasicas.classList.toggle("ocultar-componente");
    boxInfoContatoEndereco.classList.remove("ocultar-componente");
  }
}

document.getElementById("btn-contatos-voltar").onclick = function () {
  titlePage.innerHTML = "";
  titlePage.innerHTML = "Informações Básicas";
  mnsInforBasicas.innerHTML = "Informe os campos";
  boxInfoContatoEndereco.classList.toggle("ocultar-componente");
  boxInforBasicas.classList.remove("ocultar-componente");
}
document.getElementById("renda_mensal_pessoa_fisica").onkeyup = function () {
  formatarMoeda("renda_mensal_pessoa_fisica");
}
document.getElementById("valor_aluguel_pessoa_fisica").onkeyup = function () {
  formatarMoeda("valor_aluguel_pessoa_fisica");
}

document.getElementById("btn-contatos-proximo").onclick = function () {
  if (cep.value === ""
    || rua.value === ""
    || bairro.value === ""
    || numero.value === ""
    || cidade.value === ""
    || uf.value === ""
    || celular.value === ""
    || foneFixo.value === ""
    || email.value === "") {
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Campos Obrigatórios não preenchidos!</p> - Os campos obrigatórios estão marcados com asterisco(*)</div>";
  } else {
    titlePage.innerHTML = "";
    titlePage.innerHTML = "Informações Financeiras";
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxInfoContatoEndereco.classList.toggle("ocultar-componente");
    infoDadosFinanceiros.classList.remove("ocultar-componente");
  }
}

document.getElementById("btn-bem-consultor-proximo").onclick = function () {

  if (validadeProposta.value === ""
    || bancoProposta.value === ""
    || valorCreditoProposta.value === ""
    || tipoCreiditoProposta.value === "") {
    window.alert("Campos obrigatórios requeridos!\n" +
      "- Validade\n- Valor de Credito\n- Tipo de credito\n -Banco");
  } else {
    titlePage.innerHTML = "";
    titlePage.innerHTML = "Deseja finalizar essa ficha?";
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxSalvarProposta.classList.remove("ocultar-componente");
  }
}
*/
document.getElementById("casa_propria_pessoa_fisica").onchange = function () {
  if ($('#casa_propria_pessoa_fisica').val() === "Sim") {
    valorAlugel.value = 0;
    valorAlugel.disabled = true;
    alugelFalse.innerHTML = "<input type='hidden' name='valor_aluguel_pessoa_fisica' value='0'>";
  } else {
    valorAlugel.disabled = false;
  }
}
//Nova logica para redirecionamento de Bem
if ($('#tipo_bem_pessoa_fisica').val() === "imovel") {
  mnsInforBasicas.innerHTML = "Informe os campos";
  infoDadosFinanceiros.classList.toggle("ocultar-componente");
  boxBemImovel.classList.remove("ocultar-componente");
  //  - Formulario de Bem Imovel - 
  //  - Setando valores para null
  tipoImovel.value = "";
  finalidadeImovel.value = "";
  observacaoImovel.value = "";
  cepImovel.value = "";
  ruaImovel.value = "";
  bairroImovel.value = "";
  numeroImovel.value = 0;
  cidadeImovel.value = "";
  complementoImovel.value = "";
  ufImovel.value = "";

  //- Formulario de Bem Veiculo -
  //- Setando valores para null - 
  tipoVeiculo.value = "null";
  estadoVeiculo.value = "null";
  marcaVeiculo.value = "null";
  modeloVeiculo.value = "null";
  anoVeiculo.value = 0;
  anoFabricacaoVeiculo.value = 0;

  //- Formulario de Bem Serviço -
  //- Setando valores para null
  nomeServico.value = "null";
  tipoServico.value = "null";
  descricaoServico.value = "null";
  nomeServico.value = "null";
  tipoServico.value = "null";
  descricaoServico.value = "null";

} else
  if ($('#tipo_bem_pessoa_fisica').val() === "veiculo") {
    mnsInforBasicas.innerHTML = "Informe os campos";
    infoDadosFinanceiros.classList.toggle("ocultar-componente");
    boxBemVeiculo.classList.remove("ocultar-componente");

    // - Formulario de Bem Veiculo -
    // - Setando valores para null - 

    tipoVeiculo.value = "";
    estadoVeiculo.value = "";
    marcaVeiculo.value = "";
    modeloVeiculo.value = "";
    anoVeiculo.value = 0;
    anoFabricacaoVeiculo.value = 0;

    // - Formulario de Bem Imovel - 
    // - Setando valores para null

    tipoImovel.value = "null";
    finalidadeImovel.value = "null";
    observacaoImovel.value = "null";
    cepImovel.value = "null";
    ruaImovel.value = "null";
    bairroImovel.value = "null";
    numeroImovel.value = 0;
    cidadeImovel.value = "null";
    complementoImovel.value = "null";
    ufImovel.value = "null";

    // - Formulario de Bem Serviço -
    // - Setando valores para null

    nomeServico.value = "null";
    tipoServico.value = "null";
    descricaoServico.value = "null";
    nomeServico.value = "null";
    tipoServico.value = "null";
    descricaoServico.value = "null";

  } else
    if ($('#tipo_bem_pessoa_fisica').val() === "servico") {
      mnsInforBasicas.innerHTML = "Informe os campos";
      infoDadosFinanceiros.classList.toggle("ocultar-componente");
      boxBemServico.classList.remove("ocultar-componente");

      // - Formulario de Bem Serviço -
      // - Setando valores para vazio

      nomeServico.value = "";
      tipoServico.value = "";
      descricaoServico.value = "";
      nomeServico.value = "";
      tipoServico.value = "";
      descricaoServico.value = "";

      // - Formulario de Bem Veiculo -
      // - Setando valores para null - 

      tipoVeiculo.value = "null";
      estadoVeiculo.value = "null";
      marcaVeiculo.value = "null";
      modeloVeiculo.value = "null";
      anoVeiculo.value = 0;
      anoFabricacaoVeiculo.value = 0;

      //  - Formulario de Bem Imovel - 
      //  - Setando valores para null

      tipoImovel.value = "null";
      finalidadeImovel.value = "null";
      observacaoImovel.value = "null";
      cepImovel.value = "null";
      ruaImovel.value = "null";
      bairroImovel.value = "null";
      numeroImovel.value = 0;
      cidadeImovel.value = "null";
      complementoImovel.value = "null";
      ufImovel.value = "null";
    } else {
      mnsInforBasicas.innerHTML = "";
      mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Tipo de Bem não selecionado!</p>Informe um tipo de Bem para prosseguir</div>";
    }

/*Lógica para redirecionamento de Bem
document.getElementById("btn-financeiro-proximo").onclick = function () {
  if (profissao.value === ""
    || empresa.value === ""
    || rendaMensal.value === ""
    || score.value === ""
    || ppe.value === ""
    || casaPropria.value === ""
    || valorAlugel.value === ""
    || referenciaPessoal.value === ""
    || telefonePessoal.value === ""
    || grauParentesco.value === ""
    || patrimonio1.value === ""
    || valorPatrimonio1.value === "") {
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Campos Obrigatórios não preenchidos!</p> - Os campos obrigatórios estão marcados com asterisco(*)</div>";
  } else
    if ($('#patrimonio_select').val() === "null") {
      mnsInforBasicas.innerHTML = "";
      mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Informe o patrimonio!</p></div>";
    } else
      if ($('#tipo_bem_pessoa_fisica').val() === "imovel") {
        mnsInforBasicas.innerHTML = "Informe os campos";
        infoDadosFinanceiros.classList.toggle("ocultar-componente");
        boxBemImovel.classList.remove("ocultar-componente");
        //  - Formulario de Bem Imovel - 
        //  - Setando valores para null
        tipoImovel.value = "";
        finalidadeImovel.value = "";
        observacaoImovel.value = "";
        cepImovel.value = "";
        ruaImovel.value = "";
        bairroImovel.value = "";
        numeroImovel.value = 0;
        cidadeImovel.value = "";
        complementoImovel.value = "";
        ufImovel.value = "";

        //- Formulario de Bem Veiculo -
        //- Setando valores para null - 
        tipoVeiculo.value = "null";
        estadoVeiculo.value = "null";
        marcaVeiculo.value = "null";
        modeloVeiculo.value = "null";
        anoVeiculo.value = 0;
        anoFabricacaoVeiculo.value = 0;

        //- Formulario de Bem Serviço -
        //- Setando valores para null
        nomeServico.value = "null";
        tipoServico.value = "null";
        descricaoServico.value = "null";
        nomeServico.value = "null";
        tipoServico.value = "null";
        descricaoServico.value = "null";

      } else
        if ($('#tipo_bem_pessoa_fisica').val() === "veiculo") {
          mnsInforBasicas.innerHTML = "Informe os campos";
          infoDadosFinanceiros.classList.toggle("ocultar-componente");
          boxBemVeiculo.classList.remove("ocultar-componente");

          // - Formulario de Bem Veiculo -
          // - Setando valores para null - 

          tipoVeiculo.value = "";
          estadoVeiculo.value = "";
          marcaVeiculo.value = "";
          modeloVeiculo.value = "";
          anoVeiculo.value = 0;
          anoFabricacaoVeiculo.value = 0;

          // - Formulario de Bem Imovel - 
          // - Setando valores para null

          tipoImovel.value = "null";
          finalidadeImovel.value = "null";
          observacaoImovel.value = "null";
          cepImovel.value = "null";
          ruaImovel.value = "null";
          bairroImovel.value = "null";
          numeroImovel.value = 0;
          cidadeImovel.value = "null";
          complementoImovel.value = "null";
          ufImovel.value = "null";

          // - Formulario de Bem Serviço -
          // - Setando valores para null

          nomeServico.value = "null";
          tipoServico.value = "null";
          descricaoServico.value = "null";
          nomeServico.value = "null";
          tipoServico.value = "null";
          descricaoServico.value = "null";

        } else
          if ($('#tipo_bem_pessoa_fisica').val() === "servico") {
            mnsInforBasicas.innerHTML = "Informe os campos";
            infoDadosFinanceiros.classList.toggle("ocultar-componente");
            boxBemServico.classList.remove("ocultar-componente");

            // - Formulario de Bem Serviço -
            // - Setando valores para vazio

            nomeServico.value = "";
            tipoServico.value = "";
            descricaoServico.value = "";
            nomeServico.value = "";
            tipoServico.value = "";
            descricaoServico.value = "";

            // - Formulario de Bem Veiculo -
            // - Setando valores para null - 

            tipoVeiculo.value = "null";
            estadoVeiculo.value = "null";
            marcaVeiculo.value = "null";
            modeloVeiculo.value = "null";
            anoVeiculo.value = 0;
            anoFabricacaoVeiculo.value = 0;

            //  - Formulario de Bem Imovel - 
            //  - Setando valores para null

            tipoImovel.value = "null";
            finalidadeImovel.value = "null";
            observacaoImovel.value = "null";
            cepImovel.value = "null";
            ruaImovel.value = "null";
            bairroImovel.value = "null";
            numeroImovel.value = 0;
            cidadeImovel.value = "null";
            complementoImovel.value = "null";
            ufImovel.value = "null";
          } else {
            mnsInforBasicas.innerHTML = "";
            mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Tipo de Bem não selecionado!</p>Informe um tipo de Bem para prosseguir</div>";
          }
}
*/

document.getElementById("btn-financeiro-voltar").onclick = function () {
  titlePage.innerHTML = "";
  titlePage.innerHTML = "Contatos e Endereços";
  mnsInforBasicas.innerHTML = "Informe os campos";
  infoDadosFinanceiros.classList.toggle("ocultar-componente");
  boxInfoContatoEndereco.classList.remove("ocultar-componente");
}

document.getElementById("btn-bem-imovel-voltar").onclick = function () {
  titlePage.innerHTML = "";
  titlePage.innerHTML = "Dados Financeiros";
  mnsInforBasicas.innerHTML = "Informe os campos";
  boxBemImovel.classList.toggle("ocultar-componente");
  infoDadosFinanceiros.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-imovel-proximo").onclick = function () {
  if (tipoImovel.value == ""
    || finalidadeImovel.value == ""
    || observacaoImovel.value == ""
    || cepImovel.value == ""
    || ruaImovel.value == ""
    || bairroImovel.value == ""
    || numeroImovel.value == 0
    || cidadeImovel.value == ""
    || complementoImovel.value == ""
    || ufImovel.value == "") {
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Campos Obrigatórios não preenchidos!</p> - Os campos obrigatórios estão marcados com asterisco(*)</div>";
  } else {
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxBemImovel.classList.toggle("ocultar-componente");
    boxInfoConsultor.classList.remove("ocultar-componente");
  }
}
document.getElementById("btn-bem-veiculo-voltar").onclick = function () {
  titlePage.innerHTML = "";
  titlePage.innerHTML = "Dados Financeiros";
  mnsInforBasicas.innerHTML = "Informe os campos";
  boxBemVeiculo.classList.toggle("ocultar-componente");
  infoDadosFinanceiros.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-veiculo-proximo").onclick = function () {
  if (tipoVeiculo.value == "null"
    || estadoVeiculo.value == "null"
    || marcaVeiculo.value == "null"
    || modeloVeiculo.value == "null"
    || anoVeiculo.value == 0
    || anoFabricacaoVeiculo.value == 0) {
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Campos Obrigatórios não preenchidos!</p> - Os campos obrigatórios estão marcados com asterisco(*)</div>";
  } else {
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxBemVeiculo.classList.toggle("ocultar-componente");
    boxInfoConsultor.classList.remove("ocultar-componente");
  }
}
document.getElementById("btn-bem-servico-voltar").onclick = function () {
  titlePage.innerHTML = "";
  titlePage.innerHTML = "Dados Financeiros";
  mnsInforBasicas.innerHTML = "Informe os campos";
  boxBemServico.classList.toggle("ocultar-componente");
  infoDadosFinanceiros.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-servico-proximo").onclick = function () {
  if (nomeServico.value == ""
    || tipoServico.value == ""
    || descricaoServico.value == ""
    || nomeServico.value == ""
    || tipoServico.value == ""
    || descricaoServico.value == "") {
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold p-0'>Campos Obrigatórios não preenchidos!</p> - Os campos obrigatórios estão marcados com asterisco(*)</div>";
  } else {
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxBemServico.classList.toggle("ocultar-componente");
    boxInfoConsultor.classList.remove("ocultar-componente");
  }
}
document.getElementById("btn-bem-consultor-voltar").onclick = function () {
  if ($('#tipo_bem_pessoa_fisica').val() === "imovel") {
    titlePage.innerHTML = "";
    titlePage.innerHTML = "Bem Imovel";
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxBemImovel.classList.remove("ocultar-componente");
  } else if ($('#tipo_bem_pessoa_fisica').val() === "veiculo") {
    titlePage.innerHTML = "";
    titlePage.innerHTML = "Bem Veiculo";
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxBemVeiculo.classList.remove("ocultar-componente");
  } else if ($('#tipo_bem_pessoa_fisica').val() === "servico") {
    titlePage.innerHTML = "";
    titlePage.innerHTML = "Bem Serviço";
    mnsInforBasicas.innerHTML = "Informe os campos";
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxBemServico.classList.remove("ocultar-componente");
  }
}
document.getElementById("btn-salvar-proposta-voltar").onclick = function () {
  titlePage.innerHTML = "";
  titlePage.innerHTML = "Preencha os campos";
  boxSalvarProposta.classList.toggle("ocultar-componente");
  boxInfoConsultor.classList.remove("ocultar-componente");
}

//Lógica para a liberação de preenchimento de parcelas
var primeiro_patrimonio_pessoa_fisica = document.getElementById("primeiro_patrimonio_pessoa_fisica");
var valor_primeiro_patrimonio_pessoa_fisica = document.getElementById("valor_primeiro_patrimonio_pessoa_fisica");
var segundo_patrimonio_pessoa_fisica = document.getElementById("segundo_patrimonio_pessoa_fisica");
var valor_segundo_patrimonio_pessoa_fisica = document.getElementById("valor_segundo_patrimonio_pessoa_fisica");

var patrimonio_select = document.getElementById("patrimonio_select");
var patrimonio_select_value = $('#patrimonio_select').val();
patrimonio_select.addEventListener("change", liberarPreenchimentoPatrimonio, true);


function liberarPreenchimentoPatrimonio() {
  if ($('#patrimonio_select').val() === "1") {
    primeiro_patrimonio_pessoa_fisica.disabled = false;
    valor_primeiro_patrimonio_pessoa_fisica.disabled = false;
    segundo_patrimonio_pessoa_fisica.disabled = true;
    valor_segundo_patrimonio_pessoa_fisica.disabled = true;
    pt2.innerHTML = "<input type='hidden'name='segundo_patrimonio_pessoa_fisica'value='0'>";
    ptv2.innerHTML = "<input type='hidden'name='valor_segundo_patrimonio_pessoa_fisica'value='0'>";
  } else
    if ($('#patrimonio_select').val() === "2") {
      primeiro_patrimonio_pessoa_fisica.disabled = false;
      valor_primeiro_patrimonio_pessoa_fisica.disabled = false;
      segundo_patrimonio_pessoa_fisica.disabled = false;
      valor_segundo_patrimonio_pessoa_fisica.disabled = false;
    } else
      if ($('#patrimonio_select').val() === "0"
        || $('#patrimonio_select').val() === null) {
        primeiro_patrimonio_pessoa_fisica.disabled = true;
        valor_primeiro_patrimonio_pessoa_fisica.disabled = true;
        segundo_patrimonio_pessoa_fisica.disabled = true;
        valor_segundo_patrimonio_pessoa_fisica.disabled = true;
        pt1.innerHTML = "<input type='hidden' name='primeiro_patrimonio_pessoa_fisica' value='0'>";
        ptv1.innerHTML = "<input type='hidden'name='valor_primeiro_patrimonio_pessoa_fisica' value='0'>";
        pt2.innerHTML = "<input type='hidden' name='segundo_patrimonio_pessoa_fisica' value='0'>";
        ptv2.innerHTML = "<input type='hidden' name='valor_segundo_patrimonio_pessoa_fisica' value='0'>";
      }
}
function formatarMoeda(id) {
  var elemento = document.getElementById(id);
  var valor = elemento.value;

  valor = valor + '';
  valor = parseInt(valor.replace(/[\D]+/g, ''));
  valor = valor + '';
  valor = valor.replace(/([0-9]{2})$/g, ",$1");

  if (valor.length > 3 && valor != "") {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, "$1,$2");
    elemento.value = valor;
  }
  if (valor.length > 6 && valor != "") {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    elemento.value = valor;
  }
}