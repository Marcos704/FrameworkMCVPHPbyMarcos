$(document).ready(function () {
    if (document.body.contains(document.getElementById("genericResponser"))) {
        setTimeout(function () {
            $("#genericResponser").fadeOut(500);
        }, 5000);
    }
    if (document.body.contains(document.getElementById("loginResponser"))) {
        setTimeout(function () {
            $("#loginResponser").fadeOut(500);
        }, 5000);
    }
    if ($('#modalRecuperarSenha').hasClass('show')) {
        // if modal is not shown/visible then do something
        console.log("ta visise ");
    }

});
$("#btn-eyes").click(function () {
    var btn_eyes = document.getElementById("eyes");
    var inputPassword = document.getElementById("senha_usuario");
    if (btn_eyes.classList == "fa-solid fa-eye") {
        btn_eyes.classList.remove("fa-eye");
        btn_eyes.classList.toggle("fa-eye-slash");
        inputPassword.type = 'text';
    } else {
        btn_eyes.classList.remove("fa-eye-slash");
        btn_eyes.classList.toggle("fa-eye");
        inputPassword.type = 'password';
    }
});
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
var senhaInput = document.getElementById("senha_usuario");
cpfInput.addEventListener("blur", validarCampoCPF_Login, true);
cpfInput.addEventListener("change", validarCampoCPF_Login, true);
cpfInput.addEventListener("focusout", validarCampoCPF_Login, true);

senhaInput.addEventListener("blur", validarCampoCPF_Login, true);
senhaInput.addEventListener("change", validarCampoCPF_Login, true);
senhaInput.addEventListener("focusout", validarCampoCPF_Login, true);

function validarCampoCPF_Login() {

    var Data = document.getElementById("cpf_usuario").value;
    var DataSenha = document.getElementById("senha_usuario").value;
    var ComponenteLabel = document.getElementById("msn-cpf");
    var ComponenteLayout = document.getElementById("cpf_usuario");
    var ComponenteLayoutSenha = document.getElementById("senha_usuario");
    var FormatData = validadorCPF(Data);

    ComponenteLabel.innerHTML = "<p class='container msn-success'></p>";

    /**Validando o CPF e método de entrada pro suporte técnico */
    ComponenteLabel.innerHTML = "<p class='container msn-success'></p>";
    if (FormatData) {
        ComponenteLabel.innerHTML = "<p class='container msn-success'>CPF válido!</p>";
        ComponenteLayout.classList.remove("form-control-invalid");
        ComponenteLayout.classList.toggle("form-control-valid");
        console.log("Valido");
    } else {
        ComponenteLabel.innerHTML = "<p class='container msn-danger'>O CPF digitado não é válido</p>";
        //ComponenteLayout.classList.remove("form-control-valid");
        ComponenteLayout.classList.toggle("form-control-invalid");
    }

}

/*  Validação do campo de cpf via frontEnd para o formulário 
    de recuperação de senha - Login
*/
var cpfInput_Rec = document.getElementById("cpf_usuario_rec");
cpfInput_Rec.addEventListener("blur", validarCampoCPF_Rec, true);
cpfInput_Rec.addEventListener("change", validarCampoCPF_Rec, true);
cpfInput_Rec.addEventListener("focusout", validarCampoCPF_Rec, true);


function validarCampoCPF_Rec() {

    var Data = document.getElementById("cpf_usuario_rec").value;
    var ComponenteLabel = document.getElementById("msn-cpf-rec");
    var ComponenteLayout = document.getElementById("cpf_layout_rec");
    var FormatData = validadorCPF(Data);

    ComponenteLayout.classList.remove("input100-danger");
    ComponenteLabel.innerHTML = "<p class='container msn-success'></p>";
    //Validando o CPF e método de entrada pro suporte técnico 
    if (FormatData) {
        ComponenteLabel.innerHTML = "<p class='container msn-success'>CPF válido!</p>";
        ComponenteLayout.classList.toggle("input100-success p-2 m-2");
        console.log("Valido");
    } else if (Data.length === 0 && FormatData === false) {
        ComponenteLabel.innerHTML = "<p class='container msn-danger'>Campo obrigatório! Informe o cpf.</p>";
        ComponenteLayout.classList.remove("input100-success");
        ComponenteLayout.classList.toggle("input100-danger p-2 m-2");
    } else {
        ComponenteLabel.innerHTML = "<p class='container msn-danger'>O CPF digitado não é válido</p>";
        ComponenteLayout.classList.remove("input100-success");
        ComponenteLayout.classList.toggle("input100-danger p-2 m-2");
        console.log("Não válido");
    }

}