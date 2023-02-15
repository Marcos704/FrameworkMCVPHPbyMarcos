<?php

use app\services\ClienteCNPJService;
use app\services\ClienteCPFService;
use app\services\systemService;

$servicePJ = new ClienteCNPJService();
$servicePF = new ClienteCPFService();
$service = new SystemService();
@$dataPJ = $servicePJ->obterDadosPropostaCNPJ($_GET['dataPJ']);
@$dataPF = $servicePF->obterDadosPropostaCPF($_GET['dataPF']);
@$data = $service->obterDadosAdministradora();
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Proposta - <?php echo @$_GET['dataPJ'] != null ? @$_GET['dataPJ'] : @$_GET['dataPF'] ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL_BASE . "app/views/System/Proposta/PropostaPDF/style.css" ?>">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/617ef9b753.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        @media print {
            .butoes {
                display: none;
            }
        }
    </style>
    <div class="container" id="pdfDocument" style="-webkit-print-color-adjust: exact;">
        <!--Importante para carregamento do css-->
        <div class="row pb-1 pt-1">
            <div class="col-6">
                <span class="span1">Proposta - <?php echo @$_GET['dataPJ'] != null ? @$_GET['dataPJ'] : @$_GET['dataPF'] ?></span>
            </div>
            <div class="col-6">
                <div class="text-right butoes">
                    <div class="btn-grupo">
                        <tbody>
                            <td>
                                <button type="button" id="pdfGerador" class="btn btn-small btn-default m-0 p-1" title="PDF">
                                    <i class="fa-solid fa-file-pdf text-danger"></i> PDF
                                </button>
                            </td>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
        <!-- DOCUMENTO DE PROPOSTA -->
        <div class="container container-ficha">

            <row>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12" id="logo">
                            <div class="text-center">
                                <figure>
                                    <img id="logocredimais" src="<?php echo URL_BASE ?>assets/template/sistema/img/LogoFicha.png" width="99px" height="99px" alt="credimais">
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            <h4 class="font-weight-bold"><?php echo $data[0]->apAdministradora ?></h3>
                                <h6 class="font-weight-bold">CNPJ: <span class="font-weight-normal"><?php echo $data[0]->cnpjAdministradora ?></span></h6>
                                <h6 class="font-weight-bold">Razão Social: <span class="font-weight-normal"><?php echo $data[0]->rsAdministradora ?></span></h6>
                                <h6 class="font-weight-bold">Endereço: <span class="font-weight-normal">
                                        <?php echo $data[0]->endAdministradora . ", " . $data[0]->numEndAdministradora . ", " . $data[0]->cmAdministradora . ", Bairro " . $data[0]->baAdministradora ?>
                                    </span>
                                </h6>

                                <h6 class="font-weight-bold">Contato: <span class="font-weight-normal"><?php echo $data[0]->foneAdministradora ?></h6>
                        </div>

                    </div>

                </div>


            </row>

            <row class="ficha-divisoria col-lg-12">

                <div>
                    <h4 style="padding-top:0.4rem" class="font-weight-bold">Cliente</h4>
                </div>

            </row>

            <div class="container">

                <div style="padding-top: 0.5rem; line-height: 0.8; margin-left: 10px; margin-right: 10px;" class="row">

                    <div class="col-lg-6">
                        <?php if (@$_GET['dataPJ'] != null) { ?>
                            <h6 class="font-weight-bold">Razão Social: <span class="font-weight-normal">
                                    <?php echo @$dataPJ[0]->razao_social_pessoa_juridica ?>
                                </span></h6>
                        <?php } else { ?>
                            <h6 class="font-weight-bold">Nome: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->nome_pessoa_fisica ?>
                                </span></h6>
                        <?php } ?>

                        <?php if (@$_GET['dataPJ'] != null) { ?>
                            <h6 class="font-weight-bold">CNPJ: <span class="font-weight-normal">
                                    <?php echo @$dataPJ[0]->cnpj_pessoa_juridica ?>
                                </span></h6>
                        <?php } else { ?>
                            <h6 class="font-weight-bold">CPF: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->cpf_pessoa_fisica ?>
                                </span></h6>
                        <?php } ?>

                        <?php if (@$_GET['dataPJ'] != null) { ?>
                            <h6 class="font-weight-bold">Telefone: <span class="font-weight-normal">
                                    <?php echo @$dataPJ[0]->telefone_pessoa_juridica ?>
                                </span></h6>
                        <?php } else { ?>
                            <h6 class="font-weight-bold">Contatos: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->telefone_fixo_pessoa_fisica ?> ou
                                    <?php echo @$dataPF[0]->celular_pessoa_fisica ?>
                                </span></h6>
                        <?php } ?>
                        <h6 class="font-weight-bold">Email: <span class="font-weight-normal">
                                <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->email_pessoa_juridica : @$dataPF[0]->email_pessoa_fisica ?>
                            </span></h6>

                    </div>

                    <div class="col-lg-6">

                        <h6 class="font-weight-bold">CEP: <span class="font-weight-normal">
                                <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->cep_pessoa_juridica : @$dataPF[0]->cep_pessoa_fisica ?>
                            </span></h6>

                        <?php if (@$_GET['dataPJ'] != null) { ?>
                            <h6 class="font-weight-bold">Endereço: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->rua_pessoa_juridica ?>,
                                    <?php echo @$dataPF[0]->bairro_pessoa_juridica ?>, Nº
                                    <?php echo @$dataPF[0]->numero_pessoa_juridica ?>
                                    <br><strong>complemento: </strong>
                                    <?php echo @$dataPF[0]->complemento_pessoa_juridica ?>
                                </span></h6>
                        <?php } else { ?>
                            <h6 class="font-weight-bold">Endereço: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->rua_pessoa_fisica ?>,
                                    <?php echo @$dataPF[0]->bairro_pessoa_fisica ?>, Nº
                                    <?php echo @$dataPF[0]->numero_pessoa_fisica ?>
                                    <br><strong>complemento: </strong>
                                    <?php echo @$dataPF[0]->complemento_pessoa_fisica ?>
                                </span></h6>
                        <?php } ?>

                        <?php if (@$_GET['dataPJ'] != null) { ?>
                            <h6 class="font-weight-bold">Cidade/UF: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->cidade_pessoa_juridica ?>/
                                    <?php echo @$dataPF[0]->estado_pessoa_juridica ?>
                                </span></h6>
                        <?php } else { ?>
                            <h6 class="font-weight-bold">Cidade/UF: <span class="font-weight-normal">
                                    <?php echo @$dataPF[0]->cidade_pessoa_fisica ?>/
                                    <?php echo @$dataPF[0]->estado_pessoa_fisica ?>
                                </span></h6>
                        <?php } ?>

                    </div>

                </div>

            </div>

            <row class="ficha-divisoria col-lg-12">

                <div>
                    <h4 style="padding-top:0.4rem" class="font-weight-bold">Proposta N° 1</h4>
                </div>

            </row>

            <div style="padding: 0; border-width: 0px 1px 1px 1px;" class="container">

                <div style="margin: 0;" class="row">

                    <div style="padding:0;" class="col-lg-6 d-inline-block">


                        <div style="padding: 0.75rem 0 0.75rem 0.75rem; " class="col-lg-12">

                            <div>
                                <?php if (@$_GET['dataPJ'] != null) { ?>
                                    <h6 class="font-weight-bold">Tipo de Bem Financiado: <span class="font-weight-normal">
                                            <?php
                                            if (@$dataPF[0]->nome_servico_pessoa_juridica != null) {
                                                echo "Serviço";
                                            } else if (@$dataPF[0]->tipo_veiculo_pessoa_juridica != null) {
                                                echo "Veículo";
                                            } else if (@$dataPF[0]->tipo_imovel_pessoa_juridica != null) {
                                                echo "Imóvel";
                                            }
                                            ?>
                                        </span></h6>
                                <?php } else { ?>
                                    <h6 class="font-weight-bold">Tipo de Bem Financiado: <span class="font-weight-normal">
                                            <?php
                                            if (@$dataPF[0]->nome_servico_pessoa_fisica != null) {
                                                echo "Serviço";
                                            } else if (@$dataPF[0]->tipo_veiculo_pessoa_fisica != null) {
                                                echo "Veículo";
                                            } else if (@$dataPF[0]->tipo_imovel_pessoa_fisica != null) {
                                                echo "Imóvel";
                                            }
                                            ?>
                                        </span></h6>
                                <?php } ?>

                                <h6 class="font-weight-bold">Modalidade:
                                    <span class="font-weight-normal">
                                        <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->tipo_credito_pessoa_juridica : @$dataPF[0]->tipo_credito_pessoa_fisica ?>
                                    </span>
                                </h6>
                                <h6 class="font-weight-bold">Valor:
                                    <span class="font-weight-normal">
                                        <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->valor_bruto_pessoa_juridica : @$dataPF[0]->valor_bruto_pessoa_fisica ?>
                                    </span>
                                </h6>
                                <h6 class="font-weight-bold">Entrada:
                                    <span class="font-weight-normal">
                                        <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->valor_adesao_pessoa_juridica : @$dataPF[0]->valor_adesao_pessoa_fisica ?>
                                    </span>
                                </h6>

                            </div>

                            <div>

                                <h6 class="font-weight-bold">Atendente:
                                    <span class="font-weight-normal">
                                        <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->consultor_analise_pessoa_juridica : @$dataPF[0]->consultor_analise_pessoa_fisica ?>
                                    </span>
                                </h6>
                                <h6 class="font-weight-bold">Data de Criação da Proposta:
                                    <span class="font-weight-normal">
                                        <?php echo @$_GET['dataPJ'] != null ?
                                            date('d-m-Y', strtotime(@$dataPJ[0]->data_atendimento_pessoa_juridica)) :
                                            date('d-m-Y', strtotime(@$dataPF[0]
                                                ->data_atendimento_pessoa_fisica)) ?>
                                    </span>
                                </h6>
                                <h6 class="font-weight-bold">Proposta valida até:
                                    <span class="font-weight-normal">
                                        <?php echo @$_GET['dataPJ'] != null ?
                                            date('d-m-Y', strtotime(@$dataPJ[0]->validade_proposta_pessoa_juridica)) :
                                            date('d-m-Y', strtotime(@$dataPF[0]->validade_proposta_pessoa_fisica))
                                        ?>
                                    </span>
                                </h6>

                            </div>

                        </div>

                    </div>
                    <row class="ficha-divisoria col-lg-12">

                        <div>
                            <h4 style="padding-top:0.4rem" class="font-weight-bold">Financeiro</h4>
                        </div>

                    </row>
                    <div style="padding: 0.75rem 0 0.75rem 0.75rem; " class="col-lg-12">
                        <hr>
                        <div class="text-center">
                            <span><strong>Detalhes da proposta</strong></span>
                        </div>
                        <hr>
                        <div>

                            <?php if (@$_GET['dataPJ'] != null) { ?>
                                <h6 class="font-weight-bold">Tipo de Bem Financiado: <span class="font-weight-normal">
                                        <?php
                                        if (@$dataPF[0]->nome_servico_pessoa_juridica != null) {
                                            echo "Serviço";
                                        } else if (@$dataPF[0]->tipo_veiculo_pessoa_juridica != null) {
                                            echo "Veículo";
                                        } else if (@$dataPF[0]->tipo_imovel_pessoa_juridica != null) {
                                            echo "Imóvel";
                                        }
                                        ?>
                                    </span></h6>
                            <?php } else { ?>
                                <h6 class="font-weight-bold">Tipo de Bem Financiado: <span class="font-weight-normal">
                                        <?php
                                        if (@$dataPF[0]->nome_servico_pessoa_fisica != null) {
                                            echo "Serviço";
                                        } else if (@$dataPF[0]->tipo_veiculo_pessoa_fisica != null) {
                                            echo "Veículo";
                                        } else if (@$dataPF[0]->tipo_imovel_pessoa_fisica != null) {
                                            echo "Imóvel";
                                        }
                                        ?>
                                    </span></h6>
                            <?php } ?>

                            <h6 class="font-weight-bold">Modalidade:
                                <span class="font-weight-normal">
                                    <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->tipo_credito_pessoa_juridica : @$dataPF[0]->tipo_credito_pessoa_fisica ?>
                                </span>
                            </h6>
                            <h6 class="font-weight-bold">Valor:
                                <span class="font-weight-normal">
                                    <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->valor_bruto_pessoa_juridica : @$dataPF[0]->valor_bruto_pessoa_fisica ?>
                                </span>
                            </h6>
                            <h6 class="font-weight-bold">Entrada:
                                <span class="font-weight-normal">
                                    <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->valor_adesao_pessoa_juridica : @$dataPF[0]->valor_adesao_pessoa_fisica ?>
                                </span>
                            </h6>

                        </div>

                        <div>

                            <h6 class="font-weight-bold">Atendente:
                                <span class="font-weight-normal">
                                    <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->consultor_analise_pessoa_juridica : @$dataPF[0]->consultor_analise_pessoa_fisica ?>
                                </span>
                            </h6>
                            <h6 class="font-weight-bold">Proposta valida até:
                                <span class="font-weight-normal">
                                    <?php echo @$_GET['dataPJ'] != null ?
                                        date('d-m-Y', strtotime(@$dataPJ[0]->validade_proposta_pessoa_juridica)) :
                                        date('d-m-Y', strtotime(@$dataPF[0]->validade_proposta_pessoa_fisica))
                                    ?>
                                </span>
                            </h6>
                            <br>
                            <h6 class="font-weight-bold">Administradora:
                                <span class="font-weight-normal">
                                    <?php echo $data[0]->apAdministradora ?>
                                </span>
                            </h6>
                            <h6 class="font-weight-bold">Banco:
                                <span class="font-weight-normal">
                                    <?php echo @$_GET['dataPJ'] != null ? @$dataPJ[0]->cnpj_banco : @$dataPF[0]->cnpj_banco ?>
                                </span>
                            </h6>

                        </div>
                        <hr>
                        <div class="text-center">
                            <span><strong>Parcelamento</strong></span>
                        </div>
                        <hr>
                        <div>

                            <?php if (@$_GET['dataPJ'] != null) {
                                if (@$dataPJ[0]->valor_parcela1_pessoa_juridica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            1º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPJ[0]->valor_parcela1_pessoa_juridica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPJ[0]->valor_parcela2_pessoa_juridica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            2º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPJ[0]->valor_parcela2_pessoa_juridica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPJ[0]->valor_parcela3_pessoa_juridica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            3º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPJ[0]->valor_parcela3_pessoa_juridica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPJ[0]->valor_parcela4_pessoa_juridica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            4º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPJ[0]->valor_parcela4_pessoa_juridica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPJ[0]->valor_parcela5_pessoa_juridica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            5º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPJ[0]->valor_parcela5_pessoa_juridica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPJ[0]->valor_parcela6_pessoa_juridica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            6º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPJ[0]->valor_parcela6_pessoa_juridica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                            } else {

                                if (@$dataPF[0]->valor_parcela1_pessoa_fisica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            1º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPF[0]->valor_parcela1_pessoa_fisica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPF[0]->valor_parcela2_pessoa_fisica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            2º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPF[0]->valor_parcela2_pessoa_fisica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPF[0]->valor_parcela3_pessoa_fisica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            3º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPF[0]->valor_parcela3_pessoa_fisica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPF[0]->valor_parcela4_pessoa_fisica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            4º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPF[0]->valor_parcela4_pessoa_fisica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPF[0]->valor_parcela5_pessoa_fisica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            5º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPF[0]->valor_parcela5_pessoa_fisica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                                if (@$dataPF[0]->valor_parcela6_pessoa_fisica != null) {
                                    echo '
                                            <h6 class="font-weight-bold">
                                            6º Parcela:
                                            <span class="font-weight-normal">
                                                R$ ' . $dataPF[0]->valor_parcela6_pessoa_fisica . '
                                            </span>
                                            </h6>
                                            ';
                                }
                            }
                            ?>
                        </div>
                        <hr>
                        <div class="text-center">
                            <span><strong>Informações Importantes</strong></span>
                        </div>
                        <hr>
                        <div class="ml-1 mr-1">
                            <ul style="font-size: large; line-height: 1; padding-top: 0.75rem;">
                                <li>
                                    A Entrada/Adesão te ajuda a ter a opção de poder dobrar o valor do crédito,
                                    podendo utilizar até 50% do valor da Carta de Crédito como Lance Embutido.
                                </li>

                                <li>
                                    A carta não está contemplada.
                                </li>
                                <li>
                                    Valores de proposta apenas pós liberação.
                                </li>
                                <li>
                                    A Aprovação de proposta depende de cadastro para análise de crédito.
                                </li>
                                <li>
                                    É apenas uma simulação. Valores podem sofrer alteração de acordo com o perfil do cliente,
                                    levando em conta critérios internos.
                                </li>
                                <li>
                                    Caso proposta seja aprovada, efetivar a mesma num prazo de até 3 dias úteis após a data de
                                    aprovação. Caso contrário, a mesma sofrerá alteração nos valores de entrada e parcela e até
                                    mesmo poderá ser cancelada
                                </li>

                            </ul>
                        </div>
                        <footer class="main-footer ficha-divisoria" style="font-size:10px; font-weight:lighter; margin-right: 8px; margin-top: 1px; padding:4px; background-color: #fff; border:none;">
                            <strong>Copyright &copy; 2021-2022 <a href="#">Engcriasoftwares.com</a>.</strong>
                            Todos os direitos reservados.
                        </footer>
                    </div>
                </div>


            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

        <?php
        if (@$_GET['modo'] == 'visualizar') {
        ?>
            <script>
                console.log('ff');
                $(document).ready(function() {
                    //window.open('_blank');
                    var btnPDF = document.getElementById("pdfGerador");
                    var logo = document.getElementById("logo");
                    btnPDF.addEventListener("click", function() {
                        window.print();
                        console.log("dd");
                    });
                    if (window.matchMedia("(max-width: 480px)").matches) {
                        logo.style.display = "none";
                    }
                });
            </script>
        <?php } else if (@$_GET['modo'] == 'downloadPDF') { ?>
            <script>
                $(document).ready(function() {
                    //window.open('_blank');
                    window.print();
                    //return false;
                    //gerarPDF(document.querySelector('#pdfDocument'));
                    var btnPDF = document.getElementById("pdfGerador");
                    var logo = document.getElementById("logo");
                    btnPDF.addEventListener("click", function() {
                        window.print();
                        console.log("dd");
                    });
                    if (window.matchMedia("(max-width: 480px)").matches) {
                        logo.style.display = "none";
                    }
                });

                function gerarPDF(codigoHTML) {
                    console.log('aqui');
                    var doc = new jsPDF('portrait', 'pt', 'a4'),
                        data = new Date();
                    margins = {
                        top: 40,
                        bottom: 60,
                        left: 40,
                        width: 1000
                    };
                    doc.fromHTML(codigoHTML,
                        margins.left, // x coord
                        margins.top, {
                            pagesplit: true
                        },
                        function(dispose) {
                            doc.save("Proposta nº - " + <?php echo @$_GET['dataPF'] != null ? @$_GET['dataPF'] : @$_GET['dataPJ'] ?> + ".pdf");
                        });
                }
            </script>

        <?php } ?>

</body>

</html>