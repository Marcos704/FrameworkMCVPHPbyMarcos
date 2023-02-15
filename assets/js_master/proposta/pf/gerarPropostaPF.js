$("#cadastrar_ficha_pessoa_fisica").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: URL_BASE + "System/salvarFichaCPF",
    type: 'POST',
    data: formData,

    success: function (retorno) {
      console.log("(Parametro 1)->\n" + retorno);
      $('#retornoMsn1').removeClass();
      if (retorno.trim().includes("ficha cadastrada")) {
        $('#retornoMsn1')
          .addClass('alert alert-success')
          .html('<strong>Ficha cadastrada!</strong>');
          setTimeout(function() {
            window.location = URL_BASE+"System/listarPropostaPF";
          }, 800);
      } else if (retorno.trim().includes("ficha nao cadastrada")) {
        $('#retornoMsn1')
          .addClass('alert alert-warning')
          .html('<strong>Não foi possível realizar o cadastro da ficha!😕</strong>');
      }
    },
    error: function (retorno) {
      console.log("(Parametro 2)->\n" + retorno);
      $('#retornoMsn1')
        .addClass('alert alert-danger')
        .html('<strong>Erro!</strong> Impossivel realizar o envio das informações. Contate o administrador do sistema');
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