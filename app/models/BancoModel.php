<?php

namespace app\models;

use app\core\Model;

class BancoModel extends Model
{
  public function salvarNovoBanco($post, $file)
  {
    $imgBitMap = file_get_contents($file['tmp_name']);
    $sql = "INSERT INTO tb_bancos_administradoras SET "
      . "cnpj_banco_administradora    =:cnpj_banco_administradora,"
      . "nome_banco_administradora    =:nome_banco_administradora,"
      . "logo_banco_administradora    =:logo_banco_administradora";
    $query = $this->db->prepare($sql);
    $query->bindValue(':cnpj_banco_administradora', $post['cnpj_banco_administradora']);
    $query->bindValue(':nome_banco_administradora', $post['nome_banco_administradora']);
    $query->bindValue(':logo_banco_administradora', $imgBitMap);
    if ($query->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function editarBanco($post, $file)
  {
    if($file['error'] == 0 )
    {
      $imgBitMap = file_get_contents($file['tmp_name']);
      $sql = "UPDATE tb_bancos_administradoras SET "
        . "nome_banco_administradora    =:nome_banco_administradora,"
        . "logo_banco_administradora    =:logo_banco_administradora WHERE"
        ." cnpj_banco_administradora     =:cnpj_banco_administradora";
      $query = $this->db->prepare($sql);
      $query->bindValue(':cnpj_banco_administradora', $post['cnpj_banco_administradora']);
      $query->bindValue(':nome_banco_administradora', $post['nome_banco_administradora']);
      $query->bindValue(':logo_banco_administradora', $imgBitMap);
      if ($query->execute()) {
        return true;
      } else {
        return false;
      }
    }else
    {
      $sql = "UPDATE tb_bancos_administradoras SET "
        . "nome_banco_administradora    =:nome_banco_administradora WHERE"
        ." cnpj_banco_administradora     =:cnpj_banco_administradora";
      $query = $this->db->prepare($sql);
      $query->bindValue(':cnpj_banco_administradora', $post['cnpj_banco_administradora']);
      $query->bindValue(':nome_banco_administradora', $post['nome_banco_administradora']);
      if ($query->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function obterBancosCadastrados()
  {
    return $this->obterRegistros("tb_bancos_administradoras",null,null,null,2,false);
  }
  public function obterDadosBanco($data)
  {
    return $this->obterRegistros("tb_bancos_administradoras","cnpj_banco_administradora",$data,null,1,false);
  }
  public function obterLogoBancoCNPJ($cnpj)
  {
    $logo = $this->obterRegistros("tb_bancos_administradoras","cnpj_banco_administradora",$cnpj,null,1,false);
    return base64_encode($logo[0]->logo_banco_administradora);
  }
}
