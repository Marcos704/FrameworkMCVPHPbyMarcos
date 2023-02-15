
// Fazendo o cache do itens
var campoCNPJ = document.getElementById("cnpj_pessoa_juridica");
let campoCNPJ_value = document.getElementById("cnpj_pessoa_juridica").value;
var formPesquisar = document.getElementById("verificar_cliente_cnpj");
var formEditar = document.getElementById("editar_cliente_cnpj");

$("#pesquisar_clientes_cnpj").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: URL_BASE+"System/verificarClienteCNPJ",
    type: 'POST',
    data: formData,

    success: function (retorno) {
      $('#retornoMsn').removeClass()
      if (retorno.trim() == "CNPJ invalido") {
        $('#retornoMsn')
          .addClass('alert alert-danger')
          .html('<strong class="container">CNPJ inválido!</strong>');
          campoCNPJ.classList.toggle("form-control-user-sm-invalid");
      } else
        if (retorno.trim() == "cliente ja cadastrado") {
          $('#retornoMsn')
            .addClass('alert alert-success')
            .html('<strong>Cliente já realizou um pré cadastro!</strong><br><p>Redirecionando... 😊</p>');
            campoCNPJ.classList.remove("form-control-user");
            campoCNPJ.classList.toggle("form-control-user-sm-valid");
            setTimeout(function() {
              window.location = URL_BASE+"System/gerarPropostaPessoaJuridica";
            }, 800);
        } else if (retorno.trim() == "cliente sem cadastro") {
          $('#retornoMsn')
            .addClass('alert alert-warning')
            .html('<strong>Pré cadastro não encontrado!😕</strong><br><p>Redirecionando...</p>');
            setTimeout(function() {
              window.location = URL_BASE+"System/gerarPropostaPessoaJuridica";
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