<?php

  /**
  *      # (Session.php) #
  * ----------------------------
  * @created   < 2/7/2023, 6:26:25 PM > 
  * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\Session\Session.php > 
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
 * Exibe todas as variaveis de sessão da sessão atual
 * {isExibirTela}
 *  true -> Exibe na tela e encerra a execução do código
 *  false -> Exibe no console
 */
function exibirVariaveisSessao($isExibirTela)
{
    @session_start();
    $params = $_SESSION;
    if ($isExibirTela) {
        echo "<pre>";
        print_r($params);
        echo "</pre>";
        exit;
    } else {
        echo "<div class='ocultar'><script>console.log('Parametros{";
        foreach ($params as $key => $value) {
            echo "\\nChave : " . $key . "\\n Valor : " . $value . "\\n";
        }
        echo "\\n}');</script></div>";
    }
}
/**
 * Exibe o valor de uma sessão especificada
 * {nmSessao} -> Nome da sessao
 * {nmDados} -> Nome do campo de dados
*/
function obterDadosSessao($nmSessao, $nmDados)
{
    @session_start();
    if ($_SESSION[$nmSessao][0][$nmDados] != null) {
        return $_SESSION[$nmSessao][0][$nmDados];
    }
    return 'Variavel inexistente';
}
/**
 * Exibe o valor de uma sessão
 * {nmSessao} -> Nome da sessao
*/
function obterValorSessao($nmSessao)
{
    @session_start();
    if ($_SESSION[$nmSessao] != null) {
        return $_SESSION[$nmSessao];
    }
    return 'Variavel inexistente';
}
/**
 * Exibe na tela o valor de uma sessão
 * {nmSessao} -> Nome da sessao
 * 
*/
function exibirSessao($nmSessao)
{
    if (isset($_SESSION[$nmSessao]) != null) {
        echo $_SESSION[$nmSessao];
        unset($_SESSION[$nmSessao]);
    }
}
/**
 * Verifica se a sessão esta ativa
 *  true -> Caso a sessão ativa
 *  false -> Caso a sessão não ativa
*/
function isSessaoAtiva()
{
    if (@session_status() == PHP_SESSION_ACTIVE) {
        return true;
    }

    return false;
}
/**
 * Verifica se a sessão existe
 * {nmSessao} -> Nome da sessao
 *  true -> Caso a sessão exista
 *  false -> Caso a sessão não exista
*/
function isVariavelSessaoExistente($nmSessao)
{
    @session_start();
    if (isSessaoAtiva()) {
        if (@$_SESSION[$nmSessao] != " ") {
            return true;
        }
        return false;
    }
    return false;
}
/**
 * Verifica se a integridade da sessão existe
 * {nmSessao} -> Nome da sessao
 * {nmVerificador} -> Parametro de verificacao
 *  true -> Caso a sessão exista
 *  false -> Caso a sessão não exista
*/
function isSessionOk($nmSessao, $nmVerificador)
{
    @session_start();
    if (isSessaoAtiva()) {
        if (@$_SESSION[$nmSessao] == $nmVerificador) {
            return true;
        }
        return false;
    }
    return false;
}
/**
 * Criar variavel de sessão inserindo um valor
 * {nmSessao} -> Nome da sessao
 * {vrSessao} -> Valor da variavel
 *  true -> Caso a sessão exista
 *  false -> Caso a sessão não exista
*/
function criarVariavelSessao($nmSessao, $vrSessao)
{
    @session_start();
    $_SESSION[$nmSessao] = $vrSessao;
    if ($_SESSION[$nmSessao] != null) {
        return true;
    }
    return false;
}