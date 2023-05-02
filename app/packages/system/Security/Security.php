<?php

  /**
  *      # (Security.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:25:58 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Security\Security.php > 
  * @type      < php > 
  * @author    <seu-nome>
  * @copyright <sua-empresa>
  * ----------------------------
  *      #  Descricao   #
  *     digite a decricao
  * ----------------------------
  * -- gerado automaticamente --
  *       phpcodedetals
  **/
  
/**
 * Criptografa uma senha com o metodo hash
 * {Tipo de critografia} - HASH
 * {Nivel} - DEFAULT
 */
function CRIPTOGRAFIA_HASH($data)
{
    return password_hash($data, PASSWORD_DEFAULT);
}

/**
 * Gera uma chave aleatoria
 */
function gerarChaveAleatoria()
{
    $ParametroDiferenciacao = mt_rand();
    $ParametroIdentificacao = "ENGCRIA";
    $ParametroDataGeracao   = date('dmY');
    $NovaChave              = $ParametroDiferenciacao . $ParametroIdentificacao . $ParametroDataGeracao;

    if ($NovaChave != null) {
        return $NovaChave;
    }
}
/**
 * Descriptografa senha HASH
 * {verificador} - Valor a ser verificado
 * {hash} - Valor a ser comparado
 */
function DESCRIPTOGRAFAR_HASH($verificador, $hash)
{
    return password_verify($verificador, $hash);
}
/**
 * Bloco de segurança do sistema
 * {verificador} - Valor a ser verificado
 * {chave} - Valor a ser comparado
 * {isAlert (Bolean)} - verificador para alerta do tipo windows alert
 */
function SECURITY_BLOCK_SYSTEM($verificador, $chave, $isAlert)
{
    if ($verificador != null && $chave != null && !$isAlert) {
        if ($verificador == $chave) {
            return true;
        } else {
            return false;
        }
    } else {
        if ($verificador != $chave) {
            windowsAlert("Você não tem permissão para acessar essa página!\\n(Nivel de acesso requerido)", true);
        }
    }
}

/**
 * Verificação e Validacao de Rota
 * {verificador} - Valor a ser verificado
 * {chave} - Valor a ser comparado
 * {isAlert (Bolean)} - verificador para alerta do tipo windows alert
 */
function VALIDAR_ROTA($verificador, $chave,)
{
    if ($verificador) {
        switch ($chave) {
            case SUPORTE:
                redirect(DASHBOAR_SUPORTE);
                break;
            case ADMINISTRADOR:
                redirect(DASHBOAR_ADMIN);
                break;
            case FUNCIONARIO:
                redirect(DASHBOAR_FUNCIONARIO);
                break;
        }
    }
}

/**
 * Verificacao e Validacao de Senha
 * {verificador} - Valor a ser verificado
 * {True} - Caso a senha esteja nos parametros
 * {Fasle} - Caso a senha não esteja nos parametros
 */
function VALIDAR_SENHA($verificador)
{
    if (strlen($verificador) < 8) {
        return false;
    }
    if (!preg_match('/^[a-zA-Z0-9]+/', $verificador)) {
        return false;
    }
    return true;
}

/**
 * Verificacao e Validacao de CNPJ
 * {verificador} - Valor a ser verificado
 * {True} - Caso a CNPJ esteja nos parametros
 * {Fasle} - Caso a CNPJ não esteja nos parametros
 */
function VALIDAR_CNPJ($verificador)
{
    $cnpj = preg_replace('/[^0-9]/', '', (string) $verificador);

    // Valida tamanho
    if (strlen($cnpj) != 14)
        return false;

    // Verifica se todos os digitos são iguais
    if (preg_match('/(\d)\1{13}/', $cnpj))
        return false;

    // Valida primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
        return false;

    // Valida segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}
/**
 * Verificacao e Validacao de CPF
 * {verificador} - Valor a ser verificado
 * {True} - Caso a CPF esteja nos parametros
 * {Fasle} - Caso a CPF não esteja nos parametros
 */
function VALIDAR_CPF($verificador)
{
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $verificador);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}
