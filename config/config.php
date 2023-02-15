<?php
namespace app\config;
/**DADOS DE ACESSO PARA AMBIENTE DE DESENVOLVIMENTO */
define("SERVIDOR", "localhost");
define("BANCO", "gfitness_engcria_db");
define("USUARIO", "suport");
define("SENHA", "swu@660031");
define("HORA_PADRAO", date('Y-m-d H:i:s'));
define("HORA_PADRAO_EXIBICAO", date('d-m-Y H:i:s'));


define('CONTROLLER_PADRAO', 'home');
define('METODO_PADRAO', 'index');
define('NAMESPACE_CONTROLLER', 'app\\controllers\\');

define('URL_BASE', 'http://192.168.1.200/GFitness/');
define('URL_BASE_ROTAS', 'http://192.168.1.200/GFitness/app/views/');
define('URL_BASE_TEMPLATE_SISTEMA','../../../../GFitness/');
//
/**DADOS DE ACESSO PARA O AMBIENTE DE PRODUÇÃO 

define("SERVIDOR", "mysql592.lnxserversecure.com");
define("BANCO", "credimai_cadastro_ficha");
define("USUARIO", "credimai_suport");
define("SENHA", "swu@660031");
define("HORA_PADRAO", date('Y-m-d H:i:s'));

define('URL_BASE', 'http://fizcard.credimaisbr.com.br/');
define('URL_BASE_ROTAS', 'http://fizcard.credimaisbr.com.br/app/views/');
define('URL_BASE_TEMPLATE_SISTEMA','http://fizcard.credimaisbr.com.br');
*/

/** ROTAS PARA REDIRECIONAMENTO NO SISTEMA */
define('DASHBOAR','System/Dashboard');
define('MENU_SISTEMA','app/views/menu-sistema/menu.php');
define('OPCAO_SUPORTE_MASTER','app/views/opcoes-sistema/opcao_suporte_master.php');
define('OPCAO_FUNCIONARIO','app/views/opcoes-sistema/opcao_funcionario.php');
define('NOTIFICACOES','app/views/notificacoes/notificacoes.php');
define('TEMPLATE_SISTEMA','templateSistema');
define('TEMPLATE_LOGIN','templateLogin');
define('TEMPLATE_RECUPERAR_SENHA','Recovery');
define('TEMPLATE_START_SYSTEM','StartSystem');
define('TEMPLATE_PAGE_NOT_FOUND','pageNotFound');

/**VARIAVEIS DO SISTEMA */
define ('TABELA_USUARIOS','tbUsuarios');
define ('ROTA_LOGIN','templateLogin');
define ('ROTA_START_SYSTEM','StartSystem');
define('TITULO_SUPORTE','Suporte');
define('TITULO_ADMINISTRADOR','Admin');
define('TITULO_FUNCIONARIO','Funcionario');
//define('TITULO_LOGIN','Credi <small><i class="fa-solid fa-plus"></i></small>');
define('TITULO_LOGIN','Teste');

/**VARIAVEIS PARA EMAIL */
define('EMAIL_NO_REPLY','engcriasoftwares@credimaisbr.com.br');
define('EMAIL_HOST_GMAIL','mail.credimaisbr.com.br');
define('EMAIL_SMTP_SECURE','ssl');
define('EMAIL_USERNAME','engcriasoftwares@credimaisbr.com.br');
define('EMAIL_PASSWORD','swu@660031');
define('EMAIL_CHARSET','UTF-8');
define('EMAIL_SUBTITLE','noreply');
/** REGISTRO PARA USUARIO PADRAO DO SISTEMA */
define ('NOME_USUARIO_PADRAO','engcria');
define ('SOBRENOME_USUARIO_PADRAO', 'softwares');
define ('SENHA_USUARIO_PADRAO', 'swu@660031');
define ('SENHA_USUARIO_PADRAO_CRIPTOGRAFADA', password_hash(SENHA_USUARIO_PADRAO, PASSWORD_DEFAULT));
define ('EMAIL_USUARIO_PADRAO', 'engcriasoftwares@gmail.com');
define ('CNPJ_USUARIO_PADRAO', '10.100.100/1000-10');
define ('CPF_USUARIO_PADRAO', '607.123.743-29');
define ('TIPO_USUARIO_PADRAO','Suporte');
define ('REGISTRO_CADASTRO_USUARIO_PADRAO', HORA_PADRAO);

?>