<?php

function MENU_LINK()
{
    @session_start();
    $nivel = $_SESSION['tipo_usuario'];
    if ($nivel) {
        include_once(MENU_SISTEMA);
    }
}
function OPCAO_PAGINA()
{
    @session_start();
    $nivel = $_SESSION['tipo_usuario'];
    switch ($nivel) {
        case 'Suporte':
            include_once(OPCAO_SUPORTE_MASTER);
            break;
        case 'Administrador':
            include_once(OPCAO_SUPORTE_MASTER);
            break;
        case 'Funcionario':
            include_once(OPCAO_FUNCIONARIO);
            break;
    }
}
function NOTIFICACOES_PAGE()
{
    @session_start();
    $nivel = $_SESSION['tipo_usuario'];
    switch ($nivel) {
        case 'Suporte':
            include_once(NOTIFICACOES);
            break;
        case 'Administrador':
            include_once(NOTIFICACOES);
            break;
        case 'Funcionario':
            break;
    }
}
function TITULO_PAGINA()
{
    @session_start();
    $nivel = $_SESSION['tipo_usuario'];
    switch ($nivel) {
        case 'Suporte':
            echo TITULO_SUPORTE;
            break;
        case 'Administrador':
            echo TITULO_ADMINISTRADOR;
            break;
        case 'Funcionario':
            echo TITULO_FUNCIONARIO;
            break;
    }
}