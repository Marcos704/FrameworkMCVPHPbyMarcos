<?php

namespace app\models;

use app\core\Model;

class clienteCPFModel extends Model
{

  /**Metodo que verificar se o cliente CNPJ já possui registro no sistema
   * por CNPJ
   * @paramets 
   * $CNPJ
   * @return
   * true  : cliente cadastrado,
   * false : cliente não cadastrado
   */
  public function verificarClientePorCPF($cpf)
  {
    $sql            = "SELECT COUNT(cpf_pessoa_fisica) AS total FROM tb_cliente_pessoa_fisica WHERE cpf_pessoa_fisica =:cpf";
    $query  = $this->db->prepare($sql);
    $query->bindValue(':cpf', $cpf);
    $query->execute();
    $responser = $query->fetchAll(\PDO::FETCH_OBJ);
    if ($responser[0]->total >= 1) {
      return true;
    } else {
      return false;
    }
  }
  public function cadastrarCPF($value)
  {
    $sql = "INSERT INTO tb_cliente_pessoa_fisica SET "
      . "cpf_pessoa_fisica    =:cpf_pessoa_fisica";
    $query = $this->db->prepare($sql);
    $query->bindValue(':cpf_pessoa_fisica', $value);
    if ($query->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function obterPropostasPFCadastradas()
  {
    $SQL = "SELECT *FROM tb_ficha_pessoa_fisica";
    $query = $this->db->prepare($SQL);
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
  }
  public function movimentarPropostaPF($id)
  {
    $SQL_VERIFICAR_STATUS_PROPOSTA_PJ = "SELECT estado_analise_pessoa_fisica FROM tb_ficha_pessoa_fisica WHERE id_proposta_pessoa_fisica =:id_proposta_pf";
    $query1 = $this->db->prepare($SQL_VERIFICAR_STATUS_PROPOSTA_PJ);
    $query1->bindParam(':id_proposta_pf', $id);
    $query1->execute();
    $status_atual = $query1->fetchAll(\PDO::FETCH_OBJ);
    if ($status_atual[0]->estado_analise_pessoa_fisica == 'Em analise') 
    {
      return $this->adicionarStatusProposta($id, "Aprovada");
    }
    else if($status_atual[0]->estado_analise_pessoa_fisica == 'Aprovada')
    {
      return $this->adicionarStatusProposta($id, "Negada");
    }
    else if($status_atual[0]->estado_analise_pessoa_fisica == 'Negada')
    {
      return $this->adicionarStatusProposta($id, "Em analise");
    }
  }
  public function adicionarStatusProposta($id,$status_poposta)
  {
    $SQL_STATUS_PROPOSTA = "UPDATE tb_ficha_pessoa_fisica SET estado_analise_pessoa_fisica =:estado_analise_pessoa_fisica WHERE id_proposta_pessoa_fisica =:id_proposta_pf";
    $query = $this->db->prepare($SQL_STATUS_PROPOSTA);
    $query->bindParam(":id_proposta_pf", $id);
    $query->bindParam(":estado_analise_pessoa_fisica", $status_poposta);
    if($query->execute())
    {
      return true;
    }
    else
    {
      return false;
    }
  }




  public function cadastrarFichaPF($formValues)
  {
    return $this->inserirRegistro("tb_ficha_pessoa_fisica",$formValues);
  }
  public function editarFichaPF($formValues,$id)
  {
    unset($formValues['idProposta']);
    return $this->atualizarRegistro("tb_ficha_pessoa_fisica","id_proposta_pessoa_fisica",$id,$formValues,false);
  }
  public function obterPropostaPJID($idProposta){
    return $this->obterRegistros("tb_ficha_pessoa_fisica","id_proposta_pessoa_fisica", $idProposta, null, 1, false);
  }
  public function obterDadosProposta($id){
    return $this->obterRegistros("tb_ficha_pessoa_fisica","id_proposta_pessoa_fisica",$id,null,1, false);
  }
}
