<?php

namespace app\services;

use app\core\Controller;
use app\models\UserModel;
use app\core\validacao\Valitation;

class UserService extends Controller
{
  private UserModel   $userModel;
  private Valitation  $valitationService;

  public function callbackUserVerification($CPF)
  {
    @session_start();
    $userModel = new UserModel();
    $validador = new Valitation();
    if (!$validador->isCPFValido($CPF)) {
      echo 'CPF invalido';
    } else
        if ($userModel->isUsuarioExistente($CPF) > 0) {
      @$_SESSION['cpf_edicao'] = $CPF;
      echo 'O CPF informado ja consta na base de dados';
    } else {
      $_SESSION['novoUsuario_CPF'] = $CPF;
      echo 'redirecionar';
    }
  }
  public function callbackUserRegister($var)
  {
    $this->userModel = new UserModel();
    if ($var['senha_usuario'] == $var['confirmar_senha_usuario']) {
      unset($var['confirmar_senha_usuario']);
      if ($this->userModel->adicionarNovoUsuario($var) && $this->userModel->adicionarNovoRegistroSessao($var['cpf_usuario'])) {
        echo 'SQL INFOR PASSs';
      } else {
        echo 'SQL INFOR FAIL';
      }
    } else {
      echo 'senhasNaoConferem';
    }
  }
  public function callBackEditarUsuarioPorCPF($data)
  {
    @session_start();
    @$_SESSION['cpf_edicao'] = $data;
    $dados["view"] = "System/usuario/editar";
    $this->load(TEMPLATE_SISTEMA, $dados);
  }
  public function callBackEditarUsuario($data)
  {
    $this->userModel          = new UserModel();
    $this->valitationService  = new Valitation();
    //debugArray($data);
    if (@$_GET['cadPermissao'] != 'true') {
      if ($data['senha_usuario'] == "" || $data['confirmar_senha_usuario'] == "") {
        echo 'digiteSuaSenha';
      } else
    if ($data['senha_usuario'] != $data['confirmar_senha_usuario']) {
        echo 'senhasNaoConferem';
      } else
    if (!$this->valitationService->verificarCampoSenha($data['senha_usuario'])) {
        echo 'senhainvalida';
      } else
    if ($data['tipo_usuario'] == "null") {
        echo 'Tipo de usuario invalido';
      } else
    if ($this->userModel->edicaoUsuario($data) == "SQL INFOR PASS") {
        echo 'SQL INFOR PASS';
      } else {
        echo 'RequisicaoIncompleta';
      }
    }else{
      if($_GET['cadPermissao'] == "true"){
        if($this->userModel->edicaoPermissao($data) == "SQL INFOR PASS"){
          echo 'SQL INFOR PASS';
        }else{
          echo 'RequisicaoIncompleta';
        }
      }else{
        if ($this->userModel->edicaoUsuario($data) == "SQL INFOR PASS") {
          echo 'SQL INFOR PASS';
        } else {
          echo 'RequisicaoIncompleta';
        }
      }
    }
  }
  public function callbackDeleteUserRegister($var)
  {

    $this->userModel = new UserModel();
    if ($this->userModel->apagarUsuario($var) == "SQL INFOR PASS") {
      return 'requisicaoCompleta';
    } else {
      return 'RequisicaoIncompleta';
    }
  }
  public function callbackDataUser($key)
  {
    $this->userModel = new UserModel();
    $DATA = $this->userModel->obterUsuarioCadastradoPorCPF($key);
    return $DATA;
  }
  public function callBackUsuariosCadastrados()
  {
    $this->userModel = new UserModel();
    $Data = $this->userModel->obterTodosUsuarioCadastrado();
    return $Data;
  }
}
