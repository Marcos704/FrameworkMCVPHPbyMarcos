<?php

namespace app\Services;

use app\models\LoginModel;
use app\packages\validacao\Validacao;

class LoginService
{
  public Validacao $validador;
  public LoginModel $login;

  public function loginUsuario($data)
  {
    @session_destroy();
    @session_start();
    $validador = new Validacao();
    $login = new LoginModel();
    if ($data['cpfUsuario'] == null || $data['senhaUsuario'] == null) {
      notificacao1("Ops...", "Erro ao enviar dados para o servidor.", "loginResponser", URL_BASE, "danger", false);
    }
    if (isSessaoAtiva() != null && isSessaoAtiva()) {
      if ($validador->isCPFValido($data['cpfUsuario'])) {
        if ($login->usuarioExistente($data)) {
          if ($login->login($data)) {
            if($this->inicarInformacoes($data)){
              return true;
            }else{
              notificacao1("Ops...", "Erro ao inicar variaveis", "loginResponser", URL_BASE, "danger", true);
            }
          } else {
            notificacao1("Ops...", "O usuário ou senha inválidos.", "loginResponser", URL_BASE, "danger", true);
          }
        } else {
          notificacao1("Ops...", "O usuário ou senha inválidos.", "loginResponser", URL_BASE, "danger", true);
        }
      } else {
        notificacao1("Ops...", "O cpf digitado é inválido.", "loginResponser", URL_BASE, "danger", true);
      }
    } else {
      notificacao1("Ops...", "Erro de servidor.", "loginResponser", URL_BASE, "danger", false);
    }
  }

  public function inicarInformacoes($data)
  {
    $login = new LoginModel();
    $dadosUsuario = $login->carregarInformacoes($data);
    $dadosPermissoes = $login->carregarPermissoes($data);
    $dadosModulos = $login->carregarModulos($data);
    if ($login) {
      if (
        criarVariavelSessao("dadosUsuario", $dadosUsuario) &&
        criarVariavelSessao("dadosPermissoes", $dadosPermissoes) &&
        criarVariavelSessao("dadosModulos", $dadosModulos)
      ) {
        return true;
      }
      return false;
    }
  }
}
