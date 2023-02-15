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

<body class="bg-login-page">
    <div class="container">
        <div class="card">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7 bg-login-image img-fluid m-0 p-0 b-card">
                    </div>
                    <div class="col-lg-5">
                        <div class="m-0 p-0">
                            <div class="row mt-5 p-2">
                                <div class="col-12 text-center">
                                    <h3>Bem Vindo!</h3>
                                    <span>Faça o login para prosseguir</span>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <form action="Login/singIn" method="POST">
                                        <?php isSessaoExistente("loginResponser"); ?>
                                        <br>
                                        <div class="container">
                                            <span>CPF</span><br>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="cpfUsuario" name="cpfUsuario" placeholder="Informe o seu CPF..." data-numerico data-cpf required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text transparent">
                                                        <span class="fa-solid fa-key fontColor-custom-primary" title="Informe o seu CPF"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span>Senha</span><br>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" data-inputpassword required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text transparent">
                                                        <a id="btn-eyes" href="#" data-btneyes><i id="eyes" class="fa-solid fa-eye fontColor-custom-primary" data-iconpassword></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col-12 mt-2">
                                                    <button type="submit" class="btn btn-custom-primary btn-block">Entrar na plataforma</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </div>
                                    </form>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">
                                                <p class="mb-1 mt-3 ml-2">
                                                    Precisa de ajuda? <a href="https://api.whatsapp.com/send?phone=5598987446205&text=Olá! Preciso de ajuda." target="_blank">Fale com o suporte.</a>
                                                </p>
                                            </div>
                                        </div>
                                        <br><!-- Main Footer -->
                                        <footer class="card-footer">
                                            <strong>Copyright &copy; 2011-2022 <a href="#">Engcriasoftwares.com</a>.</strong>
                                            Todos os direitos reservados.2.0
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/dist/js/adminlte.min.js"></script>
    <?php isSessaoExistente("script"); ?>
</body>

</html>