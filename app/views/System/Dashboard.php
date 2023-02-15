<?php
@session_start();

use app\core\validacao\Valitation;
$validacao = new Valitation();
if (!$validacao->SECURITY_BLOCK_SYSTEM("pDashboard", obterDadosSessao("dadosUsuario","cpfUsuario")) ||obterDadosSessao("dadosUsuario","tpUsuario") != "Administrador") {
    msg('erro', 'Nível de Permissão requerida!<br>P: Ver Dashboard & Tipo Usuario| S: false');
}
?>
<div class="p-1" style="<?php echo $d; ?>">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard - Suporte</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Usuários <br>Cadastrados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalUsuariosCadastrados">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Clientes<br> Pessoa Fisica</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalUsuariosPFCadastrados">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Clientes<br> Pessoa Juridica</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalUsuariosPJCadastrados">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Propostas<br>Cadastrados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPropostasCadastrados">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-powerpoint fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Propostas (total)<br>-Em Analise-</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPropostasAnalise">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Propostas (Total)<br>-Aprovada-</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPropostasAceitas">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Propostas (Total)<br>-Negada-</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPropostasNegadas">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Propostas (Total)<br>-Finalizada-</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPropostasFinalizadas">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bancos (Total)<br>-Cadastrados-</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalBancosCadastrados">
                                carregando...
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/dashboard/dashboard.js"></script>