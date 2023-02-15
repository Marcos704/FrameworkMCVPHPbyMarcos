var cnpjAdminstradora = document.getElementById("idDadosAdministradora").value;
console.log("dad:"+cnpjAdminstradora);
if(cnpjAdminstradora == "null"){

  $("#administradora").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: URL_BASE + "System/cadastrarAdministradora",
      type: 'POST',
      data: formData,

      success: function (retorno) {
        console.log("(Parametro 1)->\n" + retorno);
        $('#retornoMsn1').removeClass();
        if (retorno.trim().includes("CNPJ invalido")) {
          console.log("qqq");
          $('#retornoMsn1')
            .addClass('alert alert-danger')
            .html('<strong>Informe um CNPJ válido!</strong>');
        }if (retorno.trim().includes("Administradora Cadastrada")) {
          $('#retornoMsn1')
            .addClass('alert alert-success')
            .html('<strong>Administradora Cadastrada!</strong>');
            setTimeout(function() {
              window.location = URL_BASE+"System/cadastroAdministradora";
            }, 800);
        }if (retorno.trim().includes("Falha ao cadastrar Administradora")) {
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

}else{
  
  $("#administradora").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: URL_BASE + "System/editarAdministradora",
      type: 'POST',
      data: formData,

      success: function (retorno) {
        console.log("(Parametro 1)->\n" + retorno);
        $('#retornoMsn1').removeClass();
        if (retorno.trim().includes("CNPJ invalido")) {
          console.log("qqq");
          $('#retornoMsn1')
            .addClass('alert alert-danger')
            .html('<strong>Informe um CNPJ válido!</strong>');
        }if (retorno.trim().includes("Dados Editados")) {
          $('#retornoMsn1')
            .addClass('alert alert-success')
            .html('<strong>Dados Editados com sucesso!</strong>');
            setTimeout(function() {
              window.location = URL_BASE+"System/cadastroAdministradora";
            }, 800);
        }if (retorno.trim().includes("Falha ao Dados Editados")) {
          $('#retornoMsn1')
            .addClass('alert alert-warning')
            .html('<strong>Não foi possível realizar o cadastro da ficha!😕</strong><br><p>Redirecionando...</p>');
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
}