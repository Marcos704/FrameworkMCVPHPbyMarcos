<?php

namespace app\services;

use app\core\validacao\Valitation;
use app\models\clienteCNPJModel;
use app\services\SystemService;
use app\core\Controller;

class ClienteCNPJService extends Controller
{
  private clienteCNPJModel $clienteCNPJModel;
  private Valitation  $valitationService;
  private SystemService $systemService;

  public function verificarClientePorCNPJ($cnpj)
  {
    @session_start();
    $this->clienteCNPJModel = new clienteCNPJModel;
    $this->valitationService = new Valitation();
    if (!$this->valitationService->isCNPJValido($cnpj['cnpj_pessoa_juridica'])) {
      echo 'CNPJ invalido';
    } else {
      if ($this->clienteCNPJModel->verificarClientePorCNPJ($cnpj['cnpj_pessoa_juridica'])) {
        @$_SESSION['cnpj'] = $cnpj['cnpj_pessoa_juridica'];
        echo 'cliente ja cadastrado';
      } else {
        if ($this->clienteCNPJModel->cadastrarCNPJ($cnpj['cnpj_pessoa_juridica'])) {
          @$_SESSION['cnpj'] = $cnpj['cnpj_pessoa_juridica'];
          echo 'cliente sem cadastro';
        }
      }
    }
  }
  public function salvarFichaClienteCNPJ($cnpj)
  {
    @session_start();
    $this->clienteCNPJModel = new clienteCNPJModel;
    $this->valitationService = new Valitation();
    if ($this->clienteCNPJModel->cadastrarFichaPJ($cnpj) == "SQL INFOR PASS") {
      echo 'ficha cadastrada';
    } else {
      echo 'ficha nao cadastrada';
    }
  }
  public function editarFichaClienteCNPJ($cnpj, $id)
  {
    @session_start();
    $this->clienteCNPJModel = new clienteCNPJModel;
    $this->valitationService = new Valitation();
    if ($this->clienteCNPJModel->editarFichaPJ($cnpj, $id) == "SQL INFOR PASS") {
      echo 'ficha cadastrada';
    } else {
      echo 'ficha nao cadastrada';
    }
  }
  public function callBackEditarFichaPJID($data)
  {
    @session_start();
    @$_SESSION['id_ficha_edicao'] = $data;
    $dados["view"] = "System/Proposta/PJ/editarPropostaPJ";
    $this->load(TEMPLATE_SISTEMA, $dados);
  }
  public function callBackMovimentarFichaPJID($id)
  {
    @session_start();
    $this->clienteCNPJModel = new clienteCNPJModel;
    $this->valitationService = new Valitation();
    $this->systemService = new SystemService();
    if ($this->clienteCNPJModel->movimentarPropostaPJ($id)) {
      $this->systemService->reloadPage();
    } else {
      echo 'ficha nao editada';
    }
  }
  public function callBackPropostasPJCadastradas()
  {
    $this->clienteCNPJModel = new clienteCNPJModel();
    $Data = $this->clienteCNPJModel->obterPropostasPJCadastradas();
    return $Data;
  }
  public function obterDadosPropostaCNPJ($id)
  {
    $this->clienteCNPJModel = new clienteCNPJModel();
    return $this->clienteCNPJModel->obterDadosProposta($id);
  }
}
