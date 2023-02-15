var btn_dadosIntegracao_enviar = document.getElementById("btn-dadosIntegracao-enviar");
var cpfUsuario = document.getElementById("cpfUsuario");
var pcpfUsuario = document.getElementById("pCPF");
var mcpfUsuario = document.getElementById("mCPF");

$(cpfUsuario).on('change', function() {
  pcpfUsuario.value = cpfUsuario.value;
  mcpfUsuario.value = cpfUsuario.value;
});

$(btn_dadosIntegracao_enviar).click(function () {
  var isInput = verificarCampoVazio("input");
  var isSelect = verificarCampoVazio("select");

  modeObrigatorio();
  if (!isInput || !isSelect) {
    if (inputModeCPFValidador("cpfUsuario")) {
      if (verificadorSenhas("senhaUsuario", "senhaUsuarioConfirmar")) {
        if(inputModeCNPJValidador("cnpjFilial")){
          formCRUD("#formDadosIntegracao", "StartSystem/salvarConfiguracoesInicias", "reload", "#retornoMsn",false, true, "#inforFilialIntegracao");
        }else{
          exibirModal("CNPJ Inválido!","O CNPJ digitado é inválido!", "danger");
        }
      } else {
        exibirModal("Senha Inválida!","Verifique se as senhas são iguais e se atendem aos requisitos<br>Minimo 8 caracteres com 1 caracter especial.", "danger");
      }
    } else {
      exibirModal("CPF Inválido!","O CPF digitado é inválido!", "danger");
    }
  } else {
    exibirModal("Campos Obrigatórios não preenchidos!","Verifique se todos os campos obrigatórios estão preenchidos.", "danger");
  }

});