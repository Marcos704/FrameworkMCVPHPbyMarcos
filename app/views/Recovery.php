<?php
@session_start();
use app\functions\Util;
use app\core\validacao\Valitation;

$responser = new Util();
$validacao = new Valitation();
$_SESSION['upKey'] = $_GET['upKey'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#353535">
    <meta name="author" content="TeamEngcria">

    <title>TeamEngcria - Login</title>
    <link rel="icon" type="image/png" href="<?php URL_BASE ?>assets/template/sistema/img/Logo.svg" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/617ef9b753.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/dist/css/adminlte.min.css">
    <!--Estilos locais por marquinhos-->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/styles/styles.css">
    <!-- Dados globais by marquinhos --->
    <script src="<?php echo URL_BASE ?>assets/js_master/config/config.js" type="text/javascript"></script>
     <!-- jQuery -->
     <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/jquery/jquery.min.js"></script>
    <!-- Script Mascars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/template_sistema.js"></script> 
</head>

<body class="login-page bg-login-page">
    <div class="login-box">
        <?php if($validacao->SECURITY_BLOCK_SYSTEM_ACESS_RECOVERY_PAGE($_GET['upKey'])){?>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary bg-transparent">
            <div class="card-header text-center">
                <h3 class="text-white">Recuperação de Senha</h3>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-white">Preencha os dados abaixo para prosseguir.</p>
                <div class="col-12" id="retornoMsn">
                </div>
                <form id="recovery" method="POST">
                    <br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-transparent" id="cpf_usuario" name="cpf_usuario" aria-describedby="CPF" placeholder="Informe o seu CPF..." required>
                        <div class="input-group-append">
                            <div class="input-group-text transparent">
                                <span class="fa-solid fa-user-group" style="color:#D6D5A8"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-transparent" id="senha_usuario" name="senha_usuario" placeholder="Informe uma nova senha..." required>
                        <div class="input-group-append">
                            <div class="input-group-text transparent">
                                <a id="btn-eyes1" style="color:#D6D5A8" href="#"><i id="eyes1" class="fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-transparent" id="confirmar_senha_usuario" name="confirmar_senha_usuario" placeholder="Confirme a senha..." required>
                        <div class="input-group-append">
                            <div class="input-group-text transparent">
                                <a id="btn-eyes2" style="color:#D6D5A8" href="#"><i id="eyes2" class="fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-custom-primary">Salvar</button>
                        </div>
                    </div>
                </form>
                <br>
                <footer class="card-footer">
                    <strong>Copyright &copy; 2011-2022 <a href="#">Engcriasoftwares.com</a>.</strong>
                    Todos os direitos reservados.2.0
                </footer>
                <script src="<?php echo URL_BASE ?>assets/js_master/recovery/recovery.js"></script>
            </div>
        </div>
        <?php }else{?>
        <!-- /. page not found -->
        <div class="card card-outline card-primary bg-transparent">
            <div class="card-header text-center">
                <h3 class="text-white">Recuperação de Senha</h3>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-white">
                    Este link de ajuda para senha é inválido ou expirou.
                </p>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="<?php echo URL_BASE?>" class="btn btn-custom-primary">ok</a>
                    </div>
                </div>
                <footer class="card-footer">
                    <strong>Copyright &copy; 2011-2022 <a href="#">Engcriasoftwares.com</a>.</strong>
                    Todos os direitos reservados.2.0
                </footer>
            </div>
            <!-- /.card-body -->
        </div>
        <?php } ?>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/dist/js/adminlte.min.js"></script>
</body>

</html>