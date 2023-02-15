<?php
@session_start();

use app\functions\Util;

$acessoVerificacao = new Util();
$acessoVerificacao->acessoVerification();
$responser = new Util();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <title>Team Engcria</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/617ef9b753.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/fontawesome-free/css/all.min.css">
     overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="shortcut icon" href="<?php echo URL_BASE ?>assets/template/sistema/assets/Logo.svg" type="image/x-icon">
    <link rel="icon" href="<?php echo URL_BASE ?>assets/template/sistema/img/Logo.svg" type="image/x-icon">
    <!-- jQuery -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Gerador de pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js" integrity="sha512-rDbVu5s98lzXZsmJoMa0DjHNE+RwPJACogUCLyq3Xxm2kJO6qsQwjbE5NDk2DqmlKcxDirCnU1wAzVLe12IM3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <!--Estilos locais por marquinhos-->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/styles/styles.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/styles/custom.scss">
    
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" >
    <div class="wrapper" id="conteudo_geral">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">

        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-ligth bg-white">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" role="button" title="atualizar" id="atualizar_conteudo">
                        <i class="fa-solid fa-rotate"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" title="limpar cache" id="limpar_cache">
                        <i class="fa-solid fa-retweet text-gray-400"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-primary">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <a href="#">
                    <img src="<?php echo URL_BASE ?>assets/template/sistema/img/Logo.svg" class="img-circle elevation-2" style="opacity: .8" alt="Engcria Logo" width="30px">
                    <span>Engcria team</span>
                </a>
                <hr>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <!-- Brand Logo -->
                        <span class="brand-text font-weight-light">
                            <?php $responser->TITULO_PAGINA(); ?></span><br>
                        <span><p class="text-wrap" style="width: 6rem;">Olá, <?php echo obterDadosSessao("dadosUsuario","nmUsuario") ?></p></span>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!--MENU LATERAL SISTEMA-->
                        <?php
                        $responser->MENU_LINK();
                        ?>
                        <!-- FIM MENU LATERAL SISTEMA -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div id="master"></div>
                <div id="conteudo">
                <div class="container-fluid pt-2">
                    <?php
                    //include_once("suporte/dashboard.php");
                    $this->load($view, $viewData);
                    ?>
                </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2011-2022 <a href="#">Engcriasoftwares.com</a>.</strong>
            Todos os direitos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Versão</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="modalLongOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <h5>Deseja fechar o sistema?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="<?php echo URL_BASE . "System/longOut" ?>">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="componentesPadroes"></div>
    <!-- REQUIRED SCRIPTS -->
    <!-- overlayScrollbars -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/dist/js/demo.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Script Mascars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Dados globais by marquinhos --->
    <script src="<?php echo URL_BASE ?>assets/js_master/config/config.js" type="text/javascript"></script>
    <script src="<?php echo URL_BASE ?>assets/js_master/engcriaTemplate2022.js"></script>
</body>

</html>