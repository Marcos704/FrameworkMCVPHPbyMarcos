<?php

namespace app\functions;

class CustomAlerts
{

    public function setTimeOutAlert($id)
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

    
    public function alertWaring($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-warning' id='$varSessao' role='alert'>
                <strong>$tituloMensagem</strong> $corpoMensagem
            </div>";

        header("Location:" . $rotaExibicao);
    }

    public function alertDanger($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-danger m-0' id='$varSessao' role='alert'>
                <strong>$tituloMensagem</strong>$corpoMensagem
            </div>";

        header("Location:" . $rotaExibicao);
    }

    public function alertPrimary($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-primary' id='$varSessao' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
            </div>";

        header("Location:" . $rotaExibicao);
    }

    public function alertSuccess($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-success' id='$varSessao' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
            </div>";

        header("Location:" . $rotaExibicao);
    }

    public function alertWaringBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";

        header("Location:" . $rotaExibicao);
    }

    public function alertSucessBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$tituloMensagem!</strong> $corpoMensagem
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";

        header("Location:" . $rotaExibicao);
    }

    public function alertDangerBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
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

    public function alertPrimaryBtn($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao)
    {
        @$_SESSION[$varSessao] ="
            <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <strong>$tituloMensagem</strong> $corpoMensagem
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";

        header("Location:" . $rotaExibicao);
    }
    public function isEsqueceuSenha($varSessao, $rotaExibicao)
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
    public function inforAlert($msnInformacao){
        echo "<script>
                window.alert('$msnInformacao');
            </script>";
        header("Location:javascript://history.go(-1)");
    }
    public function localInforAlert($msnInformacao){
        echo "<script>
                window.alert('$msnInformacao');
            </script>";
    }

    public function confirmAlert($msnPergunta,$msnConfirmacao, $rota){
        
        if($rota == null){
            echo "<script>
                if(window.confirm('$msnPergunta'))
                {
                    window.alert('$msnConfirmacao');
                }
            </script>";
        }
        else
        {
            echo "<script>
                if(window.confirm('$msnPergunta'))
                {
                    window.open('$rota','$msnConfirmacao');
                }
            </script>";
            include "app/views/" . $rota .".php";
        }
        
        
    }
}


