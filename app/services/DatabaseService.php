<?php

namespace app\services;

use app\models\UserModel;
use app\models\GenericModel;
class DatabaseService
{
  private UserModel $userModel;
  private GenericModel $genericModel;


  public function getUsersCount()
  {
    $this->userModel = new UserModel();
    return $this->userModel->getTotalUsuarios();
  }
  public function getUsersPFCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabela("tb_cliente_pessoa_fisica");
  }
  public function getUsersPJCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabela("tb_cliente_pessoa_juridica");
  }
  public function getBancosCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabela("tb_bancos_administradoras");
  }
  public function getPropostasAnaliseCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_fisica","estado_analise_pessoa_fisica","Em analise")
         + $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_juridica","estado_analise_pessoa_juridica","Em analise");
  }
  public function getPropostasAceitasCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_fisica","estado_analise_pessoa_fisica","Aprovada")
         + $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_juridica","estado_analise_pessoa_juridica","Aprovada");
  }
  public function getPropostasNegadasCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_fisica","estado_analise_pessoa_fisica","Negada")
         + $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_juridica","estado_analise_pessoa_juridica","Negada");
  }
  public function getPropostasFinalizadasCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_fisica","estado_analise_pessoa_fisica","Finalizada")
         + $this->genericModel->obterTotalRegistrosTabelaPorConsulta("tb_ficha_pessoa_juridica","estado_analise_pessoa_juridica","Finalizada");
  }
  public function getPropostasCount()
  {
    $this->genericModel = new GenericModel();
    return $this->genericModel->obterTotalRegistrosTabela("tb_ficha_pessoa_fisica")
          + $this->genericModel->obterTotalRegistrosTabela("tb_ficha_pessoa_juridica");
  }
}
