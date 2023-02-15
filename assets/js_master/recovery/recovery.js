$("#recovery").submit(function () {
    event.preventDefault();

    var formData = new FormData(this);
    $.ajax({
        url: URL_BASE + "Recovery/recoveryPassword",
        type: 'POST',
        data: formData,

        success: function (retorno) {
            console.log("(Parametro 1)->\n" + retorno);
            $('#retornoMsn').removeClass()
            if (retorno.trim().includes("SQL INFOR PASS")) {
                $('#retornoMsn')
                    .addClass('alert alert-success')
                    .html('<strong>Sucesso!</strong> Dados Editados com sucesso! Redirecionando...');
                setTimeout(function () {
                  window.location = URL_BASE;
                }, 15);
            } else {
                console.log("(Erro)->\n" + retorno);
                $('#retornoMsn')
                    .addClass('alert alert-danger')
                    .html('<strong>Falha!</strong> Algo aconteceu na requisição. Contate o suporte! ERROR-505');
            }
            if (retorno.trim().includes("Requisitos minimos nao atendidos")) {
                $('#retornoMsn')
                    .addClass('alert alert-warning')
                    .html('<strong>Alerta!</strong> A senha deve conter no minimo 8 caracteres e 1 caracter especial');
            }
            if (retorno.trim().includes("senhas nao conferem")) {
                $('#retornoMsn')
                    .addClass('alert alert-warning')
                    .html('<strong>Alerta!</strong> A senha deve coindicidir');
            }
            if (retorno.trim().includes("cpf invalido")) {
                $('#retornoMsn')
                    .addClass('alert alert-danger')
                    .html('<strong>Alerta!</strong> O cpf informado não é válido');
            }
        },
        error: function (retorno) {
            console.log("(Parametro 2)->\n" + retorno);
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