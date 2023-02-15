


/** Método para retirar a formatção do 
 * campo CPF. Transforma o mesmo em valor numerico
 */
 function cpfToInt(Data) {
  var SEPARADOR_GRUPOS = ".";
  var SEPARADOR_DIGITO_VERIFICADOR = "-";
  var cpf = Data;
  if (cpf != null && cpf != "") {
      cpf = cpf.replaceAll("\\" + SEPARADOR_GRUPOS, "")
          .replaceAll("\\" + SEPARADOR_DIGITO_VERIFICADOR, "");
  }
  return cpf;
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

/*  Validação do campo de cpf via frontEnd para o formulário
  principal - Login
*/
var cpfInput = document.getElementById("cpf_usuario");
cpfInput.addEventListener("blur", validarCampoCPF_Login, true);
cpfInput.addEventListener("change", validarCampoCPF_Login, true);
cpfInput.addEventListener("focusout", validarCampoCPF_Login, true);

function validarCampoCPF_Login() {

  var Data = document.getElementById("cpf_usuario").value;
  var ComponenteLayout = document.getElementById("cpf_usuario");
  var FormatData = validadorCPF(Data);

  ComponenteLabel.innerHTML = "<p class='container msn-success'></p>";

  /**Validando o CPF e método de entrada pro suporte técnico */
  ComponenteLabel.innerHTML ="<p class='container msn-success'></p>";
  if(FormatData){
      ComponenteLayout.classList.remove("form-control-user-sm")
      ComponenteLayout.classList.toggle("form-control-user-sm-valid");
      console.log("Valido");
  }else{//ComponenteLayout.classList.remove("form-control-valid");
      ComponenteLayout.classList.toggle("form-control-user-sm-invalid");
  }

}