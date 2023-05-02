$(document).ready(function () {
  //console.clear();
  console.info("[info] - Construindo layout\n-> " + window.location.href + "\n");
  var inputPassword = document.getElementById("senhaUsuario");
  var confirmPassword = document.getElementById("senhaUsuarioConfirmar");
  var btn_eyes1 = document.getElementById("btn-eyes1");
  var btn_eyes2 = document.getElementById("btn-eyes2");
  var btn_eyes1_icon = document.getElementById("eyes1");
  var btn_eyes2_icon = document.getElementById("eyes2");


  var trModal = document.getElementsByClassName(".tr");

  //msn();
  criarComponentesPadroes();
  modalRender();
  iniciarPopOuver();
  inputAtrr();
  iniciarTables();
  passwordInputMode();
  stopFormRefresh();
  reloadComponent();
  exibirOpcoes(".tr");
  btnPasswordNormal(btn_eyes1, inputPassword, btn_eyes1_icon);
  btnPasswordNormal(btn_eyes2, confirmPassword, btn_eyes2_icon);
  animationTextEscrever("animado");
  erroRequisicao();
  autoRemoveComponent();

});
/**
* Reconhecimento automático do dimensionamento da tela
* - Caso a tela seja menor ou igual a 980px, o menu lateral
* será escondido e será apresentado o botão.
* - Caso seja maior, o botão será recolhido e será apresentado
* o menu expandido.
*/
function verificarTamanhoTela() {
  var buttonMenuLateral = document.getElementById("accordionSidebar");
  if (window.matchMedia("(max-width: 980px)").matches) {
    buttonMenuLateral.classList.toggle("toggled");
  }
}
function iniciarPopOuver() {
  $("[data-toggle=popover]").popover();
}
function formatarMoeda(elemento) {
  var elemento = document.getElementById(elemento.id);
  var valor = elemento.value;

  valor = valor + '';
  valor = parseInt(valor.replace(/[\D]+/g, ''));
  valor = valor + '';
  valor = valor.replace(/([0-9]{2})$/g, ",$1");

  if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
  }

  elemento.value = valor;
  if (valor == 'NaN') elemento.value = '';
}

/**Validador de CPF by joaohcrangel/validation-cpf.js
Created 4 years ago • Report abuse */
function validadorCPF(cpfInput) {
  var cpf = cpfInput;
  if (typeof cpf !== "string") return false
  cpf = cpf.replace(/[\s.-]*/igm, '')
  if (
    !cpf ||
    cpf.length != 11 ||
    cpf == "00000000000" ||
    cpf == "11111111111" ||
    cpf == "22222222222" ||
    cpf == "33333333333" ||
    cpf == "44444444444" ||
    cpf == "55555555555" ||
    cpf == "66666666666" ||
    cpf == "77777777777" ||
    cpf == "88888888888" ||
    cpf == "99999999999"
  ) {
    return false
  }
  var soma = 0
  var resto
  for (var i = 1; i <= 9; i++)
    soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i)
  resto = (soma * 10) % 11
  if ((resto == 10) || (resto == 11)) resto = 0
  if (resto != parseInt(cpf.substring(9, 10))) return false
  soma = 0
  for (var i = 1; i <= 10; i++)
    soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i)
  resto = (soma * 10) % 11
  if ((resto == 10) || (resto == 11)) resto = 0
  if (resto != parseInt(cpf.substring(10, 11))) return false
  return true
}
function validadorCNPJ(value) {
  if (!value) return false

  // Aceita receber o valor como string, número ou array com todos os dígitos
  const isString = typeof value === 'string'
  const validTypes = isString || Number.isInteger(value) || Array.isArray(value)

  // Elimina valor em formato inválido
  if (!validTypes) return false

  // Filtro inicial para entradas do tipo string
  if (isString) {
    // Limita ao máximo de 18 caracteres, para CNPJ formatado
    if (value.length > 18) return false

    // Teste Regex para veificar se é uma string apenas dígitos válida
    const digitsOnly = /^\d{14}$/.test(value)
    // Teste Regex para verificar se é uma string formatada válida
    const validFormat = /^\d{2}.\d{3}.\d{3}\/\d{4}-\d{2}$/.test(value)

    // Se o formato é válido, usa um truque para seguir o fluxo da validação
    if (digitsOnly || validFormat) true
    // Se não, retorna inválido
    else return false
  }

  // Guarda um array com todos os dígitos do valor
  const match = value.toString().match(/\d/g)
  const numbers = Array.isArray(match) ? match.map(Number) : []

  // Valida a quantidade de dígitos
  if (numbers.length !== 14) return false

  // Elimina inválidos com todos os dígitos iguais
  const items = [...new Set(numbers)]
  if (items.length === 1) return false

  // Cálculo validador
  const calc = (x) => {
    const slice = numbers.slice(0, x)
    let factor = x - 7
    let sum = 0

    for (let i = x; i >= 1; i--) {
      const n = slice[x - i]
      sum += n * factor--
      if (factor < 2) factor = 9
    }

    const result = 11 - (sum % 11)

    return result > 9 ? 0 : result
  }

  // Separa os 2 últimos dígitos de verificadores
  const digits = numbers.slice(12)

  // Valida 1o. dígito verificador
  const digit0 = calc(12)
  if (digit0 !== digits[0]) return false

  // Valida 2o. dígito verificador
  const digit1 = calc(13)
  return digit1 === digits[1]
}

function inputModeCPFValidador(id) {
  var elem = document.getElementById(id);
  if (validadorCPF(elem.value) && elem.value != "") {
    elem.style.background = "#fff";
    return true;
  } else {
    elem.style.background = "#fd4d3d1f";
    debugInfor("CPF INVÁLIDO! - Conteúdo vazio ou inválido", "[campoName] : " + elem.name + "\n[campoValue] : " + elem.value, "erro", false);
    return false;
  }
}
function inputModeCNPJValidador(id) {
  var elem = document.getElementById(id);
  if (validadorCNPJ(elem.value) && elem.value != "") {
    elem.style.background = "#fff";
    return true;
  } else {
    elem.style.background = "#fd4d3d1f";
    debugInfor("CNPJ INVÁLIDO! - Conteúdo vazio ou inválido", "[campoName] : " + elem.name + "\n[campoValue] : " + elem.value, "erro", false);
    return false;
  }
}
function animationTextEscrever(elemento) {
  if (document.getElementById(elemento)) {
    var i = 0;
    // var A = 0;
    var tag = document.getElementById(elemento);
    var html = document.getElementById(elemento).innerHTML;
    var attr = tag.setAttribute("data", html);
    var txt = tag.getAttribute("data");
    var speed = 170;

    function typeWriter() {
      if (i <= txt.length) {
        document.getElementById(elemento).innerHTML = txt.slice(0, i + 1);
        i++;
        setTimeout(typeWriter, speed);
      }
      //console.log(document.getElementById("text").innerHTML);
    }

    typeWriter();
  }
}
function verificarCampoVazio(inputType) {
  retorno = false;
  if (inputType) {
    Array.prototype.forEach.call(document.getElementsByTagName(inputType), function (elem) {
      if (elem.getAttribute("data-obrigatorio") == "sim") {
        if (elem.value == "" || elem.value == "null" || elem.value == null) {
          retorno = true;
        } else {
          retorno = false;
        }
      }
    });
    return retorno;
  }
}
function verificarIgualdadeCampos(idCampo1, idCampo2) {
  if (idCampo1 && idCampo2) {
    var vrCampo1 = document.getElementById(idCampo1);
    var vrCampo2 = document.getElementById(idCampo2);
    if (vrCampo1.value == vrCampo2.value) {
      vrCampo1.style.background = "#fff";
      vrCampo2.style.background = "#fff";
      return true;
    } else {
      vrCampo1.style.background = "#fd4d3d1f";
      vrCampo2.style.background = "#fd4d3d1f";
      return false;
    }
  }
}
function verificadorSenhas(idCampo1, idCampo2) {
  let regex = /^(?=.*[@!#$%^&*.()/\\])(?=.*[0-9])(?=.*[a-zA-Z])[@!#$%^&*()/\\a-zA-Z0-9]{8,20}$/;
  if (idCampo1 && idCampo2) {
    var vrCampo1 = document.getElementById(idCampo1);
    var vrCampo2 = document.getElementById(idCampo2);
    if (vrCampo1.value == vrCampo2.value) {
      if (regex.test(vrCampo1.value) && vrCampo1.value.length >= 8) {
        vrCampo1.style.background = "#fff";
        vrCampo2.style.background = "#fff";
        return true;
      } else {
        debugInfor("Complexidade da senha", "Verificar a senha complexidade\nSenhas não conferem\nSenha fraca\ninferior/igual a 8 caracteres", "erro", false);
        vrCampo1.style.background = "#fd4d3d1f";
        vrCampo2.style.background = "#fd4d3d1f";
        return false;
      }
    } else {
      debugInfor("Complexidade da senha", "Verificar a senha complexidade\nSenhas não conferem\nSenha fraca\ninferior/igual a 8 caracteres", "erro", false);
      vrCampo1.style.background = "#fd4d3d1f";
      vrCampo2.style.background = "#fd4d3d1f";
      return false;
    }
  }
}
function modeObrigatorio() {
  console.clear();
  Array.prototype.forEach.call(document.getElementsByTagName('input'), function (elem) {
    Array.prototype.forEach.call(elem.attributes, function (attr) {//console.log(elem.value.trim().includes("nullPrimaryNone Selected"));
      if (elem.getAttribute("data-obrigatorio") == "sim") {
        if (elem.value === "") {
          elem.style.background = "#fd4d3d1f";
          debugInfor("Campos nulos ou vazios!", "name :" + elem.name + " - valor: " + elem.value, "erro", false);
        } else {
          elem.style.background = "#fff";
        }
      }
    });
  });
  Array.prototype.forEach.call(document.getElementsByTagName('textarea'), function (elem) {
    Array.prototype.forEach.call(elem.attributes, function (attr) {//console.log(elem.value.trim().includes("nullPrimaryNone Selected"));
      if (elem.getAttribute("data-obrigatorio") == "sim") {
        if (elem.value === "") {
          elem.style.background = "#fd4d3d1f";
          debugInfor("Campos nulos ou vazios!", "name :" + elem.name + " - valor: " + elem.value, "erro", false);
        } else {
          elem.style.background = "#fff";
        }
      }
    });
  });
  Array.prototype.forEach.call(document.getElementsByTagName('select'), function (elem) {
    Array.prototype.forEach.call(elem.attributes, function (attr) {
      if (elem.getAttribute("data-obrigatorio") == "sim") {
        if (elem.value == "null") {
          elem.style.background = "#fd4d3d1f";
          debugInfor("Campos nulos ou vazios!", "name :" + elem.name + " - valor: " + elem.value, "erro", false);
        } else {
          elem.style.background = "#fff";
        }
      }
    });
  });

}
function stopFormRefresh() {
  Array.prototype.forEach.call(document.getElementsByTagName('form'), function (elem) {
    Array.prototype.forEach.call(elem.attributes, function (attr) {
      if (attr.name.indexOf('data-stopformrefresh') != -1) {
        debugInfor("Form reflesh", "desabilitado", "info", false)
        var form = document.getElementById(elem.id);
        function handleForm(event) { event.preventDefault(); }
        form.addEventListener('submit', handleForm);
      }
    });
  });
}

function chagerColor(idComponent, boleanValue) {
  var elem = document.getElementById(idComponent);
  if (boleanValue == false) {
    elem.style.background = "#fd4d3d1f";
  } else {
    elem.style.background = "#fff";
  }
}
function btnPassword(btnID, inputID, iconId) {
  var btn_eyes = document.getElementById(btnID.id);
  var inputPassword = document.getElementById(inputID.id);
  var icon = document.getElementById(iconId.id);
  btn_eyes.addEventListener("click", function () {
    if (icon.classList == "fa-solid fa-eye") {
      icon.classList.remove("fa-eye");
      icon.classList.toggle("fa-eye-slash");
      inputPassword.type = 'text';
    } else {
      icon.classList.remove("fa-eye-slash");
      icon.classList.toggle("fa-eye");
      inputPassword.type = 'password';
    }
  });
}
function btnPasswordNormal(btnID, inputID, iconId) {
  if (btnID != null && inputID != null && iconId != null) {
    btnID.addEventListener("click", function (e) {
      e.preventDefault();
      if (iconId.classList == "fa-solid fa-eye") {
        iconId.classList.remove("fa-eye");
        iconId.classList.toggle("fa-eye-slash");
        inputID.type = 'text';
      } else {
        iconId.classList.remove("fa-eye-slash");
        iconId.classList.toggle("fa-eye");
        inputID.type = 'password';
      }
    });
  }
}
function passwordInputMode() {
  Array.prototype.forEach.call(document.getElementsByTagName('a'), function (elem) {
    Array.prototype.forEach.call(elem.attributes, function (attr) {
      if (attr.name.indexOf('data-btneyes') != -1) {
        Array.prototype.forEach.call(document.getElementsByTagName('input'), function (elem2) {
          Array.prototype.forEach.call(elem2.attributes, function (attr2) {
            if (attr2.name.indexOf('data-inputpassword') != -1) {
              Array.prototype.forEach.call(document.getElementsByTagName('i'), function (elem3) {
                Array.prototype.forEach.call(elem3.attributes, function (attr3) {
                  if (attr3.name.indexOf('data-iconpassword') != -1) {
                    btnPassword(elem, elem2, elem3);
                  }
                });
              });
            }
          });
        });
      }
    });
  });
}
function formCRUD(formId, urlPOST, urlGO, retornoID, isCheckBox) {
  if (isCheckBox) {
    $(formId).submit(function () {
      event.preventDefault();
      var this_master = $(this);

      this_master.find('input[type="checkbox"]').each(function () {
        var checkbox_this = $(this);


        if (checkbox_this.is(":checked") == true) {
          checkbox_this.attr('value', '1');
        } else {
          checkbox_this.prop('checked', true);
          //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
          checkbox_this.attr('value', '0');
        }
      })
      var formData = new FormData(this);
      $.ajax({
        url: URL_BASE + urlPOST,
        type: 'POST',
        data: formData,

        success: function (retorno) {

          $(retornoID).removeClass();
          if (retornoID != null) {
            if (retorno.trim().includes("SQL INFOR PASS")) {
              debugInfor("Sucesso ao realizar tarefa", null, "form", false);
              if (urlGO != null && urlGO != "reload") {
                $(retornoID)
                  .addClass('alert alert-success')
                  .html('<strong>Sucesso ao realizar tarefa.</strong><br><span>redirecionando...1</span>');
                setTimeout(function () {
                  window.location = URL_BASE + urlGO;
                }, 800);
              } else if (urlGO == "reload") {
                $(retornoID)
                  .addClass('alert alert-success')
                  .html('<strong>Sucesso ao realizar tarefa.</strong><br><span>redirecionando...2</span>');
                setTimeout(function () {
                  location.reload();
                }, 800);
              } else {
                $(retornoID)
                  .addClass('alert alert-success')
                  .html('<strong>Sucesso ao realizar tarefa.</strong>');
              }
            } else if (retorno.trim().includes("Type: SQL ERRO")) {
              $(retornoID).addClass('alert alert-danger')
                .html('<h5>[Erro Fatal] - FALHAR AO SALVAR REGISTRO!</h5><small><strong>Informe a TI</strong></small>');
              exibirModal("", "danger");
              debugInfor("FALHAR AO SALVAR REGISTRO!\n POSSIVEL CAUSA : SQL ERRO", "\n[RETORNO] : " + retorno, "erro", false);
            } else {
              debugInfor("Falha ao realizar tarefa", "Vr:" + retorno, "formDanger", false);
              $(retornoID)
                .html(retorno);
            }
          }
        },
        error: function (retorno) {
          debugInfor("Falha ao realizar tarefa! Contate o suporte imediatamente.", retorno, "formDanger", false);
          $(retornoID)
            .addClass('alert alert-danger')
            .html('<strong>Falha ao realizar tarefa!</strong><span>Contate o administrador do sistema</span>');
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
  } else {
    $(formId).submit(function () {
      event.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: URL_BASE + urlPOST,
        type: 'POST',
        data: formData,

        success: function (retorno) {
          $(retornoID).removeClass();
          if (retornoID != null) {
            if (retorno.trim().includes("SQL INFOR PASS")) {
              console.log("[formData] - Sucesso ao realizar tarefa");
              debugInfor("Sucesso ao realizar tarefa", null, "form", false);
              if (urlGO != null && urlGO != "reload") {
                $(retornoID)
                  .addClass('alert alert-success')
                  .html('<strong>Sucesso ao realizar tarefa.</strong><br><span>redirecionando...3</span>');
                setTimeout(function () {
                  window.location = URL_BASE + urlGO;
                }, 800);
              } else if (urlGO == "reload") {
                $(retornoID)
                  .addClass('alert alert-success')
                  .html('<strong>Sucesso ao realizar tarefa.</strong><br><span>redirecionando...</span>');
                setTimeout(function () {
                  window.location.reload();
                }, 800);
              } else {
                $(retornoID)
                  .addClass('alert alert-success')
                  .html('<strong>Sucesso ao realizar tarefa.</strong>');
              }
            } else if (retorno.trim().includes("Fatal error")) {
              debugInfor("Falha ao realizar tarefa", retorno, "erro", false);
              $(retornoID)
                .addClass('alert alert-danger')
                .html('<strong>Falha ao realizar tarefa.</strong>');
            } else if (retorno.trim().includes("SQL ERRO")) {
              debugInfor("Resumo da operação: ", "\nStatus: Erro \nRetorno:" + retorno, "erro", false);
              $(retornoID)
                .addClass('alert alert-danger')
                .html('<strong>Ops... Erro ao salvar os dados, contate o suporte.</strong>');
            } else {
              debugInfor("Resumo da operação: ", "\nStatus: Erro \nRetorno:" + retorno, "erro", false);
              $(retornoID)
                .addClass('alert alert-danger')
                .html('<strong>Ops... Erro ao salvar os dados, contate o suporte.</strong>');
            }
          }
        },
        error: function (retorno) {
          console.log("erro");
          if (retorno.trim().includes("Fatal error")) {
            console.log("p");
          }
          debugInfor("Falha ao realizar tarefa! Contate o suporte imediatamente.", retorno, "formDanger", false);
          $(retornoID)
            .addClass('alert alert-danger')
            .html('<strong>Falha ao realizar tarefa!</strong><span>Contate o administrador do sistema</span>');
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
    $(document).ajaxError(function () {
      alert("An error occured!");
    });
  }

}
function erroRequisicao() {
  $(document).ajaxError(function () {
    exibirModal("Falha ao carre", "danger");
  });
}
/**
 * Implementação das maskaras nos inputs do sistema
*/
function inputAtrr() {
  Array.prototype.forEach.call(document.getElementsByTagName('input'), function (elem) {
    Array.prototype.forEach.call(elem.attributes, function (attr) {
      if (attr.name.indexOf('data-cpf') != -1 && elem.value == "") {
        $(elem).mask('000.000.000-00');
      } else
        if (attr.name.indexOf('data-cnpj') != -1 && elem.value == "") {
          $(elem).mask('00.000.000/0000-00');
        } else
          if (attr.name.indexOf('data-cep') != -1 && elem.value == "") {
            $(elem).mask('00000-000');
          } else
            if (attr.name.indexOf('data-celular') != -1 && elem.value == "") {
              $(elem).mask('(00)0 0000-0000');
            } else
              if (attr.name.indexOf('data-telefone') != -1 && elem.value == "") {
                $(elem).mask('(00) 0000-0000');
              } else
                if (attr.name.indexOf('data-rg') != -1 && elem.value == "") {
                  $(elem).mask('000000000000-0');
                } else
                  if (attr.name.indexOf('data-moeda') != -1 && elem.value == "") {
                    $(elem).keyup(function () {
                      formatarMoeda(elem);
                    });
                  } else
                    if (attr.name.indexOf('data-decimal') != -1 && elem.value == "") {
                      elem.setAttribute('inputmode', 'decimal');
                    } else
                      if (attr.name.indexOf('data-numerico') != -1 && elem.value == "") {
                        elem.setAttribute('inputmode', 'numeric');
                      } else
                        if (attr.name.indexOf('data-texto') != -1 && elem.value == "") {
                          elem.setAttribute('inputmode', 'text');
                        } else
                          if (attr.name.indexOf('data-fone') != -1 && elem.value == "") {
                            elem.setAttribute('inputmode', 'tel');
                          } else
                            if (attr.name.indexOf('data-busca') != -1 && elem.value == "") {
                              elem.setAttribute('inputmode', 'search');
                            } else
                              if (attr.name.indexOf('data-email') != -1 && elem.value == "") {
                                elem.setAttribute('inputmode', 'email');
                              } else
                                if (attr.name.indexOf('data-web') != -1 && elem.value == "") {
                                  elem.setAttribute('inputmode', 'url');
                                }
    });
  });
}
function autoRemoveComponent(){
  setTimeout(function () {
    $('#ocultar').html("");
    debugInfor("a","a","info")
  }, 300);
}
function msn() {
  //console.clear();
  console.info("[console] - Limpo");
  console.log("[info] - Construindo layout\n-> " + window.location.href + "\n");
}
function debugInfor(msn, msnParams, consoleType, limpar) {
  if (limpar) {
    console.clear();
  } else
    if (consoleType == "info") {
      console.info("[info] - " + msn + "\n" + "{Params} - " + msnParams);
    } else
      if (consoleType == "erro") {
        console.error("[erro] - " + msn + "\n" + "{Params} - " + msnParams);
      } else
        if (consoleType == "log") {
          console.log("[log] - " + msn + "\n" + "{Params} - " + msnParams);
        } else
          if (consoleType == "info") {
            console.info("[info] - " + msn + "\n" + "{Params} - " + msnParams);
          } else
            if (consoleType == "form") {
              console.info("[FormData] - " + msn + "\n" + "{Params} - " + msnParams);
            } else
              if (consoleType == "form") {
                console.error("[FormData] - " + msn + "\n" + "{Params} - " + msnParams);
              }
}
function stopReloadForm(idForm) {
  if (idForm) {
    var form = document.getElementById(idForm);
    function handleForm(event) { event.preventDefault(); }
    form.addEventListener('submit', handleForm);
  }
}
function exibirModal(dsTitulo, dsMensagem, tipoModal) {
  if (tipoModal == "success") {
    $('#modals').html("");
    $('#modals')
      .html('<div class="modal-body"><div class="container text-center"><div class="row"><div class="col-12 mb-2"><h3>'+dsTitulo+'</h3><small>'+dsMensagem+'</small></div><hr><div class="col-12 text-center"><button type="button" class="btn btn-git-color w-100" data-dismiss="modal">fechar</button></div></div></div></div>');
    $('#alerta1').modal('show');
  } else
    if (tipoModal == "warning") {
      $('#modals').html("");
      $('#modals')
        .html('<div class="modal-body"><div class="container text-center"><div class="row"><div class="col-12 mb-2"><h3>'+dsTitulo+'</h3><small>'+dsMensagem+'</small></div><hr><div class="col-12 text-center"><button type="button" class="btn text-warnig w-100" data-dismiss="modal">fechar</button></div></div></div></div>');
      $('#alerta1').modal('show');
    } else
      if (tipoModal == "danger") {
        $('#modals').html("");
        $('#modals')
          .html('<div class="modal-body"><div class="container text-center"><div class="row"><div class="col-12 mb-2"><h3>'+dsTitulo+'</h3><small>'+dsMensagem+'</small></div><hr><div class="col-12 text-center"><button type="button" class="btn text-danger w-100" data-dismiss="modal">fechar</button></div></div></div></div>');
        $('#alerta1').modal('show');
      } else {
        $('#modals').html("");
        $('#modals')
          .html('<div class="modal-body"><div class="container text-center"><div class="row"><div class="col-12 mb-2"><h3>'+dsTitulo+'</h3><small>'+dsMensagem+'</small></div><hr><div class="col-12 text-center"><button type="button" class="btn text-primary w-100" data-dismiss="modal">fechar</button></div></div></div></div>');
        $('#alerta1').modal('show');
      }
}
function reloadComponent(Btn) {
  if (Btn) {
    var atualizar_conteudo = document.getElementById("atualizar_conteudo");
    var limpar_cache = document.getElementById("limpar_cache");
    atualizar_conteudo.addEventListener("click", function () {
      $("#conteudo").html("");
      $("#master").html('<div class="row p-3"><div class="col-12 text-center"><div class="center"><div class="reloadSpinner"></div></div><br><span>carregando...</span></div></div>');
      setTimeout(function () {
        console.log(window.location.href);
        //window.location.href = window.location.pathname + window.location.search + window.location.hash;
        $("div#conteudo").load(location.href + " #conteudo");
        //window.location.reload(false);
        iniciarTables();
        //javascript:window.top.location.reload(true)
        $("#master").html('');
      }, 800);
    });
    limpar_cache.addEventListener("click", function () {
      $("#conteudo").html("");
      $("#master").html('<div class="row p-3"><div class="col-12 text-center"><div class="center"><div class="reloadSpinner"></div></div><br><span>carregando...</span></div></div>');
      setTimeout(function () {
        location.reload(true);
        $("#master").html('');
      }, 800);
    });
  }
}
function criarComponentesPadroes() {
  $("#componentesPadroes").html('<div id="modals"></div>');
}
function modalRender() {
  if (document.getElementById("modalAlert")) {
    $('#modalAlert').modal('show');
  }
}
/**Para exibir a modal com opções em tabelas 
 * não responsivas, adicione a classe = class="tr" 
 * a tabela
*/
function exibirOpcoes(componente) {
  $(componente).click(function () {
    console.log("a");
    $('#modals').html('');
    $('#modals')
      .html('<div class="modal fade" id="alerta1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="text-center"><button type="button" class="btn btn-sm btn-block btn-warning" data-dismiss="modal">fechar</button></div></div></div></div></div>');
    $('#alerta1').modal('show');
  });
}
function iniciarTables() {
  if (document.getElementById("#exampla1")) {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  }
  if (document.getElementById("#example2")) {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }
}