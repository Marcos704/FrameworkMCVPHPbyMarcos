<?php
@session_start();
use app\core\validacao\Valitation;
$valitation = new Valitation();
//debug($_SESSION);
?>
<!-- OPÇÕES DISPONIVEIS PARA O SUPORTE TÉCNICO -->
<?php if($valitation->SECURITY_BLOCK_SYSTEM("vmDashboard",$_SESSION['cpf_usuario'])){?>
<li class="nav-item">
    <a href="
    <?php 
        switch ($_SESSION['tipo_usuario']) {
            case "Suporte":
                echo URL_BASE . DASHBOAR_SUPORTE;
                break;
            case "Administrador":
                echo URL_BASE . DASHBOAR_FUNCIONARIO;
                break;
            case "Funcionario":
                echo URL_BASE . DASHBOAR_FUNCIONARIO;
                break;
        }
    ?>" class="nav-link">
        <i class="fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<?php }?>
<?php if($valitation->SECURITY_BLOCK_SYSTEM("vmUsuario",$_SESSION['cpf_usuario'])){?>
<!-- Módulo de Usuário-->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fas fa-user"></i>
        <p>Centrar do Usuário</p>
    </a>
    <ul class="nav nav-treeview">
        <?php if($valitation->SECURITY_BLOCK_SYSTEM("mCadUsuario",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/cadastrar_verificar" ?>" class="nav-link">
                <p>Cadastro de Usuários</p>
            </a>
        </li>
        <?php }else{echo '';}

        if($valitation->SECURITY_BLOCK_SYSTEM("mListUsuario",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/visualizarDadosUsuario" ?>" class="nav-link">
                <p>Visualizar Dados</p>
            </a>
        </li>
        <?php }else{echo '';}
        
        if($valitation->SECURITY_BLOCK_SYSTEM("mCadPermissao",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/cadastrar_verificar" ?>?cadPermissao=true" class="nav-link">
                <p>Permissões</p>
            </a>
        </li>
        <?php }else{echo '';}?>
    </ul>
</li>
<?php }?>
<?php if($valitation->SECURITY_BLOCK_SYSTEM("vmProposta",$_SESSION['cpf_usuario'])){?>
<!-- Módulo de Proposta-->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fas fa-file-signature"></i>
        <p>Propostas</p>
    </a>
    <ul class="nav nav-treeview">
        <?php if($valitation->SECURITY_BLOCK_SYSTEM("mListPropostaPF",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/listarPropostaPF" ?>" class="nav-link">
                <p>Listar PropostasPF</p>
            </a>
        </li>
        <?php }else{echo'';} if($valitation->SECURITY_BLOCK_SYSTEM("mListPropostaPJ",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/listarPropostaPJ" ?>" class="nav-link">
                <p>Listar PropostasPJ</p>
            </a>
        </li>
        <?php }else{echo'';} if($valitation->SECURITY_BLOCK_SYSTEM("mCadPropostaPF",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/verificarClientePF" ?>" class="nav-link">
                <p>Criar Proposta Pessoa Fisica</p>
            </a>
        </li>
        <?php }else{echo'';} if($valitation->SECURITY_BLOCK_SYSTEM("mCadPropostaPJ",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/verificarClientePJ" ?>" class="nav-link">
                <p>Criar Proposta Pessoa Juridica</p>
            </a>
        </li>
        <?php }else{echo'';} ?>
    </ul>
</li>
<?php }?>
<!-- Módulo de Banco-->
<?php if($valitation->SECURITY_BLOCK_SYSTEM("vmBanco",$_SESSION['cpf_usuario'])){?>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-building-columns"></i>
        <p>Bancos e Administradoras</p>
    </a>
    <ul class="nav nav-treeview">
        <?php if($valitation->SECURITY_BLOCK_SYSTEM("mCadBanco",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/cadastroBanco" ?>" class="nav-link">
                <p>Cadastrar Banco e Administradoras</p>
            </a>
        </li>
        <?php }else{echo '';} if($valitation->SECURITY_BLOCK_SYSTEM("mListBanco",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/listarBanco" ?>" class="nav-link">
                <p>Listar Bancos e Administradoras</p>
            </a>
        </li>
        <?php }else{echo '';} ?>
    </ul>
</li>
<?php } ?>
<!-- Módulo de Configurações do sistema-->
<?php if($valitation->SECURITY_BLOCK_SYSTEM("vmConfiguracoes",$_SESSION['cpf_usuario'])){?>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-sliders"></i>
        <p>Configurações</p>
    </a>
    <ul class="nav nav-treeview">
        <?php if($valitation->SECURITY_BLOCK_SYSTEM("mAdministradora",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/cadastroAdministradora" ?>" class="nav-link">
                <p>Informações Básicas da Administradora</p>
            </a>
        </li>
        <?php }else{echo '';} if($valitation->SECURITY_BLOCK_SYSTEM("mConfSistema",$_SESSION['cpf_usuario'])){?>
        <li class="nav-item">
            <a href="<?php echo URL_BASE . "System/configuracoesSistema" ?>" class="nav-link">
                <p>Configurações do sistema</p>
            </a>
        </li>
        <?php }else{echo '';} ?>
    </ul>
</li>
<?php }else{echo '<span class="text-danger"><strong>';} ?>
<!-- Botao de longOut-->
<li class="nav-item">
    <a href="#" class="nav-link" data-toggle="modal" data-target="#modalLongOut">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p>Sair</p>
    </a>
</li>