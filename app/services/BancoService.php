<?php

namespace app\services;

use app\core\Controller;
use app\models\BancoModel;
use app\core\validacao\Valitation;

class BancoService extends Controller
{

  private BancoModel $bancoModel;
  private Valitation $validacao;

  public function salvarNovoBanco($post, $file)
  {
    $this->bancoModel = new BancoModel();
    $this->validacao = new Valitation();
    if (!$this->validacao->isCNPJValido($post['cnpj_banco_administradora'])) {
      echo 'CNPJ invalido';
    }else
    if ($this->bancoModel->salvarNovoBanco($post, $file)) {
      echo 'Banco Cadastrado';
    } else {
      echo 'Falha ao cadastrar Banco';
    }
  }
  public function editarBanco($post, $file)
  {
    $this->bancoModel = new BancoModel();
    $this->validacao = new Valitation();
    if (!$this->validacao->isCNPJValido($post['cnpj_banco_administradora'])) {
      echo 'CNPJ invalido';
    }else
    if ($this->bancoModel->editarBanco($post, $file)) {
      echo 'Banco Cadastrado';
    } else {
      echo 'Falha ao cadastrar Banco';
    }
  }
  public function obterBancosCadastrados()
  {
    $this->bancoModel = new BancoModel();
    return $this->bancoModel->obterBancosCadastrados();
  }
  public function obterDadosBancoId()
  {
    $this->bancoModel = new BancoModel();
    return $this->bancoModel->obterDadosBanco($_GET['data']);
  }
  public function obterLogoBancoCNPJ($cnpj)
  {
    $this->bancoModel = new BancoModel();
    return $this->bancoModel->obterLogoBancoCNPJ($cnpj);
  }
}
