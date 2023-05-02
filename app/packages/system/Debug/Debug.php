<?php

/**
 *      # (Debug.php) #
 * ----------------------------
 * @created   < 2/7/2023, 6:23:47 PM > 
 * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Debug\Debug.php > 
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
 * Exibe modal com os dados inseridos na variavel "$array"
 * - Dados formatados com a tag "pre" e impresso com a função "print_r"
 */
function debugArray($params)
{
?>

    <div class="modal" tabindex="-1" id="teste" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-center bg-danger">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-key"></i>
                        Debug Array Mode
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <small class="text-monospace">
                            <?php echo "<pre>";
                            print_r($params);
                            echo "</pre>"; ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#teste').modal('show');
    </script>

    <?php
}

function modal($titulo, $descricao, $tipo)
{
    if ($tipo == "ex") {
        #echo '<script>exibirModal("et","s","danger");</script>';
        echo "<div class='ocultar'><script>exibirModal('et','s','danger');</script></div>";
    }
    if ($tipo == "success") {
    ?>
        <div class="ocultar-compontente">
            <div class="modal" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-dark text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $titulo ?></h3>
                                    </div>
                                    <div class="col-12">
                                        <small><?php echo $descricao ?></small>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-sm btn-git-color w-100" data-dismiss="modal">fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#alertModal').modal('show');
            </script>
        </div>
    <?php
    } else
    if ($tipo == "warning") {
    ?>
        <div class="ocultar-compontente">
            <div class="modal" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-dark text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $titulo ?></h3>
                                    </div>
                                    <div class="col-12">
                                        <small><?php echo $descricao ?></small>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-sm btn-warning w-100" data-dismiss="modal">fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#alertModal').modal('show');
            </script>
        </div>
    <?php
    } else
    if ($tipo == "danger") {
    ?>
        <div class="ocultar-compontente">
            <div class="modal" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-dark text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $titulo ?></h3>
                                    </div>
                                    <div class="col-12">
                                        <small><?php echo $descricao ?></small>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-sm btn-danger w-100" data-dismiss="modal">fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#alertModal').modal('show');
            </script>
        </div>
<?php
    }
}

/**
 * Exibe os dados na tela no momento em que é chamado
 * - Dados formatados com a tag "pre"
 * - Encerra o código no momento da exibição
 */
function debugPrint_r($params)
{
    echo "<pre>";
    print_r($params);
    echo "</pre>";
    exit;
}
/**
 * Exibe os dados no console do navegador
 */
function console_log($escopo, $titulo, $params, $tipo)
{
    if(str_replace("'", " ", strval($params))){
        $params = str_replace("'", " ", strval($params));
    }
    switch ($tipo) {
        case 'erro':
            #echo "<div id='ocultar-componente' class='ocultar-componente'><script>console.error('{" . $escopo . "} - " . $titulo . "\\n" . $params . "');</script></div>";
            echo '<div id="ocultar-componente" class="ocultar-componente"><script>console.error("{' . $escopo . '} - ' . $titulo . '- \\n -' . $params . '");</script></div>';
            break;
        case 'infor':
            #echo "<div id='ocultar-componente' class='ocultar'><script>console.log('{" . $escopo . "} - " . $titulo . "\\n" . $params . "');</script></div>";
            echo '<div id="ocultar-componente" class="ocultar-componente"><script>console.log("{' . $escopo . '} - ' . $titulo . '\\n' . $params . '");</script></div>';
            break;
        case 'warning':
            #echo "<div id='ocultar-componente' class='ocultar-componente'><script>console.warn('{" . $escopo . "} - " . $titulo . "\\n" . $params . "');</script></div>";
            echo '<div id="ocultar-componente" class="ocultar-componente"><script>console.warn("{' . $escopo . '} - ' . $titulo . '\\n' . $params . '");</script></div>';
            break;
        default:
            #echo "<div id='ocultar-componente' class='ocultar'><script>console.log('{" . $escopo . "} - " . $titulo . "\\n" . $params . "');</script></div>";
            echo '<div id="ocultar-componente" class="ocultar-componente"><script>console.log("{'.$escopo.'} - '.$titulo.' \\n '.$params.'");</script></div>';
    }
}
