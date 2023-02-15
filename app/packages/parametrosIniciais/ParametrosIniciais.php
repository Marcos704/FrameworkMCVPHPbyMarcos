<?php
namespace app\packages\parametrosIniciais;
use app\core\Controller;
use app\models\GenericModel;

class ParametrosIniciais extends Controller{
    
    public function verificacaoInicial(){
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
