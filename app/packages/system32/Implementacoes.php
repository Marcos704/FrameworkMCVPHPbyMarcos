<?php


function arrayUnset($array, $params, $position)
{
    $data = $array;
    for ($i = 0; $i < count($data); $i++) {
        foreach ($data as $key => $value) {
            if ($position == 'start') {
                if (!str_starts_with($key, $params)) {
                    unset($data[$key]);
                }
            } else
         if ($position == 'end') {
                if (!str_ends_with($key, $params)) {
                    unset($data[$key]);
                }
            }
        }
    }
    return $data;
}
function exibirVariaveisSessao($exibirTela)
{
    @session_start();
    $data = $_SESSION;
    unset($data['dadosUsuario'][0]['senhaUsuario']);
    if ($exibirTela) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    } else {
        console_log("Variaveis de sessao");
        foreach ($data as $key => $value) {
            //echo $key ." | ".$value."<br>";
            console_log("Chave: " . $key);
        }
    }
}
function obterDadosSessao($nmSessao, $nmDados)
{
    @session_start();
    if ($_SESSION[$nmSessao][0][$nmDados] != null) {
        return $_SESSION[$nmSessao][0][$nmDados];
    }
    return 'Variavel inexistente';
}
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
function isSessaoExistente($Responser)
{
    if (isset($_SESSION[$Responser]) != null) {
        echo $_SESSION[$Responser];
        unset($_SESSION[$Responser]);
    }
}
function criarVariavelSessao($nmSessao, $vrSessao)
{
    @session_start();
    $_SESSION[$nmSessao] = $vrSessao;
    if ($_SESSION[$nmSessao] != null) {
        return true;
    }
    return false;
}
function isSessaoAtiva()
{
    if (@session_status() == PHP_SESSION_ACTIVE) {
        return true;
    }

    return false;
}
function add($path)
{
    include_once("app/views/includes/" . $path . ".php");
}
function getDataHoraAtual()
{
    $data = date('Y-m-d H:i:s');
    return $data;
}
function getDataHoraAtualFomatted()
{
    $data = date('d-m-Y H:i:s');
    return $data;
}
function getDiaAtual()
{
    return date('d');
}
function getMesAtual()
{
    return date('m');
}
function getAnoAtual()
{
    return date('Y');
}
