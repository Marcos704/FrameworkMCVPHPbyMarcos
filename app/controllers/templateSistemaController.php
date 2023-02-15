<?php
namespace app\controllers;
use app\core\Controller;
use app\services\SystemService;
class templateSistemaController extends Controller {
    private SystemService $service;
    public function index(){
        $this->load(TEMPLATE_SISTEMA); //view
    }
    public function longOut(){
        @session_start();
        $this->systemService = new SystemService();
        $this->systemService->longOut($_SESSION['cpf_usuario']);
    }
}


?>