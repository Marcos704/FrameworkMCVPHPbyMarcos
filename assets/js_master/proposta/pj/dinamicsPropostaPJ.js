/**
 * Obtendo variaveis globais do formulario
*/
var mnsInforBasicas = document.getElementById("msn-inforBasicas");
/**Fazendo a lógica dos botões do formulário 
 * obtendo as box para o formulario
*/
var boxInforBasicas = document.getElementById("infoBasicas");
var boxInfoContatoEndereco = document.getElementById("infoContatoEndereco");
var boxinfoRepresentantePatrimonio = document.getElementById("infoRepresentantePatrimonio");
var boxBemImovel = document.getElementById("infoBemImovel");
var boxBemVeiculo = document.getElementById("infoBemVeiculo");
var boxBemServico = document.getElementById("infoBemServico");
var boxInfoConsultor = document.getElementById("infoConsultor");
var boxSalvarProposta = document.getElementById("salvarProposta");
/**Obtendo os campos que necessitam ser tratados
 *  - Formulario de Informações Básicas -
*/
var razaoSocial = document.getElementById("razao_social_pessoa_juridica");
var nomeFantasia = document.getElementById("nome_fantasia_pessoa_juridica");
var fundacao = document.getElementById("data_de_fundacao_pessoa_juridica");
var tipoEmpresa = document.getElementById("tipo_empresa_pessoa_juridica");
var atividadeEmpresa = document.getElementById("atividade_pessoa_juridica");
var numeroRegistro = document.getElementById("numero_registro_pessoa_juridica");
var faturamentoEmpresa = document.getElementById("faturamento_pessoa_juridica");
var inscricaoEstadual = document.getElementById("inscricao_estadual_pessoa_juridica");
/**Obtendo os campos que necessitam ser tratados
 *  - Formulario Repersentante
*/
var nomeRepresentante = document.getElementById("nome_socio_pessoa_juridica");
var dataNascimento = document.getElementById("data_de_nascimento_socio_pessoa_juridica");
var genero = document.getElementById("genero_socio_pessoa_juridica");
var nomeMae = document.getElementById("nome_mae_socio_pessoa_juridica");
var cpfRepresentante = document.getElementById("cpf_socio_pessoa_juridica");
var nacionalidade = document.getElementById("nacionalidade_socio_pessoa_juridica");
var ppe = document.getElementById("ppe_socio_pessoa_juridica");
var pt1 = document.getElementById("pt1");
var ptv1 = document.getElementById("ptv1");
var pt2 = document.getElementById("pt2");
var ptv2 = document.getElementById("ptv2");
/**obtendo os campos que necessitam ser tratados
 *  - Formulario de CONSULTOR
*/
var validadeProposta = document.getElementById("validade_proposta_pessoa_juridica");
var bancoProposta = document.getElementById("cnpj_bancos");
var valorCreditoProposta = document.getElementById("valor_bruto_pessoa_juridica");
var tipoCreiditoProposta = document.getElementById("tipo_credito_pessoa_juridica");
var parcelaProposta1 = document.getElementById("parcela1_pessoa_juridica");
var valorParcelaProposta1 = document.getElementById("valor_parcela1_pessoa_juridica");

// ### Implementado a lógica para o formulario de informacoes basicas ###
function validarRazaoSocial() {
  if (razaoSocial.value === null || razaoSocial.value == "") {
    razaoSocial.classList.remove("form-control-user-valid");
    razaoSocial.classList.toggle("form-control-user-invalid");
  } else {
    razaoSocial.classList.remove("form-control-user-invalid");
    razaoSocial.classList.toggle("form-control-user-valid");
  }
}
razaoSocial.addEventListener("focusout", validarRazaoSocial, true);
razaoSocial.addEventListener("blur", validarRazaoSocial, true);
razaoSocial.addEventListener("change", validarRazaoSocial, true);

function validarNomeFantasia() {
  if (nomeFantasia.value === null || nomeFantasia.value == "") {
    nomeFantasia.classList.remove("form-control-user-valid");
    nomeFantasia.classList.toggle("form-control-user-invalid");
  } else {
    nomeFantasia.classList.remove("form-control-user-invalid");
    nomeFantasia.classList.toggle("form-control-user-valid");
  }
}
nomeFantasia.addEventListener("focusout", validarNomeFantasia, true);
nomeFantasia.addEventListener("blur", validarNomeFantasia, true);
nomeFantasia.addEventListener("change", validarNomeFantasia, true);

function validarFundacao() {
  if (fundacao.value === null || fundacao.value == "") {
    fundacao.classList.remove("form-control-user-valid");
    fundacao.classList.toggle("form-control-user-invalid");
  } else {
    fundacao.classList.remove("form-control-user-invalid");
    fundacao.classList.toggle("form-control-user-valid");
  }
}
fundacao.addEventListener("focusout", validarFundacao, true);
fundacao.addEventListener("blur", validarFundacao, true);
fundacao.addEventListener("change", validarFundacao, true);

function validarTipoEmpresa() {
  if (tipoEmpresa.value === null || tipoEmpresa.value == "") {
    tipoEmpresa.classList.remove("form-control-user-valid");
    tipoEmpresa.classList.toggle("form-control-user-invalid");
  } else {
    tipoEmpresa.classList.remove("form-control-user-invalid");
    tipoEmpresa.classList.toggle("form-control-user-valid");
  }
}
tipoEmpresa.addEventListener("focusout", validarTipoEmpresa, true);
tipoEmpresa.addEventListener("blur", validarTipoEmpresa, true);
tipoEmpresa.addEventListener("change", validarTipoEmpresa, true);

function validarAtividade() {
  if (atividadeEmpresa.value === null || atividadeEmpresa.value == "") {
    atividadeEmpresa.classList.remove("form-control-user-valid");
    atividadeEmpresa.classList.toggle("form-control-user-invalid");
  } else {
    atividadeEmpresa.classList.remove("form-control-user-invalid");
    atividadeEmpresa.classList.toggle("form-control-user-valid");
  }
}
atividadeEmpresa.addEventListener("focusout", validarAtividade, true);
atividadeEmpresa.addEventListener("blur", validarAtividade, true);
atividadeEmpresa.addEventListener("change", validarAtividade, true);

function validarNumeroRegistro() {
  if (numeroRegistro.value === null || numeroRegistro.value == "") {
    numeroRegistro.classList.remove("form-control-user-valid");
    numeroRegistro.classList.toggle("form-control-user-invalid");
  } else {
    numeroRegistro.classList.remove("form-control-user-invalid");
    numeroRegistro.classList.toggle("form-control-user-valid");
  }
}
numeroRegistro.addEventListener("focusout", validarNumeroRegistro, true);
numeroRegistro.addEventListener("blur", validarNumeroRegistro, true);
numeroRegistro.addEventListener("change", validarNumeroRegistro, true);

function validarFaturamento() {
  if (faturamentoEmpresa.value === null || faturamentoEmpresa.value == "") {
    faturamentoEmpresa.classList.remove("form-control-user-valid");
    faturamentoEmpresa.classList.toggle("form-control-user-invalid");
  } else {
    faturamentoEmpresa.classList.remove("form-control-user-invalid");
    faturamentoEmpresa.classList.toggle("form-control-user-valid");
  }
}
faturamentoEmpresa.addEventListener("focusout", validarFaturamento, true);
faturamentoEmpresa.addEventListener("blur", validarFaturamento, true);
faturamentoEmpresa.addEventListener("change", validarFaturamento, true);

function validarInscEstadual() {
  if (inscricaoEstadual.value !== null || inscricaoEstadual.value != "") {
    inscricaoEstadual.classList.toggle("form-control-user-valid");
  } else {
    inscricaoEstadual.classList.remove("form-control-user-valid");
  }
}
inscricaoEstadual.addEventListener("focusout", validarInscEstadual, true);
inscricaoEstadual.addEventListener("blur", validarInscEstadual, true);
inscricaoEstadual.addEventListener("change", validarInscEstadual, true);
document.getElementById("faturamento_pessoa_juridica").onkeyup = function () {
  formatarMoeda("faturamento_pessoa_juridica");
}
document.getElementById("inscricao_estadual_pessoa_juridica").onkeyup = function () {
  IEMask("inscricao_estadual_pessoa_juridica");
}
document.getElementById("cep_pessoa_juridica").onkeyup = function () {
  CEPMask("#cep_pessoa_juridica");
}
document.getElementById("cpf_socio_pessoa_juridica").onkeyup = function () {
  $('#cpf_socio_pessoa_juridica').mask('000.000.000-00');
}
/**Obtendo os campos que necessitam de tratados
 *  - Formulario Contatos e Endereços
*/
var cep = document.getElementById("cep_pessoa_juridica");
var rua = document.getElementById("rua_pessoa_juridica");
var bairro = document.getElementById("bairro_pessoa_juridica");
var numero = document.getElementById("numero_pessoa_juridica");
var cidade = document.getElementById("cidade_pessoa_juridica");
var uf = document.getElementById("estado_pessoa_juridica");
var telefone = document.getElementById("telefone_pessoa_juridica");
var email_usuario = document.getElementById("email_pessoa_juridica");

/**
 * Obtendo os campos que necessitam de lógica
 * - Formulario Representante - 
*/
var patrimonio1 = document.getElementById("primeiro_patrimonio_pessoa_juridica");
var valorPatrimonio1 = document.getElementById("valor_primeiro_patrimonio_pessoa_juridica");
var patrimonio2 = document.getElementById("segundo_patrimonio_pessoa_fisica");
var valorPatrimonio2 = document.getElementById("valor_segundo_patrimonio_pessoa_juridica");
/**
 * Obtendo os campos que necessitam de lógica
 * - Formulario de Bem Imovel - 
*/
var tipoImovel = document.getElementById("tipo_imovel_pessoa_juridica");
var finalidadeImovel = document.getElementById("utilidade_imovel_pessoa_juridica");
var observacaoImovel = document.getElementById("observacao_imovel_pessoa_juridica");
var cepImovel = document.getElementById("cep_imovel_pessoa_juridica");
var ruaImovel = document.getElementById("rua_imovel_pessoa_juridica");
var bairroImovel = document.getElementById("bairro_imovel_pessoa_juridica");
var numeroImovel = document.getElementById("numero_imovel_pessoa_juridica");
var cidadeImovel = document.getElementById("cidade_imovel_pessoa_juridica");
var complementoImovel = document.getElementById("complemento_imovel_pessoa_juridica");
var ufImovel = document.getElementById("estado_imovel_pessoa_juridica");
/**
 * - Formulario de Bem Veiculo -
*/
var tipoVeiculo = document.getElementById("tipo_veiculo_pessoa_juridica");
var estadoVeiculo = document.getElementById("estado_veiculo_pessoa_juridica");
var marcaVeiculo = document.getElementById("marca_veiculo_pessoa_juridica");
var modeloVeiculo = document.getElementById("modelo_veiculo_pessoa_juridica");
var anoVeiculo = document.getElementById("ano_veiculo_pessoa_juridica");
var anoFabricacaoVeiculo = document.getElementById("ano_fabricacao_veiculo_pessoa_juridica");
/**
 * - Formulario de Bem Serviço - 
*/
var nomeServico = document.getElementById("nome_servico_pessoa_juridica");
var tipoServico = document.getElementById("tipo_servico_pessoa_juridica");
var descricaoServico = document.getElementById("descricao_servico_pessoa_juridica");

/**
 * - Formulario de Consultor
 * - Lógica para as parcelar 
*/
var valorPacelaView = document.getElementById("valor_parcela_pessoa_juridica_view");

document.getElementById("btn-prox-infor-basicas").onclick = function () {
  if (razaoSocial.value === ""
    || nomeFantasia.value === ""
    || fundacao.value === ""
    || tipoEmpresa.value === ""
    || atividadeEmpresa.value === ""
    || faturamentoEmpresa.value === "") {
    validarRazaoSocial();
    validarNomeFantasia();
    validarFundacao();
    validarTipoEmpresa();
    validarAtividade();
    validarFaturamento();
    mnsInforBasicas.innerHTML = "";
    mnsInforBasicas.innerHTML = "<div class='alert alert-danger' role='alert'><p class='text-alert-bold'>Campos Obrigatórios não preenchidos!</p></div>";
  } else {
    boxInforBasicas.classList.toggle("ocultar-componente");
    boxInfoContatoEndereco.classList.remove("ocultar-componente");
  }
}

document.getElementById("btn-contatos-voltar").onclick = function () {
  boxInfoContatoEndereco.classList.toggle("ocultar-componente");
  boxInforBasicas.classList.remove("ocultar-componente");
}
document.getElementById("btn-contatos-proximo").onclick = function () {
  if (cep.value === ""
    || rua.value === ""
    || bairro.value === ""
    || numero.value === ""
    || cidade.value === ""
    || uf.value === ""
    || telefone.value === ""
    || email_usuario.value === "") {
    window.alert("Campos obrigatórios requeridos!\n" +
      "- CEP\n- Rua\n- Bairro\n -Numero\n -Cidade\n -UF\n -Telefone\n -Email")
  } else {
    boxInfoContatoEndereco.classList.toggle("ocultar-componente");
    boxinfoRepresentantePatrimonio.classList.remove("ocultar-componente");
  }
}
document.getElementById("btn-bem-consultor-proximo").onclick = function () {
  console.log("valor:"+parcelaProposta1.value);
  if (validadeProposta.value === ""
    || bancoProposta.value === ""
    || valorCreditoProposta.value === ""
    || tipoCreiditoProposta.value === "") {
    window.alert("Campos obrigatórios requeridos!\n" +
      "- Validade\n- Valor de Credito\n- Tipo de credito\n -Banco");
  }else{console.log("debug");
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxSalvarProposta.classList.remove("ocultar-componente");
  }
}

/**Lógica para redirecionamento de Bem */
document.getElementById("btn-repesentantes-proximo").onclick = function () {
  if (nomeRepresentante.value === ""
    || dataNascimento.value === ""
    || genero.value === ""
    || nomeMae.value === ""
    || cpfRepresentante.value === ""
    || nacionalidade.value === ""
    || ppe.value === "") {
    window.alert("Campos obrigatórios requeridos!\n" +
      "- Nome Representante\n- Data de Nascimento\n- Bairro\n -Gênero\n -Nome da Mãe\n -CPF\n -Nacionalidade\n -PPE")
  } else {
    if(!validarCampoCPF(cpfRepresentante.value)){
      window.alert("CPF Inválido!");
    }else
    if ($('#tipo_bem').val() === "imovel") {
      boxinfoRepresentantePatrimonio.classList.toggle("ocultar-componente");
      boxBemImovel.classList.remove("ocultar-componente");
      /**
         *  - Formulario de Bem Imovel - 
         *  - Setando valores para null
        */
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
      /**
     /**
      * - Formulario de Bem Veiculo -
      * - Setando valores para null - 
     */
      tipoVeiculo.value = "null";
      estadoVeiculo.value = "null";
      marcaVeiculo.value = "null";
      modeloVeiculo.value = "null";
      anoVeiculo.value = 0;
      anoFabricacaoVeiculo.value = 0;
      /**
       * - Formulario de Bem Serviço -
       * - Setando valores para null
      */
      nomeServico.value = "null";
      tipoServico.value = "null";
      descricaoServico.value = "null";
      nomeServico.value = "null";
      tipoServico.value = "null";
      descricaoServico.value = "null";

    } else
      if ($('#tipo_bem').val() === "veiculo") {
        boxinfoRepresentantePatrimonio.classList.toggle("ocultar-componente");
        boxBemVeiculo.classList.remove("ocultar-componente");
        /**
          * - Formulario de Bem Veiculo -
          * - Setando valores para null - 
          */
        tipoVeiculo.value = "";
        estadoVeiculo.value = "";
        marcaVeiculo.value = "";
        modeloVeiculo.value = "";
        anoVeiculo.value = 0;
        anoFabricacaoVeiculo.value = 0;
        /**
         *  - Formulario de Bem Imovel - 
         *  - Setando valores para null
        */
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
        /**
         * - Formulario de Bem Serviço -
         * - Setando valores para null
        */
        nomeServico.value = "null";
        tipoServico.value = "null";
        descricaoServico.value = "null";
        nomeServico.value = "null";
        tipoServico.value = "null";
        descricaoServico.value = "null";

      } else
        if ($('#tipo_bem').val() === "servico") {
          boxinfoRepresentantePatrimonio.classList.toggle("ocultar-componente");
          boxBemServico.classList.remove("ocultar-componente");
          /**
          * - Formulario de Bem Veiculo -
          * - Setando valores para null - 
          */
          tipoVeiculo.value = "null";
          estadoVeiculo.value = "null";
          marcaVeiculo.value = "null";
          modeloVeiculo.value = "null";
          anoVeiculo.value = 0;
          anoFabricacaoVeiculo.value = 0;
          /**
          *  - Formulario de Bem Imovel - 
          *  - Setando valores para null
          */
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
          window.alert("🛠Selecione um tipo de bem para prosseguir!");
        }
  }

}
document.getElementById("btn-repesentantes-voltar").onclick = function () {
  boxinfoRepresentantePatrimonio.classList.toggle("ocultar-componente");
  boxInfoContatoEndereco.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-imovel-voltar").onclick = function () {
  boxBemImovel.classList.toggle("ocultar-componente");
  boxinfoRepresentantePatrimonio.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-imovel-proximo").onclick = function () {
  boxBemImovel.classList.toggle("ocultar-componente");
  boxInfoConsultor.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-veiculo-voltar").onclick = function () {
  boxBemVeiculo.classList.toggle("ocultar-componente");
  boxinfoRepresentantePatrimonio.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-veiculo-proximo").onclick = function () {
  boxBemVeiculo.classList.toggle("ocultar-componente");
  boxInfoConsultor.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-servico-voltar").onclick = function () {
  boxBemServico.classList.toggle("ocultar-componente");
  boxinfoRepresentantePatrimonio.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-servico-proximo").onclick = function () {
  boxBemServico.classList.toggle("ocultar-componente");
  boxInfoConsultor.classList.remove("ocultar-componente");
}
document.getElementById("btn-bem-consultor-voltar").onclick = function () {
  if ($('#tipo_bem').val() === "imovel") {
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxBemImovel.classList.remove("ocultar-componente");
  } else if ($('#tipo_bem').val() === "veiculo") {
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxBemVeiculo.classList.remove("ocultar-componente");
  } else if ($('#tipo_bem').val() === "servico") {
    boxInfoConsultor.classList.toggle("ocultar-componente");
    boxBemServico.classList.remove("ocultar-componente");
  }
}
document.getElementById("btn-salvar-proposta-voltar").onclick = function () {
  boxSalvarProposta.classList.toggle("ocultar-componente");
  boxInfoConsultor.classList.remove("ocultar-componente");
}

/**Lógica para a liberação de preenchimento de parcelas */
var primeiro_patrimonio_pessoa_fisica = document.getElementById("primeiro_patrimonio_pessoa_juridica");
var valor_primeiro_patrimonio_pessoa_fisica = document.getElementById("valor_primeiro_patrimonio_pessoa_juridica");
var segundo_patrimonio_pessoa_fisica = document.getElementById("segundo_patrimonio_pessoa_juridica");
var valor_segundo_patrimonio_pessoa_fisica = document.getElementById("valor_segundo_patrimonio_pessoa_juridica");

var patrimonio_select = document.getElementById("patrimonio_select");
var patrimonio_select_value = $('#patrimonio_select').val();
patrimonio_select.addEventListener("change", liberarPreenchimentoPatrimonio, true);


function liberarPreenchimentoPatrimonio() {
  if ($('#patrimonio_select').val() === "1") {
    primeiro_patrimonio_pessoa_fisica.disabled = false;
    valor_primeiro_patrimonio_pessoa_fisica.disabled = false;
    segundo_patrimonio_pessoa_fisica.disabled = true;
    valor_segundo_patrimonio_pessoa_fisica.disabled = true;
    pt2.innerHTML = "<input type='hidden'name='segundo_patrimonio_pessoa_juridica'value='0'>";
    ptv2.innerHTML = "<input type='hidden'name='valor_segundo_patrimonio_pessoa_juridica'value='0'>";
  } else
    if ($('#patrimonio_select').val() === "2") {
      primeiro_patrimonio_pessoa_fisica.disabled = false;
      valor_primeiro_patrimonio_pessoa_fisica.disabled = false;
      segundo_patrimonio_pessoa_fisica.disabled = false;
      valor_segundo_patrimonio_pessoa_fisica.disabled = false;
    } else
      if ($('#patrimonio_select').val() === "null") {
        primeiro_patrimonio_pessoa_fisica.disabled = true;
        primeiro_patrimonio_pessoa_fisica.setAttribute.name ="";
        valor_primeiro_patrimonio_pessoa_fisica.disabled = true;
        segundo_patrimonio_pessoa_fisica.disabled = true;
        valor_segundo_patrimonio_pessoa_fisica.disabled = true;
        pt1.innerHTML = "<input type='hidden' name='primeiro_patrimonio_pessoa_juridica' value='0'>";
        ptv1.innerHTML = "<input type='hidden'name='valor_primeiro_patrimonio_pessoa_juridica' value='0'>";
        pt2.innerHTML = "<input type='hidden' name='segundo_patrimonio_pessoa_juridica' value='0'>";
        ptv2.innerHTML = "<input type='hidden' name='valor_segundo_patrimonio_pessoa_juridica' value='0'>";
      }
}

/**
 * Função para conversão dos valores para modeda Brasileira
 * - Encontrado em : https://pt.stackoverflow.com/questions/181922/formatar-moeda-brasileira-em-javascript
 * - Leves adaptações para atender aos requisitos do sistema
*/
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
/**
 * Função para mascara IE - MA
 * - Serve somente para IE do estado do Maranhão
*/
function IEMask(id) {
  var elemento = document.getElementById(id);
  var valor = elemento.value;

  valor = valor + '';
  valor = parseInt(valor.replace(/[\D]+/g, ''));
  valor = valor + '';
  valor = valor.replace(/([0-9]{2})$/g, ",$1");

  if (valor.length > 8 && valor != "") {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, "$1-$2");
    elemento.value = valor;
  }
}
function CEPMask(id) {
  $(id).mask('00000-000');
}
/**Validador de CPF by joaohcrangel/validation-cpf.js
Created 4 years ago • Report abuse */
function validadorCPF(cpfInput) {
  var cpf = cpfInput;
  if (typeof cpf !== "string") return false
  cpf = cpf.replace(/[\s.-]*/igm, '')
  if (
      !cpf ||
      cpf.length != 11 ||
      cpf == "00000000000" ||
      cpf == "11111111111" ||
      cpf == "22222222222" ||
      cpf == "33333333333" ||
      cpf == "44444444444" ||
      cpf == "55555555555" ||
      cpf == "66666666666" ||
      cpf == "77777777777" ||
      cpf == "88888888888" ||
      cpf == "99999999999"
  ) {
      return false
  }
  var soma = 0
  var resto
  for (var i = 1; i <= 9; i++)
      soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i)
  resto = (soma * 10) % 11
  if ((resto == 10) || (resto == 11)) resto = 0
  if (resto != parseInt(cpf.substring(9, 10))) return false
  soma = 0
  for (var i = 1; i <= 10; i++)
      soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i)
  resto = (soma * 10) % 11
  if ((resto == 10) || (resto == 11)) resto = 0
  if (resto != parseInt(cpf.substring(10, 11))) return false
  return true
}
/*  Validação do campo de cpf via frontEnd para o formulário
    principal - Login
*/
function validarCampoCPF(Data) {
    var FormatData = validadorCPF(Data);
    
    if(FormatData){
      return true;
    }else{
      return false;
    }

}