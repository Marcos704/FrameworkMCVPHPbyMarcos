<?php
namespace app\controllers;
use app\core\Controller;
use app\models\GenericModel;
use app\services\GenericService;
use app\services\StarySystemService;

class StartSystemController extends Controller {
    private GenericModel $GenericModel;
    private StarySystemService $StarySystemService;
    
    public function index(){
        @session_start();
        $this->GenericModel = new GenericModel();
        if(!$this->GenericModel->verificacaoInicial()){
            $this->load(TEMPLATE_START_SYSTEM);
        }else{
            notificacao1("Configurações Iniciais","Sistema já pré configurado!","loginResponser", URL_BASE,"danger",true);
        }
    }
    public function salvarConfiguracoesInicias(){
        $this->StarySystemService = new StarySystemService();
        $this->StarySystemService->salvarRegistro($_POST);
    }
}