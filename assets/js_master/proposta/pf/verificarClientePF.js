
// Fazendo o cache do itens
var campoCPF = document.getElementById("cpf_pessoa_fisica");

$("#pesquisar_clientes_cpf").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: URL_BASE + "System/verificarClienteCPF",
    type: 'POST',
    data: formData,

    success: function (retorno) {
      $('#retornoMsn').removeClass()
      if (retorno.trim() == "CPF invalido") {
        $('#retornoMsn')
          .addClass('alert alert-danger')
          .html('<strong class="container">CPF inválido!</strong>');
          campoCPF.classList.toggle("form-control-user-sm-invalid");
      } else
        if (retorno.trim() == "cliente ja cadastrado") {
          $('#retornoMsn')
            .addClass('alert alert-success')
            .html('<strong>Cliente já realizou um pré cadastro!</strong><br><p>Redirecionando... 😊</p>');
            campoCPF.classList.remove("form-control-user");
            campoCPF.classList.toggle("form-control-user-sm-valid");
            setTimeout(function() {
              window.location = URL_BASE + "System/gerarPropostaPessoaFisica";
            }, 800);
        } else if (retorno.trim() == "cliente sem cadastro") {
          $('#retornoMsn')
            .addClass('alert alert-warning')
            .html('<strong>Pré cadastro não encontrado!😕</strong><br><p>Redirecionando...</p>');
            setTimeout(function() {
              window.location = URL_BASE + "System/gerarPropostaPessoaFisica";
            }, 800);
        } else if (retorno.trim() == "RequisicaoIncompleta") {
          $('#retornoMsn')
            .addClass('alert alert-danger')
            .html('<strong>🛠Algo deu errado na requisição, contatar o administrador do sistema.</strong>');

        }else{
          $('#retornoMsn')
            .addClass('alert alert-danger')
            .html('<strong>Informe o tipo para o usuário!</strong><br><p>'+retorno+'</p>');
        }
    },
    error: function (retorno) {
      $('#retornoMsn')
        .addClass('alert alert-danger')
        .html('<strong>Erro!</strong> Impossivel realizar o envio das informações. Contate o administrador do sistema<br><strong>Cod.: </strong>SD-00-N');
    },
    cache: false,
    contentType: false,
    processData: false,
    xhr: function () {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        myXhr.upload.addEventListener('progress',
          function () {
            // progresso de upload
          }, false);
      }
      return myXhr;
    }
  });
});