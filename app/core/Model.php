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
                \PDO::MYSQL_ATTR_INIT_COMMAND => "Set NAMES utf8"
            );
            return $this->db = new \PDO("mysql:dbname=" . BANCO . ";host=" . SERVIDOR, USUARIO, SENHA, $opcoes);
        } catch (\PDOException $e) {
            if($e->getCode()){
                echo "
            <head>
            <link rel='shortcut icon' href=".URL_BASE."assets/template/sistema/assets/Logo.svg' type='image/x-icon'>
            <link rel='icon' href=".URL_BASE."assets/template/sistema/img/Logo.svg' type='image/x-icon'>
            <script src='https://kit.fontawesome.com/617ef9b753.js' crossorigin='anonymous'></script></head>    
            <body style='background-color:#324ca8; align-items:center;justify-content: center; display: flex;'>
                <div>
                    <div style='width:32rem;padding:10px;margin:10px;border: 1px solid #cecece; border-radius: 3px; align-items:center; text-align:center; background-color: #fff;'>
                        <div>
                            <h1 style='font-family:arial; font-size:24px; font-weight:700; color:#4045BC'>
                                <i class='fa-solid fa-database fa-2x'></i>
                            </h1>
                            <br>
                            <h3 style='font-family:arial; font-size:24px; font-weight:800;'>Possível erro ao se comunicar com o servidor</h3>
                            <br>
                            <span style='font-family:arial; font-size:24px; font-weight:200;'>Contate o suporte imediatamente!</span><br><br>
                            <small style='font-family:arial; font-size:10px; font-weight:lighter; color:#4045BC'>
                                engcriatema <br>copyright &copy; 2011-2022
                            </small>
                        </div>
                    </div>
                </div>
            </body>
                ";
            exit;
            }
        }
    }
    public function inserirRegistro($tabela, $data)
    {
        foreach ($data as $k => $dados) {
            $parametros[] = "{$k}, ";
            $values[] = "'{$dados}', ";
        }
        $PA = implode($parametros);
        $PV = implode($values);
        $COLUNAS = substr($PA, 0, -2);
        $VALORES = substr($PV, 0, -2);
        $INSERT = "INSERT INTO {$tabela} ($COLUNAS) VALUES ($VALORES)";

        try {
            $query = $this->db->prepare($INSERT);
            $query->execute();
            return "SQL INFOR PASS";
        } catch (\PDOException $e) {
            console_log("Type: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage());
            //throw new \PDOException($e);
        }
    }
    public function apagarRegistro($tabela, $condicaoOnde, $condicaoIgua, $isExibirLog)
    {
        try {
            $sql = "DELETE FROM {$tabela} WHERE {$condicaoOnde}  =  '{$condicaoIgua}'";
            $query = $this->db->prepare($sql);
            $query->execute();
            if ($isExibirLog) {
                console_log_js("Type: SQL DELETE\n" . "\nTabela.:" . $tabela . "\nRetorno.:");
            }
            return "SQL INFOR PASS";
        } catch (\PDOException $e) {
            if ($isExibirLog) {
                console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
            }
            return $e->getCode();
        }
    }
    public function atualizarRegistro($tabela, $condicaoOnde, $condicaoIguaA, $data, $isExibirLog)
    {
        try {
            $SQLSTART = "UPDATE {$tabela} SET ";
            foreach ($data as $k => $dados) {
                $SQLPARAMETERS[] = "{$k} =  '{$dados}',";
            }
            $DADOS = substr(implode($SQLPARAMETERS), 0, -2);
            $SQLEND = "' WHERE {$condicaoOnde}  =  '{$condicaoIguaA}';";
            $SQLMASTER = $SQLSTART.$DADOS.$SQLEND;
            $query = $this->db->prepare($SQLMASTER);
            $query->execute();
            if ($isExibirLog) {
               console_log("Type: SQL UPDATE\n" . "\nTabela.:" . $tabela . "\nRetorno.:");
            }
            return "SQL INFOR PASS";
        } catch (\PDOException $e) {
            if ($isExibirLog) {
                console_log("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
            }
            return $e->getCode();
        }
    }
    /**
     * $tabela: Nome da tablea
     * $condicaoOnde: Condicao Where (Null -> Caso não queria condição)
     * $condicaoIguaA: valor a ser verificado no Where (Null -> Caso não queria condição)
     * $tabelaJoin: Tabela join (Null -> Caso não queria condição)
     * $modoRetorno: (1->Objeto 2->Array null->Padrão = Array)
     * $isExibirLog: (1->Exibir 2->Nao)
     */
    public function obterRegistros($tabela, $condicaoOnde, $condicaoIguaA, $tabelaJoin, $modoRetorno, $isExibirLog)
    {
        if ($condicaoIguaA != null && $condicaoOnde != null) {
            try {
                $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde}  =  '{$condicaoIguaA}'";
                $query = $this->db->prepare($sql);
                $query->execute();
                if ($isExibirLog == 1) {
                    console_log_js("Type: SQL SELECT\n" . "\nTabela.:" . $tabela . "\nRetorno.:");
                }
                if ($modoRetorno == 1) {
                    return $query->fetchAll(\PDO::FETCH_OBJ);
                } else
                if ($modoRetorno == 2) {
                    return $query->fetchAll(\PDO::FETCH_ASSOC);
                } else {
                    return $query->fetchAll(\PDO::FETCH_ASSOC);
                }
            } catch (\PDOException $e) {
                if ($isExibirLog == 1) {
                    console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
                }
            }
        } else
        if ($condicaoIguaA != null && $condicaoOnde != null && $tabelaJoin != null) {
            try {
                $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde} JOIN {$tabelaJoin} =  '{$condicaoIguaA}'";
                $query = $this->db->prepare($sql);
                $query->execute();
                if ($isExibirLog == 1) {
                    console_log_js("Type: SQL SELECT\n" . "\nTabela.:" . $tabela . "\nRetorno.:");
                }
                if ($modoRetorno == 1) {
                    return $query->fetchAll(\PDO::FETCH_OBJ);
                } else
                if ($modoRetorno == 2) {
                    return $query->fetchAll(\PDO::FETCH_ASSOC);
                } else {
                    return $query->fetchAll(\PDO::FETCH_ASSOC);
                }
            } catch (\PDOException $e) {
                if ($isExibirLog == 1) {
                    console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
                }
            }
        } else {
            try {
                $sql = "SELECT *FROM {$tabela}";
                $query = $this->db->prepare($sql);
                $query->execute();
                if ($isExibirLog == 1) {
                    console_log_js("Type: SQL SELECT Tabela.:{$tabela} Retorno.:");
                }
                if ($modoRetorno == 1) {
                    return $query->fetchAll(\PDO::FETCH_OBJ);
                } else
                if ($modoRetorno == 2) {
                    return $query->fetchAll(\PDO::FETCH_ASSOC);
                } else {
                    return $query->fetchAll(\PDO::FETCH_ASSOC);
                }
            } catch (\PDOException $e) {
                if ($isExibirLog == 1) {
                    console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
                }
            }
        }
    }
    /**
     * $tabela: Nome da tablea
     * $condicaoOnde: Condicao Where (Null -> Caso não queria condição)
     * $condicaoIguaA: valor a ser verificado no Where (Null -> Caso não queria condição)
     * $tabelaJoin: Tabela join (Null -> Caso não queria condição)
     * $modoRetorno: (1->Objeto 2->Array null->Padrão = Array)
     * $isExibirLog: (1->Exibir 2->Nao)
     */
    public function obterTotalRegistros($tabela, $condicaoOnde, $condicaoIguaA, $tabelaJoin,$isExibirLog)
    {
        if ($condicaoIguaA != null && $condicaoOnde != null) {
            try {
                $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde}  =  '{$condicaoIguaA}'";
                $query = $this->db->prepare($sql);
                $query->execute();
                if ($isExibirLog == 1) {
                    console_log_js("Type: SQL SELECT\n" . "\nTabela.:" . $tabela . "\nRetorno.:");
                }
                return count($query->fetchAll(\PDO::FETCH_ASSOC));
            } catch (\PDOException $e) {
                if ($isExibirLog == 1) {
                    console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
                }
            }
        } else
        if ($condicaoIguaA != null && $condicaoOnde != null && $tabelaJoin != null) {
            try {
                $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde} JOIN {$tabelaJoin} =  '{$condicaoIguaA}'";
                $query = $this->db->prepare($sql);
                $query->execute();
                if ($isExibirLog == 1) {
                    console_log_js("Type: SQL SELECT\n" . "\nTabela.:" . $tabela . "\nRetorno.:");
                }
                return count($query->fetchAll(\PDO::FETCH_ASSOC));
            } catch (\PDOException $e) {
                if ($isExibirLog == 1) {
                    console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
                }
            }
        } else {
            try {
                $sql = "SELECT *FROM {$tabela}";
                $query = $this->db->prepare($sql);
                $query->execute();
                if ($isExibirLog == 1) {
                    console_log_js("Type: SQL SELECT Tabela.:{$tabela} Retorno.:");
                }
                return count($query->fetchAll(\PDO::FETCH_ASSOC));
                
            } catch (\PDOException $e) {
                if ($isExibirLog == 1) {
                    console_log_js("\nType: SQL ERRO\nCódigo Erro.: " . $e->getCode() . "\nDescrição Erro.: " . $e->getMessage() . "\nRetorno.: ");
                }
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
    public function getDBConection(){
        return $this->db;
    }
}
