<?php
namespace app\controllers;
use app\core\Controller;
use app\packages\parametrosIniciais\ParametrosIniciais;


class HomeController extends Controller {
    public ParametrosIniciais $Paramentros;

    public function index(){
      $Paramentros = new ParametrosIniciais();
      $Paramentros->verificacaoInicial();
    }
    
}
?>