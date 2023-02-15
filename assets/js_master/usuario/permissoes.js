var btn_editar = document.getElementById("btn-editar");
//stopReloadForm("cadastrar-usuario");
$(btn_editar).click(function () {
formCRUD("#editar-usuario", "System/edicaoDados?cadPermissao=true", "System/visualizarDadosUsuario", "#retornoMsn", true);
});