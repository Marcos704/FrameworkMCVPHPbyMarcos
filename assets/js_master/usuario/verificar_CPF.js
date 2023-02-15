// Variaveis Globais
var MSN_ERRO_TABLE_NOT_FOUND = "<strong class='text-danger'>SQL ERRO!</strong><br><small><strong class='text-danger'>Codigo Erro: </strong><small class='text-danger'>42S02</small><br><strong class='text-danger'>Descrição: </strong><small class='text-danger'>Tabela não cadastrada</small></small>";
// Fazendo o cache do itens
var campoCPFUsuario = document.getElementById("cpf_usuario");
let campoCPFUsuario_value = document.getElementById("cpf_usuario").value;
var campoCPFUsuario_Editar = document.getElementById("cpf_usuario_editar");
document.cookie = "cpf=" + campoCPFUsuario_value + ";";
var formCadastrar = document.getElementById("cadastrar");
var formEditar = document.getElementById("editar");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

$("#pesquisar_usuario_cpf_cadastrar").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);

  $.ajax({
    url: URL_BASE + "System/cadastrar",
    type: 'POST',
    data: formData,

    success: function (retorno) {
      $('#retornoMsn').removeClass()
      if (retorno.trim() == "CPF invalido") {
        // window.location = "index.php?pag=c01";
        $('#retornoMsn')
          .addClass('alert alert-danger')
          .html('<strong class="container">CPF inválido!</strong>');

      } else
        if (retorno.trim() == "O CPF informado ja consta na base de dados") {
          if (urlParams.get('cadPermissao') == "true") {
            console.log("help");
            $('#retornoMsn')
              .addClass('alert alert-success')
              .html('<strong class="container">Redirecionando... 😊</strong>');
            window.location = URL_BASE + "System/permissaoUsuario?cadPermissao=true";
          }else{
          $('#retornoMsn')
            .addClass('alert alert-danger')
            .html('<strong>CPF informado já consta na base de dado!</strong><br><p>Clique no botão para editar.</p>');
          campoCPFUsuario.className = "form-control form-control-user-invalid";
          formCadastrar.classList.toggle("ocultar-componente");
          formEditar.classList.remove("ocultar-componente");
        }
        } else if (retorno.trim() == "redirecionar") {
          console.log("debug: to aqui!");
          $('#retornoMsn')
            .addClass('alert alert-success')
            .html('<strong class="container">Redirecionando... 😊</strong>');
          window.location = URL_BASE + "System/cadastro_novoUsuario";
        } else if (retorno.trim() == "RequisicaoIncompleta") {
          $('#retornoMsn')
            .addClass('alert alert-danger')
            .html('<strong>🛠Algo deu errado na requisição, contatar o administrador do sistema.aaaa</strong>');

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

$("#pesquisar_usuario_cpf_editar").submit(function () {
  event.preventDefault();
  var formData2 = new FormData(this);

  $.ajax({
    url: URL_BASE + "System/editar",
    type: 'POST',
    data: formData2,

    success: function (retorno2) {
      console.log(retorno2);
      $('#retornoMsn').removeClass()
      if (retorno2.trim() == "redirecionar para edicao") {
        $('#retornoMsn')
          .addClass('alert alert-success')
          .html('<strong class="container">Redirecionando... 😊</strong>');
        window.location = URL_BASE + "System/editarUsuario";
      } else {
        $('#retornoMsn')
          .addClass('alert alert-danger')
          .html('<strong>🛠Alsgo deu errado na requisição, contatar o administrador do sistema.</strong>');
        console.log(retorno2);
      }
    },
    error: function (retorno2) {
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