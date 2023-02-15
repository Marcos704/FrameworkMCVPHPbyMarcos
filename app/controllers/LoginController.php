<?php
namespace app\controllers;
use app\core\Controller;
use app\services\LoginService;
use app\packages\validacao\Validacao;

class LoginController extends Controller {
    private Validacao $validacao;
    public function index(){
        @session_start();
    }
    public function singIn(){
        @session_start();
        $this->validacao = new Validacao();
        $service = new LoginService();
        if($service->loginUsuario($_POST)){
            $this->validacao->validarUsuario();
        }
    }
}
