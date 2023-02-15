var btn_editar = document.getElementById("btn-editar");
//stopReloadForm("cadastrar-usuario");
$(btn_editar).click(function () {
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
    formCRUD("#editar-usuario", "System/edicaoDados", "System/visualizarDadosUsuario", "#retornoMsn", true);
  }
});