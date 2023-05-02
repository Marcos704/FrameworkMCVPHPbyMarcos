<?php

namespace app\core;


abstract class Model
{
    protected $db;
    private $dbErroMenssager;
    private $dbErroCode;
    private $debug;

    public function __construct()
    {
        $this->dbConnectionStart();
    }
    public function dbConnectionStart()
    {
        try {
            date_default_timezone_set('America/Sao_Paulo');
            $opcoes = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;SET time_zone = 'America/Sao_Paulo'",
            );
            return $this->db = new \PDO("mysql:dbname=" . BANCO . ";host=" . SERVIDOR, USUARIO, SENHA, $opcoes);
        } catch (\PDOException $e) {
            if ($e->getCode()) {
                echo '
                
                <!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="' . URL_BASE . 'assets/template/sistema/img/engcriasoftwares_favicon.png" type="image/x-icon">
    <link rel="icon" href="' . URL_BASE . 'assets/template/sistema/img/engcriasoftwares_favicon.png" type="image/x-icon">

    <link rel="apple-touch-icon" sizes="144x144" href="' . URL_BASE . 'assets/template/sistema/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="' . URL_BASE . 'assets/template/sistema/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href=' . URL_BASE . '"assets/template/sistema/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="' . URL_BASE . 'assets/template/sistema/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="' . URL_BASE . 'assets/template/sistema/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#0072C6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5c5c5c">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="https://kit.fontawesome.com/617ef9b753.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Frota</title>
</head>
<style>
    body {
        max-width: max-content;
        margin: auto;
        padding-top: 30px;
    }
    
    .img-top {
        text-align: center;
        align-items: center;
        background: #f5f5f5;
    }
    
    .img-erro {
        height: 128px;
        padding: 15px;
    }
</style>

<body>
    <div class="container">
        <div class="card">
            <div class="img-top">
                <img src="assets/template/sistema/img/engcriasoftwares_erro_conexao.png" width="320px" alt="">
            </div>
            <div class="card-body">
                <p class="card-text">Caso o erro persista, entre em contato com o suporte técnico.: <a href="https://api.whatsapp.com/send?phone=55xxxxxxx-xxxx&text=Olá, preciso de ajuda.">clique aqui</a></p>
            </div>
        </div>
    </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>';
                console_log("Erro", strval($e->getCode()), strval($e->getMessage()), "erro");
                echo "</html>";
                exit;
            }
        }
    }
    public function getDBCodeErro()
    {
        return $this->dbErroCode;
    }
    public function getDBMenssagerErro()
    {
        return $this->dbErroMenssager;
    }
    public function getDBConection()
    {
        return $this->db;
    }
}
