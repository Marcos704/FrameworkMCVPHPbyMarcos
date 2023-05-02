<?php

  /**
  *      # (Notification.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:21:36 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Notification\Notification.php > 
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
  
/**
 * Notificação com rota de exibicao
 *  - Notificação com efeito de fadeOut
 */
function notificacao1($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao, $tipo, $fadeOut)
{
    if ($tituloMensagem == null || $tituloMensagem == false) {
        switch ($tipo) {
            case 'success':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-success notificacao-success' id='$varSessao' role='alert'>
                    <span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
            case 'primary':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-primary notificacao-primary' id='$varSessao' role='alert'>
                    <span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
            case 'warning':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-warning notificacao-warning' id='$varSessao' role='alert'>
                    <span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
            case 'danger':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-danger notificacao-danger' id='$varSessao' role='alert'>
                    <span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
        }
    } else {
        switch ($tipo) {
            case 'success':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-success notificacao-success' id='$varSessao' role='alert'>
                    <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
            case 'primary':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-primary notificacao-primary' id='$varSessao' role='alert'>
                    <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
            case 'warning':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-warning notificacao-warning' id='$varSessao' role='alert'>
                    <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
            case 'danger':
    
                @$_SESSION[$varSessao] = "
                <div id='notificacao1' class='alert alert-danger notificacao-danger' id='$varSessao' role='alert'>
                    <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                </div>";
                header("Location:" . $rotaExibicao);
    
                break;
        }
    }
    if ($fadeOut) {
        @$_SESSION['script'] = "<script>
            $(document).ready(function(){
                if(document.body.contains(document.getElementById('notificacao1'))){
                     setTimeout(function() {
                         $('#notificacao1').fadeOut(500);
                     }, 5000);	
                 }
             });
        </script>";
    }
}
/**
 * Notificação com rota de exibicao
 *  - Notificação com efeito de fadeOut
 *  - Com botão close modal
 */
function notificacao2($tituloMensagem, $corpoMensagem, $varSessao, $rotaExibicao, $tipo, $fadeOut)
{
    switch ($tipo) {
        case 'success':

            @$_SESSION[$varSessao] = "
            <div id='notificacao2' class='alert alert-success notificacao-success alert-dismissible fade show' role='alert'>
                <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
            header("Location:" . $rotaExibicao);

            break;
        case 'primary':

            @$_SESSION[$varSessao] = "
            <div id='notificacao2' class='alert alert-primary notificacao-primary alert-dismissible fade show' role='alert'>
                <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
            header("Location:" . $rotaExibicao);

            break;
        case 'warning':

            @$_SESSION[$varSessao] = "
            <div id='notificacao2' class='alert alert-warning notificacao-warning alert-dismissible fade show' role='alert'>
                <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
            header("Location:" . $rotaExibicao);

            break;
        case 'danger':

            @$_SESSION[$varSessao] = "
            <div id='notificacao2' class='alert alert-danger notificacao-danger alert-dismissible fade show' role='alert'>
                <span><strong>$tituloMensagem</strong></span><br><span>$corpoMensagem</span>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
            header("Location:" . $rotaExibicao);

            break;
    }
    if ($fadeOut) {
        @$_SESSION['script'] = "<script>
            $(document).ready(function(){
                if(document.body.contains(document.getElementById('notificacao2'))){
                     setTimeout(function() {
                         $('#notificacao2').fadeOut(500);
                     }, 5000);	
                 }
             });
        </script>";
    }
}
/**
 * Notificação com rota de exibicao
 *  - Notificação com efeito de fadeOut
 *  - Notificação com rowBackPage
 *  - Notificação Windows Alert
 */
function windowsAlert($corpoMensagem, $rowBack)
{
    if ($rowBack) {

        echo "<script>
            if(window.confirm('$corpoMensagem'))
            { 
                location.href = document.referrer; 
            }
        </script>";
    } else {
        echo "<script>window.alert('$corpoMensagem');</script>";
    }
}
/**
 * Notificação com rota de exibicao
 *  - Notificação com efeito de fadeOut
 *  - Notificação com rota
 *  - Notificação Windows Confirm
 */
function windowsConfirm($dsPergunta, $dsConfirmacao, $rota)
{

    if ($rota == null) {
        echo "<script>
            if(window.confirm('$dsPergunta'))
            {
                window.alert('$dsConfirmacao');
            }
        </script>";
    } else {
        echo "<script>
            if(window.confirm('$dsPergunta'))
            {
                window.open('$rota','$dsConfirmacao');
            }
        </script>";
        include "app/views/" . $rota . ".php";
    }
}
/**
 * Notificação
 *  - Notificação Modal Bootstrap
 */
function msg($type, $message)
{
    if ($type == 'erro') {
?>
        <div class="modal" tabindex="-1" id="msg" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body bg-danger">
                        <div class="container text-center">
                            <div class="alert alert-danger" role="alert">
                                <strong>Erro! </strong><?php echo $message; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#msg').modal('show');
        </script>

<?php
    } else
    if ($type == 'infor') {
        echo '<h3 class="text-primary">' . $message . '</h3>';
        exit();
    } else
    if ($type == 'success') {
        echo '<h3 class="text-success">' . $message . '</h3>';
        exit();
    }
    return 'display:none;';
}
