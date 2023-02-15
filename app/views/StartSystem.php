<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#353535">
    <meta name="author" content="TeamEngcria">

    <title>TeamEngcria - ConfiguracoesIniciais</title>
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
    <script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/config/config.js"></script>
    <script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/engcriaTemplate2022.js"></script>
</head>

<body class="bg-login-page">
    <section class="container content pt-1 mt-2">
        <div class="content-fluid">
            <div class="bd-callout bd-callout-info">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">
                                <h3>Configuracoes Iniciais</h3>
                                <br>
                                <span><small>Os campos marcados com arterísco são obrigatórios</small></span>
                                <div id="retornoMsn"></div>
                            </div>
                            <div class="card-body p-2">
                                <form id="formDadosIntegracao" data-stopformrefresh method="POST">
                                    <div class="contaiener">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div class="icon-custom-text">
                                                        <i class="fa-solid fa-server"> </i>
                                                    </div>
                                                    <span> - Banco de dados e Conexão</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Servidor (URL)</label>
                                                    <input type="text" class="form-control" value="<?php echo SERVIDOR ?>" disabled>
                                                    <input name="dtCadastroUsuario" type="hidden" class="form-control" value="<?php echo HORA_PADRAO ?>">
                                                    <input name="mCPF" id="mCPF" type="hidden" class="form-control" value="<?php echo HORA_PADRAO ?>">
                                                    <input name="pCPF" id="pCPF" type="hidden" class="form-control" value="<?php echo HORA_PADRAO ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Banco (Atual)</label>
                                                    <input type="text" class="form-control" value="<?php echo BANCO ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Dominio (URL)</label>
                                                    <input type="text" class="form-control" value="<?php echo URL_BASE ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Status (Banco de dados)</label>
                                                    <input type="text" class="form-control" value="----" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div class="icon-custom-text">
                                                        <i class="fa-solid fa-gears"></i>
                                                    </div>
                                                    <span> - Informações de Acesso Padrão</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="cpfUsuario">CPF. Integração (User)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe o CPF" data-cpf name="cpfUsuario" id="cpfUsuario" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nmCompletoUsuario">Nome. Integração (User)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe o nome completo" name="nmCompletoUsuario" id="nmCompletoUsuario" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="emailUsuario">Email. Integração (User)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe o E-mail" data-email name="emailUsuario" id="emailUsuario" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="tpUsuario">Tipo. Integração (User)*</label>
                                                    <select class="form-control" name="tpUsuario" id="tpUsuario" data-obrigatorio="sim">
                                                        <option value="null" selected disabled> -Disponiveis- </option>
                                                        <option value="Administrador">Administrador</option>
                                                        <option value="Gerente">Gerente</option>
                                                        <option value="Personal">Personal</option>
                                                        <option value="Aluno">Aluno</option>
                                                        <option value="Recepcao">Recepção</option>
                                                        <option value="Tesouleiro">Tesouleiro</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="ativoUsuario">Ativo (User)*</label>
                                                    <select class="form-control" name="ativoUsuario" id="ativoUsuario" data-obrigatorio="sim">
                                                        <option value="null" selected disabled> -Disponiveis- </option>
                                                        <option value="1">Sim</option>
                                                        <option value="0">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="senhaUsuario">Senha. Integração (User)*</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Informe uma Senha" data-obrigatorio="sim">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <a id="btn-eyes1" class="text-primary" href="#"><i id="eyes1" class="fa-solid fa-eye"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="senhaUsuario">Confirmar Senha (User)*</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="senhaUsuarioConfirmar" name="senhaUsuarioConfirmar" placeholder="Confirme a sua Senha" data-obrigatorio="sim">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <a id="btn-eyes2" class="text-primary" href="#"><i id="eyes2" class="fa-solid fa-eye"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div class="icon-custom-text">
                                                        <i class="fa-solid fa-warehouse"></i>
                                                    </div>
                                                    <span> - Informações da Academia</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="cpfUsuario">CNPJ. Integração (Filial)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe o CNPJ" data-cnpj name="cnpjFilial" id="cnpjFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="rmFilial">Ramo. Integração (Filial)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe o Ramo de Atividade" name="rmFilial" id="rmFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Tipo. Filial (Filial)*</label>
                                                    <select class="form-control" name="tpFilial" id="tpFilial" data-obrigatorio="sim">
                                                        <option value="null" selected disabled> -Disponiveis- </option>
                                                        <option value="Loja">Loja</option>
                                                        <option value="Deposito">Deposito</option>
                                                        <option value="Transportadora">Transportadora</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Tipo. CNPJ (Filial)*</label>
                                                    <select class="form-control" name="tpCnpjFilial" id="tpCnpjFilial" data-obrigatorio="sim">
                                                        <option value="null" selected disabled> -Disponiveis- </option>
                                                        <option value="Matriz">Matriz</option>
                                                        <option value="Filial">Filial</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="rsFilial">Apelido (Filial)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe..." name="rsFilial" id="rsFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="ncFilial">Telefone (Filial)*</label>
                                                    <input type="text" class="form-control" data-fone data-telefone placeholder="Informe" name="ncFilial" id="ncFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="ncwFilial">Celular/Whatsapp (Filial)*</label>
                                                    <input type="text" class="form-control" data-fone data-celular placeholder="Informe" name="ncwFilial" id="ncwFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nmResposavelFilial">Responsável (Filial)*</label>
                                                    <input type="text" class="form-control" placeholder="Informe" name="nmResposavelFilial" id="nmResposavelFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="emailFilial">e-mail (Filial)*</label>
                                                    <input type="text" class="form-control" data-email placeholder="Informe" name="emailFilial" id="emailFilial" data-obrigatorio="sim">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="ativoFilial">Empresa Ativa?(Filial)*</label>
                                                    <select class="form-control" name="ativoFilial" id="ativoFilial" data-obrigatorio="sim">
                                                        <option value="null" selected disabled> -Disponiveis- </option>
                                                        <option value="1">Sim</option>
                                                        <option value="0">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="dtCadastroFilial">Data Cadastro (Filial)</label>
                                                    <input type="text" class="form-control" value="<?php echo HORA_PADRAO_EXIBICAO ?>" disabled>
                                                    <input id="dtCadastroFilial" name="dtCadastroFilial" type="hidden" class="form-control" value="<?php echo HORA_PADRAO ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div class="icon-custom-text">
                                                        <i class="fa-solid fa-print"></i>
                                                    </div>
                                                    <span> - Relatórios e impressões</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="dsCabecalhoRelatoriosImpressoesFilial">Cabeçalho (Impressões e Relatorios)*</label>
                                                    <textarea class="form-control" id="dsCabecalhoRelatoriosImpressoesFilial" name="dsCabecalhoRelatoriosImpressoesFilial" rows="3" data-obrigatorio="sim"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div class="icon-custom-text">
                                                        <i class="fa-solid fa-chalkboard-user"></i>
                                                    </div>
                                                    <span> - Rotinas e Permissões</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="accordion" id="accordionPermissoes">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePermissoes" aria-expanded="true" aria-controls="collapsePermissoes">
                                                                    Acessar Módulos e Permissões (M+P)
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapsePermissoes" class="collapse" aria-labelledby="headingOne" data-parent="#accordionPermissoes">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de cadastros</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mCadastros" id="mCadastros" value="1">
                                                                                                    <label class="form-check-label" for="mCadastros"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadUsuarios" value="1">
                                                                                                    <label class="form-check-label" for="pcadUsuarios">(Usuarios)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadVeiculos" value="1">
                                                                                                    <label class="form-check-label" for="pcadVeiculos">(Veiculos)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadMotorista" value="1">
                                                                                                    <label class="form-check-label" for="pcadMotorista">(Motorista)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="cadOficina" value="1">
                                                                                                    <label class="form-check-label" for="pcadOficina">(Oficina)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadTpServicos" value="1">
                                                                                                    <label class="form-check-label" for="pcadTpServicos">(TpServicos)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadPostos" value="1">
                                                                                                    <label class="form-check-label" for="pcadPostos">(Postos)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadDefeitos" value="1">
                                                                                                    <label class="form-check-label" for="pcadDefeitos">(Defeitos)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadTpCombustivel" value="1">
                                                                                                    <label class="form-check-label" for="pcadTpCombustivel">(TpCombustivel)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadTpInfracoes" value="1">
                                                                                                    <label class="form-check-label" for="pcadTpInfracoes">(TpInfracoes)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de Viagem</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mViagem" id="mViagem" value="1">
                                                                                                    <label class="form-check-label" for="mViagem"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadViagem" value="1">
                                                                                                    <label class="form-check-label" for="pcadViagem">(Cadastrar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="plistViagem" value="1">
                                                                                                    <label class="form-check-label" for="plistViagem">(Listar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="peditViagem" value="1">
                                                                                                    <label class="form-check-label" for="peditViagem">(Editar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pexViagem" value="1">
                                                                                                    <label class="form-check-label" for="pexViagem">(Excluir)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de Oficina</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mOficina" id="mOficina" value="1">
                                                                                                    <label class="form-check-label" for="mOficina"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadServicoOficina" value="1">
                                                                                                    <label class="form-check-label" for="pcadServicoOficina">(Cadastrar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="plistServicosOficina" value="1">
                                                                                                    <label class="form-check-label" for="plistServicosOficina">(Listar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="peditServicosOficina" value="1">
                                                                                                    <label class="form-check-label" for="peditServicosOficina">(Editar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pexServicosOficina" value="1">
                                                                                                    <label class="form-check-label" for="pexServicosOficina">(Excluir)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de Manunteção</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mManutencao" id="mManutencao" value="1">
                                                                                                    <label class="form-check-label" for="mManutencao"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadServicosManutencao" value="1">
                                                                                                    <label class="form-check-label" for="pcadServicosManutencao">(Cadastrar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="plistServicosManutencao" value="1">
                                                                                                    <label class="form-check-label" for="plistServicosManutencao">(Listar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="peditServicosManutencao" value="1">
                                                                                                    <label class="form-check-label" for="peditServicosManutencao">(Editar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pexServicosManutencao" value="1">
                                                                                                    <label class="form-check-label" for="pexServicosManutencao">(Excluir)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo Financeiro</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mFinanceiro" id="mFinanceiro" value="1">
                                                                                                    <label class="form-check-label" for="mFinanceiro"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadServicosFinanceiro" value="1">
                                                                                                    <label class="form-check-label" for="pcadServicosFinanceiro">(Cadastrar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="plistServicosFinanceiro" value="1">
                                                                                                    <label class="form-check-label" for="plistServicosFinanceiro">(Listar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="peditServicoFinanceiro" value="1">
                                                                                                    <label class="form-check-label" for="peditServicoFinanceiro">(Editar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pexServicosFinanceiro" value="1">
                                                                                                    <label class="form-check-label" for="pexServicosFinanceiro">(Excluir)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de Multas</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mMultas" id="mMultas" value="1">
                                                                                                    <label class="form-check-label" for="mMultas"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pcadMulta" value="1">
                                                                                                    <label class="form-check-label" for="pcadMulta">(Cadastrar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="plistMulta" value="1">
                                                                                                    <label class="form-check-label" for="plistMulta">(Listar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="peditMulta" value="1">
                                                                                                    <label class="form-check-label" for="peditMulta">(Editar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pexMulta" value="1">
                                                                                                    <label class="form-check-label" for="pexMulta">(Excluir)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de Relatorios</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mRelatorios" id="mRelatorios" value="1">
                                                                                                    <label class="form-check-label" for="mRelatorios"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="card" style="width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title text-primary"><strong>Módulo de Configuracoes</strong></h4><br>

                                                                                <hr>
                                                                                <table style="width: 100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="mConfiguracoes" id="mConfiguracoes" value="1">
                                                                                                    <label class="form-check-label" for="mConfiguracoes"> (Acessar)</label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input type="checkbox" name="pDashboard" id="pDashboard" value="1">
                                                                                                    <label class="form-check-label" for="pDashboard">Dashboard</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <section>
                                                    <div class="container-sm text-center">
                                                        <button id="btn-dadosIntegracao-enviar" type="submit" class="btn btn-custom-md btn-outline-primary btn-sm">Salvar</button>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Ajax para a tela por marquinhos brow-->
                                <script src="<?php echo URL_BASE ?>assets/js_master/config/configuracoesIniciais.js"></script>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                Frota 1.0 - Sistema de Gerênciamento de Frota - engcriasoftwares
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
    </section>
    <div id="componentesPadroes"></div>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_BASE ?>assets/template/sistema/dist/js/adminlte.min.js"></script>
</body>

</html>