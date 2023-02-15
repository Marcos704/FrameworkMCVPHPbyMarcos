var MSN_ERRO_TABLE_NOT_FOUND = "<strong class='text-danger'>SQL ERRO!</strong><br><small><strong class='text-danger'>Codigo Erro: </strong><small class='text-danger'>42S02</small><br><strong class='text-danger'>Descrição: </strong><small class='text-danger'>Tabela não cadastrada</small></small>";

setInterval(totalUsuarios, 800);
setInterval(totalPF, 800);
setInterval(totalPJ, 800);
setInterval(totalPropostas, 800);
setInterval(totalPropostasAnalise, 800);
setInterval(totalPropostasAceitas, 800);
setInterval(totalPropostasNegadas, 800);
setInterval(totalPropostasFinalizadas, 800);
setInterval(totalBancosCadastrados, 800);
clearInterval();/*
startGrafico();
totalUsuarios();
totalPF();
totalPJ();
totalPropostas();
totalPropostasAnalise();
totalPropostasAnalise();
totalPropostasNegadas();
totalPropostasFinalizadas();
totalBancosCadastrados();*/

async function totalUsuarios() {
    $.ajax({
        url: URL_BASE + "System/totalUsuariosCadastrados",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalUsuariosCadastrados").html(resultado);
            } else {
                $("#totalUsuariosCadastrados").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalUsuariosCadastrados").html("Erro ao obter dados");
        }
    });
}
async function totalPF() {
    $.ajax({
        url: URL_BASE + "System/totalUsuariosPFCadastrados",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalUsuariosPFCadastrados").html(resultado);
            } else {
                $("#totalUsuariosPFCadastrados").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalUsuariosPFCadastrados").html("Erro ao obter dados");
        }
    });
}
async function totalPJ() {
    $.ajax({
        url: URL_BASE + "System/totalUsuariosPJCadastrados",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalUsuariosPJCadastrados").html(resultado);
            } else {
                $("#totalUsuariosPJCadastrados").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalUsuariosPJCadastrados").html("Erro ao obter dados");
        }
    });
}
async function totalPropostas() {
    $.ajax({
        url: URL_BASE + "System/totalPropostasCadastrados",
        success: function (resultado) {
            if (resultado != "Fatal error") {
                $("#totalPropostasCadastrados").html(resultado);
            } else {
                $("#totalPropostasCadastrados").html(MSN_ERRO_TABLE_NOT_FOUND);
                console.log("Erro:"+resultado);
            }
        },
        error: function (resultado){
            $("#totalPropostasCadastrados").html("Erro ao obter dados");
        }
    });
}
async function totalPropostasAnalise() {
    $.ajax({
        url: URL_BASE + "System/totalPropostasAnalise",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalPropostasAnalise").html(resultado);
            } else {
                $("#totalPropostasAnalise").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalPropostasAnalise").html("Erro ao obter dados");
        }
    });
}
async function totalPropostasAceitas() {
    $.ajax({
        url: URL_BASE + "System/totalPropostasAceitas",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalPropostasAceitas").html(resultado);
            } else {
                $("#totalPropostasAceitas").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalPropostasAceitas").html("Erro ao obter dados");
        }
    });
}
async function totalPropostasNegadas() {
    $.ajax({
        url: URL_BASE + "System/totalPropostasNegadas",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalPropostasNegadas").html(resultado);
            } else {
                $("#totalPropostasNegadas").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalPropostasNegadas").html("Erro ao obter dados");
        }
    });
}
async function totalPropostasFinalizadas() {
    $.ajax({
        url: URL_BASE + "System/totalPropostasFinalizadas",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalPropostasFinalizadas").html(resultado);
            } else {
                $("#totalPropostasFinalizadas").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalPropostasFinalizadas").html("Erro ao obter dados");
        }
    });
}
async function totalBancosCadastrados() {
    $.ajax({
        url: URL_BASE + "System/totalBancosCadastrados",
        success: function (resultado) {
            if (resultado != null && resultado != "Fatal error") {
                $("#totalBancosCadastrados").html(resultado);
            } else {
                $("#totalBancosCadastrados").html(MSN_ERRO_TABLE_NOT_FOUND);
            }
        },
        error: function (resultado) {
            $("#totalBancosCadastrados").html("Erro ao obter dados");
        }
    });
}