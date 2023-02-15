<?php
namespace app\functions;

class Debugs{

    public function console_log($debug){
        //echo "<script>console.log('".$debug."');</script>";
        echo $debug."\n";
    }
    public function console_log_js($debug){
        echo '<div id="console">
            <script>
                console.log("Debug Objects: ' . $debug . '");
                document.getElementById("console").remove()
            </script>
            </div>';
    }
    public function console_debugArray($debug){
        echo "\n";
        print_r($debug);
    }

    public function confirmAlert($msnPergunta,$msnConfirmacao, $rota){
        
        if($rota == null){
            echo "<script>
                if(window.confirm('$msnPergunta'))
                {
                    window.alert('$msnConfirmacao');
                }
            </script>";
        }
        else
        {
            echo "<script>
                if(window.confirm('$msnPergunta'))
                {
                    window.open('$rota','$msnConfirmacao');
                }
            </script>";
            include "app/views/" . $rota .".php";
        }
        
        
    }
    public function inforAlert($msnInformacao){
        echo "<script>
                window.alert('$msnInformacao');
            </script>";
    }
    public function inforAlertRedirect($msnInformacao, $rota){
        echo "<script>
                window.alert('$msnInformacao');
            </script>";
        if($rota == null)
        {
            echo "<script>
            window.location='$rota'
            </script>";
        }
        else
        {
            header("Location: ". URL_BASE . $rota);
        }
    }
}
