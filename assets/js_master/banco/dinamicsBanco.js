$(document).ready(function () {
    exibirComponenteImg();
});
/**
 * Componente Input File Cadastro de Banco e Conciliadora
 * - Método responsavel pela lógica visual do input file
 */
var componenteImg = document.getElementById("componente-img");
var imgResult = document.getElementById("img-result");
var componenteInput = document.getElementById("componente-input-file");
var componenteInputData = document.getElementById("componente-input-file").value;
if (componenteImg) {
    componenteImg.addEventListener("click", exibirComponenteFile, true);
}

function exibirComponenteImg() {
    document.getElementById("logo_banco_administradora").onchange = function () {
        let reader = new FileReader();
        reader.onload = () => {
            fileName = this.files[0].name;
            extension = fileName.split('.').pop();
            if (extension == "png" || extension == "jpg" || extension == "jpeg") {
                componenteInput.classList.toggle("ocultar-componente");
                componenteImg.classList.remove("ocultar-componente");
                imgResult.src = reader.result;
            }else{
                window.alert("Formato de arquivo inválido!\n*Formato permitido: png | jpeg | jpg");
            }

        }
        reader.readAsDataURL(this.files[0]);
    }
}
function exibirComponenteFile() {
    componenteImg.classList.toggle("ocultar-componente");
    componenteInput.classList.remove("ocultar-componente");
}
/**
 * CNPJ Valitation
 * solução encontrada e adaptada
 * url: https://gist.github.com/webarthur/aa1fe0b71868ee9d0097f69f927d72d6
 * Obs: A solução foi adaptada e sofreu adições por parte do programador
 * 
 */
function validarCNPJ(data) {

    var b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]
    var cnpj = String(data).replace(/[^\d]/g, '')
    if (!cnpj || cnpj.length != 14
        || cnpj == "00000000000000"
        || cnpj == "11111111111111"
        || cnpj == "22222222222222"
        || cnpj == "33333333333333"
        || cnpj == "44444444444444"
        || cnpj == "55555555555555"
        || cnpj == "66666666666666"
        || cnpj == "77777777777777"
        || cnpj == "88888888888888"
        || cnpj == "99999999999999") {
        return false
    }
    if (cnpj.length !== 14) {
        return false
    }

    if (/0{14}/.test(cnpj)) {
        return false
    }

    for (var i = 0, n = 0; i < 12; n += cnpj[i] * b[++i]);
    if (cnpj[12] != (((n %= 11) < 2) ? 0 : 11 - n))
        return false

    for (var i = 0, n = 0; i <= 12; n += cnpj[i] * b[i++]);
    if (cnpj[13] != (((n %= 11) < 2) ? 0 : 11 - n))
        return false

    return true
}
var cnpjInput = document.getElementById("cnpj_banco");
cnpjInput.addEventListener("blur", test, true);
cnpjInput.addEventListener("change", test, true);
cnpjInput.addEventListener("focusout", test, true);
function test() {
    var cnpjData = document.getElementById("cnpj_banco").value;
    var validacao = validarCNPJ(cnpjData);
    if (validacao) {
        console.log("CNPJ VALIDO");
    } else {
        console.log("CNPJ invalid");
    }
}
