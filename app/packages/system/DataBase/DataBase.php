<?php

/**
 *      # (DataBase.php) #
 * ----------------------------
 * @created   < 2/16/2023, 4:57:23 PM > 
 * @path      < c:\xampp\htdocs\IFDarknet\app\packages\system\DataBase\DataBase.php > 
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

namespace app\packages\system\DataBase;

use app\core\Model;

class DataBase extends Model
{
    /**
     * Insere um registro
     * $tabela  - Tabela do banco de dados
     * $data    - Array de dados que serao inseridos
     */
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
        if ($this->sqlExecute($INSERT) != NULL) {
            return true;
        }
        return false;
    }
    /**
     * Apaga um registro
     * $tabela          - Tabela do banco de dados
     * $condicaoOnde    - Coluna de valor de verificacao
     * $condicaoIgua    - Coluna de verificacao 
     */
    public function apagarRegistro($tabela, $condicaoOnde, $condicaoIgua, )
    {
        $sql = "DELETE FROM {$tabela} WHERE {$condicaoOnde}  =  '{$condicaoIgua}'";
        if ($this->sqlExecute($sql) != NULL) {
            return true;
        }
        return false;
    }
    /**
     * Atualiza um registro
     * $tabela          - Tabela do banco de dados
     * $condicaoOnde    - Coluna de valor de verificacao
     * $condicaoIgua    - Coluna de verificacao
     * $data            - Dados que serao atualizados
     */
    public function atualizarRegistro($tabela, $condicaoOnde, $condicaoIguaA, $data)
    {
        $SQLSTART = "UPDATE {$tabela} SET ";
        foreach ($data as $k => $dados) {
            $SQLPARAMETERS[] = "{$k} =  '{$dados}',";
        }
        $DADOS = substr(implode($SQLPARAMETERS), 0, -2);
        $SQLEND = "' WHERE {$condicaoOnde}  =  '{$condicaoIguaA}';";
        $SQLMASTER = $SQLSTART . $DADOS . $SQLEND;
        if ($this->sqlExecute($SQLMASTER) != NULL) {
            return true;
        }
        return false;
    }
    /**
     * $tabela: Nome da tablea
     * $condicaoOnde: Condicao Where (Null -> Caso não queria condição)
     * $condicaoIguaA: valor a ser verificado no Where (Null -> Caso não queria condição)
     * $tabelaJoin: Tabela join (Null -> Caso não queria condição)
     * $modoRetorno: (1->Objeto 2->Array null->Padrão = Array)
     * $isExibirLog: (1->Exibir 2->Nao)
     */
    public function obterRegistros($tabela, $condicaoOnde, $condicaoIguaA, $tabelaJoin, $modoRetorno)
    {
        if ($condicaoIguaA != null && $condicaoOnde != null) {

            $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde}  =  '{$condicaoIguaA}'";
            return $this->sqlExecute($sql, $modoRetorno);
        } else
        if ($condicaoIguaA != null && $condicaoOnde != null && $tabelaJoin != null) {
            $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde} JOIN {$tabelaJoin} =  '{$condicaoIguaA}'";
            if($this->sqlExecute($sql, $modoRetorno) != NULL){
                return $this->sqlExecute($sql, $modoRetorno);
            }
            return NULL;
        } else {
            $sql = "SELECT *FROM {$tabela}";
            if($this->sqlExecute($sql, $modoRetorno) != NULL){
                return $this->sqlExecute($sql, $modoRetorno);
            }
            return NULL;
        }
    }
    /**
     * $tabela: Nome da tablea
     * $condicaoOnde: Condicao Where (Null -> Caso não queria condição)
     * $condicaoIguaA: valor a ser verificado no Where (Null -> Caso não queria condição)
     * $tabelaJoin: Tabela join (Null -> Caso não queria condição)
     */
    public function obterTotalRegistros($tabela, $condicaoOnde, $condicaoIguaA, $tabelaJoin)
    {
        if ($condicaoIguaA != null && $condicaoOnde != null) {
            $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde}  =  '{$condicaoIguaA}'";
            if($this->sqlExecute($sql) != NULL){
                return count($this->sqlExecute($sql));
            }
            return NULL;
        } else
        if ($condicaoIguaA != null && $condicaoOnde != null && $tabelaJoin != null) {
            $sql = "SELECT *FROM {$tabela} WHERE {$condicaoOnde} JOIN {$tabelaJoin} =  '{$condicaoIguaA}'";
            if($this->sqlExecute($sql) != NULL){
                return count($this->sqlExecute($sql));
            }
            return NULL;
        } else {
            $sql = "SELECT *FROM {$tabela}";
            if($this->sqlExecute($sql) != NULL){
                return count($this->sqlExecute($sql));
            }
            return NULL;
        }
    }

    /**
     * Executa script SQL
     * - verifica e prepara o script SQL
     * - return mode (1 - Array 2 - Objeto)
     */
    public function sqlExecute($sqlQuery, $returnMode = 1)
    {
        if (!$sqlQuery) {
            return null;
        }

        try {
            $responser =  $this->db->prepare($sqlQuery);
            $responser->execute();

            if (str_contains($sqlQuery, "SELECT")) {
                switch ($returnMode) {
                    case 1:
                        return $responser->fetchAll(\PDO::FETCH_ASSOC);
                        break;
                    case 2:
                        return $responser->fetchAll(\PDO::FETCH_OBJ);
                        break;
                }
            }
        } catch (\PDOException $exception) {
            $parametrosErro = "\nCodigo do erro: " . $exception->getCode() . "\nDescricao do erro: " . $exception->getMessage();
            console_log("SQL_ERRO", "Falha ao realizar a execucao.", "$parametrosErro", "erro");
        }
    }
}
