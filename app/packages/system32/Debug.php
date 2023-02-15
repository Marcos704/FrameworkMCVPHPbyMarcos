<?php

function debugArray($array)
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
                            print_r($array);
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
function debug($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    die();
}
function debugConsole($array)
{
    echo $array;
    die();
}
function console_log_js($debug){
    echo '<div id="console">
        <script>
            console.log("Debug Objects: ' . $debug . '");
            document.getElementById("console").remove()
        </script>
        </div>';
}
function console_log($debug){
    echo "<script>console.log('".$debug."');</script>";
}