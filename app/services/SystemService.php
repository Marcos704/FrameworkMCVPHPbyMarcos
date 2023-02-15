<?php

namespace app\services;

use app\core\Controller;
use app\models\UserModel;
use app\models\GenericModel;
use app\core\validacao\Valitation;

class SystemService extends Controller
{
  private UserModel $model;
  private GenericModel $genericModel;
  public function longOut($keySession)
  {
    $this->model = new UserModel();
    if ($this->model->isLongOut($keySession)) {
      $_SESSION['status_sessao_usuario'] = "deslogado";
      $this->redirect(null);
    } 
  }
  public function reloadPage() 
  {
    $this->redirectAfter();
  }
  public function cadastrarAdministradora($post)
  {
    $this->genericModel = new GenericModel();
    $this->validacao = new Valitation();
    if (!$this->validacao->isCNPJValido($post['cnpjAdministradora'])) {
      echo 'CNPJ invalido';
    }else
    if ($this->genericModel->cadastrarAdministradora($post) == "SQL INFOR PASS") {
      echo 'Administradora Cadastrada';
    } else {
      echo 'Falha ao cadastrar Administradora';
    }
  }
  public function editarAdministradora($post)
  {
    $this->genericModel = new GenericModel();
    $this->validacao = new Valitation();
    if (!$this->validacao->isCNPJValido($post['cnpjAdministradora'])) {
      echo 'CNPJ invalido';
    }else
    if ($this->genericModel->editarAdministradora($post) == "SQL INFOR PASS") {
      echo 'Dados Editados';
    } else {
      echo 'Falha ao Dados Editados';
    }
  }
  public function obterDadosAdministradora(){
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterDadosAdministradora();
  }
}