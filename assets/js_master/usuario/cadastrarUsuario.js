// Variaveis Globais
var MSN_ERRO_TABLE_NOT_FOUND = "<strong class='text-danger'>SQL ERRO!</strong><br><small><strong class='text-danger'>Codigo Erro: </strong><small class='text-danger'>42S02</small><br><strong class='text-danger'>Descrição: </strong><small class='text-danger'>Tabela não cadastrada</small></small>";
// Fazendo o cache do itens
var btn_cadastrar = document.getElementById("btn-cadastrar");
//stopReloadForm("cadastrar-usuario");
$(btn_cadastrar).click(function () {
  var isInput = verificarCampoVazio("input");
  var isSelect = verificarCampoVazio("select");
  if (isInput || isSelect) {
    inputModeObrigatorio();
    selectModeObrigatorio();
    exibirModal("Preencha todos os campo","danger");
  }else
  if (!verificarIgualdadeCampos("senha_usuario", "confirmar_senha_usuario")) {
    exibirModal("Verifique as senhas<br><small>Verifique se as senhas são iguais e se atendem aos requisitos</small><br><small>Minimo 8 caracteres com 1 caracter especial.</small>","danger");
  } else {
    formCRUD("#cadastrar-usuario", "System/salvarNovoUsuario", "System/visualizarDadosUsuario", "#retornoMsn", false);
  }
});