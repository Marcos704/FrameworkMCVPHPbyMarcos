$("#editar_banco_administradora").submit(function () {
  event.preventDefault();
  console.log("sss");
  var formData = new FormData(this);
  $.ajax({
    url: URL_BASE+"System/editarBancoAdministradora",
    type: 'POST',
    data: formData,

    success: function (retorno) {
      $('#alert-form').removeClass()
      if (retorno.trim() == "CNPJ invalido") {
        $('#alert-form')
          .addClass('alert alert-danger')
          .html('<strong class="container">CNPJ inválido!</strong>');
      } else
        if (retorno.trim() == "Banco Cadastrado") {
          $('#alert-form')
            .addClass('alert alert-success')
            .html('<strong>Banco Editado!</strong></p>');
            setTimeout(function() {
              window.location = URL_BASE+"System/listarBanco";
            }, 800);
        } else if (retorno.trim() == "Falha ao cadastrar Banco") {
          $('#alert-form')
            .addClass('alert alert-danger')
            .html('<strong>🛠Algo deu errado na requisição, contatar o administrador do sistema.</strong>');

        }
    },
    error: function (retorno) {
      $('#alert-form')
        .addClass('alert alert-danger')
        .html('<strong>Erro!</strong> Impossivel realizar o envio das informações. Contate o administrador do sistema<br><strong>Cod.: </strong>'+retorno);
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