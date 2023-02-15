<?php
namespace app\models;
use app\core\Model;
use app\functions\CustomAlerts;
use app\config;

class ParametrosIniciaisModel extends Model{



    /**Metodo que gera a chave de sessao do usuario para ser registrado no sistema
     * - O metodo verifica antes se a chave já existe, caso já exista, ele é chamado
     *   novamente e retorna a chave somente se a mesma não exista no banco;
     * - Exemplo de chave de registro
     *      1604716014ENGCRIA29122021
     *      
     *      1604716014 -> Parametro de diferenciação
     *      ENGCRIA    -> Parametro de identificação
     *      29122021   -> Data de geração da chave
     */
    private function gerarChave(){
        $ParametroDiferenciacao = mt_rand();
        $ParametroIdentificacao = "ENGCRIA";
        $ParametroDataGeracao   = date('dmY');
        $NovaChave              = $ParametroDiferenciacao.$ParametroIdentificacao.$ParametroDataGeracao;
        
        if($NovaChave!=null){
            return $NovaChave;   
        }
    }
    
    public function initTB_USUARIO_SESSAO($TB_USUARIO_SESSAO){
        if($TB_USUARIO_SESSAO != null){
            $sql3    = "INSERT INTO ".$TB_USUARIO_SESSAO." SET "
                      ."chave_sessao_usuario =:chave_sessao_usuario,"
                      ."cpf_sessao_usuario =:cpf_sessao_usuario";
            $query3  = $this->db->prepare($sql3);
            $query3->bindValue(":chave_sessao_usuario", $this->gerarChave());
            $query3->bindValue(":cpf_sessao_usuario",   CPF_USUARIO_PADRAO);
            $query3->execute();
        }
    }

    public function initTB_USUARIO($TB_USUARIO){
        if($TB_USUARIO != null){
            $sql2 = "INSERT INTO ".$TB_USUARIO." SET "
                ."cpf_usuario               =:cpf_usuario_padrao,"
                ."nome_usuario              =:nome_usuario_padrao,"
                ."sobrenome_usuario         =:sobrenome_usuario_padrao,"
                ."senha_usuario             =:senha_usuario_padrao,"
                ."email_usuario             =:email_usuario_padrao,"
                ."tipo_usuario              =:tipos_usuario_padrao,"
                ."datacadastro_usuario      =:registro_cadastro_usuario_padrao";
        
                $query2 = $this->db->prepare($sql2);

                $query2->bindValue(":cpf_usuario_padrao",                     CPF_USUARIO_PADRAO);
                $query2->bindValue(":nome_usuario_padrao",                    NOME_USUARIO_PADRAO);
                $query2->bindValue(":sobrenome_usuario_padrao",               SOBRENOME_USUARIO_PADRAO);
                $query2->bindValue(":senha_usuario_padrao",                   SENHA_USUARIO_PADRAO_CRIPTOGRAFADA);
                $query2->bindValue(":email_usuario_padrao",                   EMAIL_USUARIO_PADRAO);
                $query2->bindValue(":tipos_usuario_padrao",                   TIPO_USUARIO_PADRAO);
                $query2->bindValue(":registro_cadastro_usuario_padrao",       REGISTRO_CADASTRO_USUARIO_PADRAO);
                $query2->execute();
        }
    }
    public function initTB_PARAMETROS_SISTEMA($TB_PARAMETROS_SISTEMA){
        if($TB_PARAMETROS_SISTEMA != null){
            $sql1 = "INSERT INTO ".$TB_PARAMETROS_SISTEMA." SET "
                ."nome_usuario_padrao              =:nome_usuario_padrao,"
                ."sobrenome_usuario_padrao         =:sobrenome_usuario_padrao,"
                ."senha_usuario_padrao             =:senha_usuario_padrao,"
                ."email_usuario_padrao             =:email_usuario_padrao,"
                ."cnpj_usuario_padrao              =:cnpj_usuario_padrao,"
                ."tipo_usuario_padrao              =:tipos_usuario_padrao,"
                ."registro_cadastro_usuario_padrao =:registro_cadastro_usuario_padrao";
        
                $query1 = $this->db->prepare($sql1);

                $query1->bindValue(":nome_usuario_padrao",                NOME_USUARIO_PADRAO);
                $query1->bindValue(":sobrenome_usuario_padrao",           SOBRENOME_USUARIO_PADRAO);
                $query1->bindValue(":senha_usuario_padrao",               SENHA_USUARIO_PADRAO_CRIPTOGRAFADA);
                $query1->bindValue(":email_usuario_padrao",               EMAIL_USUARIO_PADRAO);
                $query1->bindValue(":cnpj_usuario_padrao",                CNPJ_USUARIO_PADRAO);
                $query1->bindValue(":tipos_usuario_padrao",               TIPO_USUARIO_PADRAO);
                $query1->bindValue(":registro_cadastro_usuario_padrao",   REGISTRO_CADASTRO_USUARIO_PADRAO);
                $query1->execute();
        } 
        
        
    }
}
?>