<?php
namespace app\controllers;
use app\core\Controller;
use app\services\RecoveryService;

class StartSystemController extends Controller {
    private RecoveryService $recoveryService;
    
    public function index(){
        @session_start();
        debug("Oie");
        //$this->load(TEMPLATE_RECUPERAR_SENHA);
    }
    public function recoveryPassword(){
        @session_start();
       $this->recoveryService   = new RecoveryService();
       $this->recoveryService->recoveryPassword($_POST, @$_SESSION['upKey']);
    }
}