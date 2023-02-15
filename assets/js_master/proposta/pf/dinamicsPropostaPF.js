$(document).ready(function () {
  console.clear();
  console.info("[Console] - Limpo");
  console.info("[retorno] - construindo layout");
  
});
/**
 * Pegando os inputs
*/
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
/* Logica para visualização dos Bens */
var boxBemImovel = document.getElementById("infoBemImovel");
var boxBemVeiculo = document.getElementById("infoBemVeiculo");
var boxBemServico = document.getElementById("infoBemServico");
var inforIniciais = document.getElementById("inforIniciais");

var tipo_bem = document.getElementById("tipo_bem_pessoa_fisica");
var btn_patrimonio_proximo = document.getElementById("btn-patrimonio-proximo");

btn_patrimonio_proximo.onclick = function () {
  if (!inputModeObrigatorio() && !selectModeObrigatorio()) {
    $('#modals').html("");
    $('#modals')
      .html('<div class="modal fade" id="alerta1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="text-center"><h4><i class="fa-solid fa-triangle-exclamation fa-2x text-success"></i></h4><br><span>Preencha todos os campos</span><br><br><button type="button" class="btn btn-sm btn-block btn-success" data-dismiss="modal">fechar</button></div></div></div></div></div>');
    $('#alerta1').modal('show');
  }
  if ($('#bem').val() == "imovel") {
    inforIniciais.classList.toggle("ocultar-componente");
    boxBemImovel.classList.remove("ocultar-componente");
  } else
  if ($('#bem').val() == "veiculo") {
    inforIniciais.classList.toggle("ocultar-componente");
    boxBemVeiculo.classList.remove("ocultar-componente");
  } else
  if ($('#bem').val() == "servico") {
    inforIniciais.classList.toggle("ocultar-componente");
    boxBemServico.classList.remove("ocultar-componente");
  }
}