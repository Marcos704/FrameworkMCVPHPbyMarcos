<?php

namespace app\services;

use app\core\Controller;
use app\models\GenericModel;

class GenericService extends Controller
{

  private GenericModel $GenericModel;

  public function salvarRegistro($dados){
    $this->GenericModel = new GenericModel();
    unset($dados['senhaUsuarioConfirmar']);
    return $this->GenericModel->salvarRegistro("", $dados);
  }
  
}
