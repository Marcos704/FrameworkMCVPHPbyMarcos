<?php

  /**
  *      # (Alerts.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:22:15 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Alert\Alerts.php > 
  * @type      < php > 
  * @author    <seu-nome>
  * @copyright <sua-empresa>
  * ----------------------------
  *      #  Descricao   #
  *     digite a decricao
  * ----------------------------
  * -- gerado automaticamente --
  *       phpcodedetals
  **/

  
function setTimeOutAlert($id)
{
    echo "<script>
            $(document).ready(function(){
                if(document.body.contains(document.getElementById('$id'))){
                     setTimeout(function() {
                         $('#" . "$id').fadeOut(500);
                     }, 5000);	
                 }
             });
        </script>";
}


function alertWaring($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-warning' id='$varSessao' role='alert'>
                <strong>$tituloMensagem</strong> $corpoMensagem
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertDanger($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-danger m-0' id='$varSessao' role='alert'>
                <strong>$tituloMensagem</strong>$corpoMensagem
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertPrimary($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-primary' id='$varSessao' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertSuccess($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-success' id='$varSessao' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertWaringBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertSucessBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertDangerBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong class='text-center'>$tituloMensagem</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
             <br>
             <div class='text-justify'><p>$corpoMensagem</p></div>
            </div>";

    header("Location:" . $rotaExibicao);
}

function alertPrimaryBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
            <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <strong>$tituloMensagem</strong> $corpoMensagem
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";

    header("Location:" . $rotaExibicao);
}
function isEsqueceuSenha($varSessao, $rotaExibicao)
{
    @$_SESSION[$varSessao] = "
                <div class=1mt-11>
                    <button class='btn-recuperar' data-toggle='modal' data-target='#modalRecuperarSenha'>
                        <small class='text-white mb-4'>Esqueceu a senha?</small>
                    </button>
                </div>
        ";
    header("Location:" . $rotaExibicao);
}
function inforAlert($msnInformacao)
{
    echo "<script>
                window.alert('$msnInformacao');
            </script>";
    header("Location:javascript://history.go(-1)");
}
function localInforAlert($msnInformacao)
{
    echo "<script>
                window.alert('$msnInformacao');
            </script>";
}

function confirmAlert($msnPergunta, $msnConfirmacao, $rota)
{

    if ($rota == null) {
        echo "<script>
                if(window.confirm('$msnPergunta'))
                {
                    window.alert('$msnConfirmacao');
                }
            </script>";
    } else {
        echo "<script>
                if(window.confirm('$msnPergunta'))
                {
                    window.open('$rota','$msnConfirmacao');
                }
            </script>";
        include "app/views/" . $rota . ".php";
    }
}

function inforAlertRedirect($msnInformacao, $rota)
{
    echo "<script>
            window.alert('$msnInformacao');
        </script>";
    if ($rota == null) {
        echo "<script>
        window.location='$rota'
        </script>";
    } else {
        header("Location: " . URL_BASE . $rota);
    }
}
function windowAlert($msnInformacao){
    echo "<script>
            window.alert('$msnInformacao');
        </script>";
}
