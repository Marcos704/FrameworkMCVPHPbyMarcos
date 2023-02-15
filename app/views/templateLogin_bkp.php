<?php @session_start() ?>
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
    <!-- jQuery -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/jquery/jquery.min.js"></script>
    <!-- Script Mascars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/engcriaTemplate2022.js"></script>
</head>

<body class="login-page bg-login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>
                    <b><?php echo TITULO_LOGIN ?></b>
                </h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Bem vindo de volta!</p>
                <form action="Login/singIn" method="POST">
                    <?php isSessaoExistente("loginResponser"); ?>
                    <br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="cpfUsuario" name="cpfUsuario" placeholder="Informe o seu CPF..." data-numerico data-cpf required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa-solid fa-key text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" data-inputpassword required>
                        <div class="input-group-append">
                            <div class="input-group-text transparent">
                                <a id="btn-eyes" href="#" data-btneyes><i id="eyes" class="fa-solid fa-eye" data-iconpassword></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Entrar na plataforma</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <hr>
                <p class="mb-1">
                    Precisa de ajuda? <a href="https://api.whatsapp.com/send?phone=5598987446205&text=Olá! Preciso de ajuda." target="_blank">Fale com o suporte.</a>
                </p>
            </div>
            <br><!-- Main Footer -->
            <footer class="card-footer">
                <strong>Copyright &copy; 2011-2022 <a href="#">Engcriasoftwares.com</a>.</strong>
                Todos os direitos reservados.2.0
            </footer>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/dist/js/adminlte.min.js"></script>
    <?php isSessaoExistente("script"); ?>
</body>

</html>