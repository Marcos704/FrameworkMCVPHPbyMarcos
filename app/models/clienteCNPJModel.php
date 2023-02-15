<?php

namespace app\models;

use app\core\Model;

class clienteCNPJModel extends Model
{

  /**Metodo que verificar se o cliente CNPJ já possui registro no sistema
   * por CNPJ
   * @paramets 
   * $CNPJ
   * @return
   * true  : cliente cadastrado,
   * false : cliente não cadastrado
   */
  public function verificarClientePorCNPJ($CNPJ)
  {
    $sql            = "SELECT COUNT(cnpj_pessoa_juridica) AS total FROM tb_cliente_pessoa_juridica WHERE cnpj_pessoa_juridica =:cnpj";
    $query  = $this->db->prepare($sql);
    $query->bindParam(':cnpj', $CNPJ);
    $query->execute();
    $responser = $query->fetchAll(\PDO::FETCH_OBJ);
    if ($responser[0]->total >= 1) {
      return true;
    } else {
      return false;
    }
  }
  public function cadastrarCNPJ($value)
  {
    $sql = "INSERT INTO tb_cliente_pessoa_juridica SET "
      . "cnpj_pessoa_juridica    =:cnpj_pessoa_juridica";
    $query = $this->db->prepare($sql);
    $query->bindValue(':cnpj_pessoa_juridica', $value);
    if ($query->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function obterPropostasPJCadastradas()
  {
    $SQL = "SELECT *FROM tb_ficha_pessoa_juridica";
    $query = $this->db->prepare($SQL);
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_ASSOC);
  }
  public function cadastrarFichaPJ($formValues)
  {
    return $this->inserirRegistro("tb_ficha_pessoa_juridica",$formValues);
  }
  public function editarFichaPJ($formValues,$id)
  {
    unset($formValues['idProposta']);
    return $this->atualizarRegistro("tb_ficha_pessoa_juridica","id_proposta_pessoa_juridica",$id,$formValues, false);
  }
  public function obterDadosFichaPJId($id)
  {
    $SQL = "SELECT *FROM tb_ficha_pessoa_juridica WHERE id_proposta_pessoa_juridica =:id_proposta_pessoa_juridica";
    $query = $this->db->prepare($SQL);
    $query->bindParam(":id_proposta_pessoa_juridica", $id);
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_OBJ);
  }
  public function movimentarPropostaPJ($id)
  {
    $SQL_VERIFICAR_STATUS_PROPOSTA_PJ = "SELECT estado_analise_pessoa_juridica FROM tb_ficha_pessoa_juridica WHERE id_proposta_pessoa_juridica =:id_proposta_pj";
    $query1 = $this->db->prepare($SQL_VERIFICAR_STATUS_PROPOSTA_PJ);
    $query1->bindParam(':id_proposta_pj', $id);
    $query1->execute();
    $status_atual = $query1->fetchAll(\PDO::FETCH_OBJ);
    if ($status_atual[0]->estado_analise_pessoa_juridica == 'Em analise') 
    {
      return $this->adicionarStatusProposta($id, "Aprovada");
    }
    else if($status_atual[0]->estado_analise_pessoa_juridica == 'Aprovada')
    {
      return $this->adicionarStatusProposta($id, "Negada");
    }
    else if($status_atual[0]->estado_analise_pessoa_juridica == 'Negada')
    {
      return $this->adicionarStatusProposta($id, "Em analise");
    }
  }
  public function adicionarStatusProposta($id,$status_poposta)
  {
    $SQL_STATUS_PROPOSTA = "UPDATE tb_ficha_pessoa_juridica SET estado_analise_pessoa_juridica =:estado_proposta_pessoa_juridica WHERE id_proposta_pessoa_juridica =:id_proposta_pessoa_juridica";
    $query = $this->db->prepare($SQL_STATUS_PROPOSTA);
    $query->bindParam(":id_proposta_pessoa_juridica", $id);
    $query->bindParam(":estado_proposta_pessoa_juridica", $status_poposta);
    if($query->execute())
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function obterDadosProposta($id){
    return $this->obterRegistros("tb_ficha_pessoa_juridica","id_proposta_pessoa_juridica",$id,null,1, false);
  }
}
