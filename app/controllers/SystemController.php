<?php

namespace app\controllers;

use app\core\Controller;
use app\services\UserService;
use app\services\ClienteCNPJService;
use app\services\DatabaseService;
use app\services\ClienteCPFService;
use app\services\BancoService;
use app\services\SystemService;

class SystemController extends Controller
{
    private UserService $service;
    private ClienteCNPJService $clienteCNPJService;
    private ClienteCPFService $clienteCPFService;
    private BancoService $bancoService;
    private DatabaseService $dbService;
    private SystemService $systemService;
    /**
     * CHAMADA  - VISUALIZAÇÃO DE PÁGINAS
     */
    public function index()
    {
        @session_start();
        if(isSessaoAtiva() && obterDadosSessao("dadosUsuario", "tpUsuario") != null){
            $dados["view"]= DASHBOAR;
            $this->load(TEMPLATE_SISTEMA, $dados);
        }
        //$dados["view"] = DASHBOAR_SUPORTE;
        //$this->load(TEMPLATE_SISTEMA, $dados);
        //$this->load(TEMPLATE_SISTEMA);
    }
    public function backPague()
    {
        $this->redirectAfter();
    }
    public function longOut()
    {
        @session_start();
        $this->systemService = new SystemService();
        $this->systemService->longOut($_SESSION['cpf_usuario']);
    }
    /**
     * CHAMADA - TELA - DASHBOARD
     */
    public function dashboard()
    {
        $dados["view"] = DASHBOAR;
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    /**
     * CHAMADA - TELA - CONFIGURACOES
     */
    public function cadastroAdministradora()
    {
        $dados["view"] = "System/configuracoes/configAdministradora";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function configuracoesSistema()
    {
        $dados["view"] = "System/configuracoes/configuracoesSistema";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function cadastrarAdministradora()
    {
        $this->systemService = new SystemService();
        $this->systemService->cadastrarAdministradora($_POST);
    }
    public function editarAdministradora()
    {
        $this->systemService = new SystemService();
        $this->systemService->editarAdministradora($_POST);
    }
    /**
     * CHAMADA - TELA - PROPOSTA PDF
     */
    public function propostaPDF()
    {
        $this->load("System/Proposta/PropostaPDF/proposta_pdf");
    }
    /**
     * CHAMADA - METODOS - DASHBOARD
     */
    public function totalUsuariosCadastrados()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getUsersCount();
    }
    public function totalUsuariosPFCadastrados()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getUsersPFCount();
    }
    public function totalUsuariosPJCadastrados()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getUsersPJCount();
    }
    public function totalPropostasCadastrados()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getPropostasCount();
    }
    public function totalPropostasAnalise()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getPropostasAnaliseCount();
    }
    public function totalPropostasAceitas()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getPropostasAceitasCount();
    }
    public function totalPropostasNegadas()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getPropostasNegadasCount();
    }
    public function totalPropostasFinalizadas()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getPropostasFinalizadasCount();
    }
    public function totalBancosCadastrados()
    {
        $this->dbService = new DatabaseService();
        echo $this->dbService->getBancosCount();
    }
    /**
     * CHAMADA - TELA - MODULOS DE USUÁRIOS
     */
    public function cadastrar_verificar()
    {
        @session_start();
        $dados["view"] = "System/usuario/verificarCPF";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function cadastro_novoUsuario()
    {
        $dados["view"] = "System/usuario/cadastrar";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function visualizarDadosUsuario()
    {
        $dados["view"] = "System/usuario/visualizarDadosUsuario";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function editarUsuario()
    {
        $dados["view"] = "System/usuario/editar";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function permissaoUsuario()
    {
        $dados["view"] = "System/usuario/permissao";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    /**
     * CHAMADA - METODOS - MODULOS DE USUÁRIOS
     */
    public function cadastrar()
    {
        @session_start();
        $this->service = new UserService();
        $this->service->callbackUserVerification($_POST['cpf_usuario']);
    }
    public function editar()
    {
        @session_start();
        echo 'redirecionar para edicao';
    }
    public function edicaoDados()
    {  
        //debug($_POST);exit;
        $this->service = new UserService();
        $this->service->callBackEditarUsuario($_POST);
    }
    public function edicaoDadosRapida()
    {
        $this->service = new UserService();
        $this->service->callBackEditarUsuarioPorCPF($_GET['data']);
    }
    public function salvarNovoUsuario()
    {
        $this->service = new UserService();
        $this->service->callbackUserRegister($_POST);
    }
    public function apagarUsuario()
    {
        $this->service = new UserService();
        if ($this->service->callbackDeleteUserRegister($_GET['data']) == "requisicaoCompleta") {
            $this->redirectAfter();
        }
    }
    /**
     * CHAMADA - TELA - MODULOS DE PROPOSTA - PJ
     */
    public function verificarClientePJ()
    {
        $dados["view"] = "System/Proposta/Cliente/verificarClientePJ";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function gerarPropostaPessoaJuridica()
    {
        $dados["view"] = "System/Proposta/PJ/gerarPropostaPJ";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function listarPropostaPJ()
    {
        $dados["view"] = "System/Proposta/PJ/listarPropostaPJ";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    /**
     * CHAMADA - METODOS -  MODULOS DE PROPOSTA - PJ
     */
    public function verificarClienteCNPJ()
    {
        $this->clienteCNPJService = new ClienteCNPJService();
        $this->clienteCNPJService->verificarClientePorCNPJ($_POST);
    }
    public function salvarFichaCNPJ()
    {
        $this->clienteCNPJService = new ClienteCNPJService();
        $this->clienteCNPJService->salvarFichaClienteCNPJ($_POST);
    }
    public function editarFichaCNPJ()
    {
        $this->clienteCNPJService = new ClienteCNPJService();
        $this->clienteCNPJService->callBackEditarFichaPJID($_GET['data']);
    }
    public function editarPropostaCNPJ()
    {
        //var_dump($_POST);exit;
        //echo $_GET['data'];*/
        $this->clienteCNPJService = new ClienteCNPJService();
        $this->clienteCNPJService->editarFichaClienteCNPJ($_POST, $_POST['idProposta']);
    }
    public function movimentarFichaCNPJ()
    {
        $this->clienteCNPJService = new ClienteCNPJService();
        $this->clienteCNPJService->callBackMovimentarFichaPJID($_GET['data']);
    }
    /**
     * CHAMADA - TELA - MODULOS DE PROPOSTA - PF
     */
    public function verificarClientePF()
    {
        $dados["view"] = "System/Proposta/Cliente/verificarClientePF";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function gerarPropostaPessoaFisica()
    {
        $dados["view"] = "System/Proposta/PF/gerarPropostaPF";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function listarPropostaPF()
    {
        $dados["view"] = "System/Proposta/PF/listarPropostaPF";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function movimentarFichaCPF()
    {
        $this->clienteCPFService = new ClienteCPFService();
        $this->clienteCPFService->callBackMovimentarFichaPFID($_GET['data']);
    }
    /**
     * CHAMADA - METODOS -  MODULOS DE PROPOSTA - PF
     */
    public function verificarClienteCPF()
    {
        $this->clienteCPFService = new ClienteCPFService();
        $this->clienteCPFService->verificarClientePorCPF($_POST);
    }
    public function salvarFichaCPF()
    {
        $this->clienteCPFService = new ClienteCPFService();
        $this->clienteCPFService->salvarFichaClienteCPF($_POST);
    }
    public function editarFichaPFTela()
    {
        $dados["view"] = "System/Proposta/PF/editarPropostaPF";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function editarPropostaCPF()
    {
        //debug($_POST);exit;
        //echo $_GET['data'];*/
        $this->clienteCPFService = new ClienteCPFService();
        $this->clienteCPFService->editarFichaClienteCPF($_POST, $_POST['idProposta']);
    }
    /**CHAMADA TELA - MODULO - BANCO */
    public function cadastroBanco()
    {
        $dados["view"] = "System/banco/cadastroBanco";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function listarBanco()
    {
        $dados["view"] = "System/banco/listarBanco";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function exibirLogoBanco()
    {
        $dados["view"] = "System/banco/exibirLogoBanco";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function editarBanco()
    {
        $dados["view"] = "System/banco/editarBanco";
        $this->load(TEMPLATE_SISTEMA, $dados);
    }
    public function registrarNovoBanco()
    {
        $this->bancoService = new BancoService();
        $this->bancoService->salvarNovoBanco($_POST, $_FILES['logo_banco_administradora']);
    }
    public function editarBancoAdministradora()
    {
        $this->bancoService = new BancoService();
        $this->bancoService->editarBanco($_POST, $_FILES['logo_banco_administradora']);
    }
    /**MÓDULO DEBUG DO SISTEMA */
    public function salvarFichaCNPJDebug()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;
    }
}
