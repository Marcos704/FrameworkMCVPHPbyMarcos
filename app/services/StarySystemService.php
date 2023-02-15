<?php

namespace app\services;

use app\core\Controller;
use app\models\GenericModel;
use app\packages\seguranca\Seguranca;

class StarySystemService extends Controller
{

  private GenericModel $GenericModel;
  private Seguranca $Security;

  public function salvarRegistro($dados){
    $this->GenericModel = new GenericModel();
    $this->Security = new Seguranca();
    $dados['senhaUsuario'] = $this->Security->criptografarSenha($dados['senhaUsuario']);
    $dadosCPF['sessaoCPF'] = $dados['cpfUsuario'];
    $dadosUsuario = arrayUnset($dados,"Usuario","end");
    $dadosFilial = arrayUnset($dados,"Filial", "end");
    $dadosModulos = arrayUnset($dados,"m", "start");
    $dadosPermissoes = arrayUnset($dados,"p", "start");


    if($this->GenericModel->salvarRegistro("tbUsuarios", $dadosUsuario) == "SQL INFOR PASS" &&
       $this->GenericModel->salvarRegistro("tbinformacoesfilial", $dadosFilial) == "SQL INFOR PASS" &&
       $this->GenericModel->salvarRegistro("tbmodulos", $dadosModulos) == "SQL INFOR PASS" &&
       $this->GenericModel->salvarRegistro("tbpermissoes", $dadosPermissoes) == "SQL INFOR PASS" &&
       $this->GenericModel->salvarRegistro("tbsessao",$dadosCPF)){
        echo "SQL INFOR PASS";
    }
  }
  
}
