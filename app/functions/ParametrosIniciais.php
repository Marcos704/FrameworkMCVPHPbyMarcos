<?php
namespace app\functions;
use app\core\Controller;
use app\functions\Debugs;
use app\models\GenericModel;

class ParametrosIniciais extends Controller{
    
    public function verificacaoInicial(){
        $objDebug = new Debugs();
        $GenericModel = new GenericModel();
        if(!$GenericModel->verificacaoInicial())
        {
            $this->load(ROTA_START_SYSTEM);
        }
        else
        {
            $this->load(ROTA_LOGIN);
        }
        
    }
}
