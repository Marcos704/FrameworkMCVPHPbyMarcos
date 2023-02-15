<?php

namespace app\services;

use app\core\validacao\Valitation;
use app\models\clienteCPFModel;

class ClienteCPFService
{
  private clienteCPFModel $clienteCPFModel;
  private Valitation  $valitationService;


  public function verificarClientePorCPF($cpf)
  {
    @session_start();
    $this->clienteCPFModel = new clienteCPFModel();
    $this->valitationService = new Valitation();
    if (!$this->valitationService->isCPFValido($cpf['cpf_pessoa_fisica'])) {
      echo 'CPF invalido';
    } else {
      if ($this->clienteCPFModel->verificarClientePorCPF($cpf['cpf_pessoa_fisica'])) {
        @$_SESSION['cpf'] = $cpf['cpf_pessoa_fisica'];
        echo 'cliente ja cadastrado';
      } else {
        if ($this->clienteCPFModel->cadastrarCPF($cpf['cpf_pessoa_fisica'])) {
          @$_SESSION['cpf'] = $cpf['cpf_pessoa_fisica'];
          echo 'cliente sem cadastro';
        }
      }
    }
  }
  public function callBackMovimentarFichaPFID($id)
  {
    @session_start();
    $this->clienteCPFModel = new clienteCPFModel;
    $this->valitationService = new Valitation();
    $this->systemService = new SystemService();
    if ($this->clienteCPFModel->movimentarPropostaPF($id)) {
      $this->systemService->reloadPage();
    } else {
      echo 'ficha nao editada';
    }
  }
  public function salvarFichaClienteCPF($cnpj)
  {
    @session_start();
    $this->clienteCPFModel = new clienteCPFModel();
    if ($this->clienteCPFModel->cadastrarFichaPF($cnpj) == "SQL INFOR PASS") {
      echo 'ficha cadastrada';
    } else {
      echo 'ficha nao cadastrada';
    }
  }
  public function callBackPropostasPFCadastradas()
  {
    $this->clienteCPFModel = new clienteCPFModel();
    $Data = $this->clienteCPFModel->obterPropostasPFCadastradas();
    return $Data;
  }
  public function editarFichaClienteCPF($cpf, $id)
  {
    @session_start();
    $this->clienteCNPJModel = new clienteCPFModel;
    $this->valitationService = new Valitation();
    if ($this->clienteCNPJModel->editarFichaPF($cpf, $id) == "SQL INFOR PASS") {
      echo 'ficha editada cadastrada (Id Ficha)->'.$id;
    } else {
      echo 'ficha nao cadastrada (Id Ficha)->'.$id;
    }
  }
  public function obterDadosPropostaCPF($id)
  {
    $this->clienteCPFModel = new clienteCPFModel();
    return $this->clienteCPFModel->obterDadosProposta($id);
  }
}
