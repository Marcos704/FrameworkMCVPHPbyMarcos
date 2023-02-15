<?php
@session_start();

use app\services\BancoService;
use app\functions\Util;
use app\core\validacao\Valitation;

$responser = new Util();
$validacao = new Valitation();

if (!$validacao->SECURITY_BLOCK_SYSTEM("mEditBanco", $_SESSION['cpf_usuario'])) {
  $d = $responser->msg('erro', 'Nível de Permissão requerida!<br>P: Editar | M: Banco | S: False');
}
$model = new BancoService();
$data = $model->obterDadosBancoId();

?>
<div class="container p-0" style="<?php echo $d;?>">
	<div class="card">
		<?php add("headerCards");?>
		<div class="card-body p-5">
			<div class="row">
				<div class="col-12 text-center">
					<h1 class="title">Editar Banco<br>Administradora</h1>
					<div id="alert-form"></div>
				</div>
			</div>
			<div class="container pl-5 pr-5">
				<form method="POST" id="editar_banco_administradora">
					<div class="box-form-control" id="infor_cad_prod">
						<div class="form-row">
							<div class="col-3 col-md-3 col-sm-12"></div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="form-row">
									<div class="form-group col-12">
										<input type="text" class="form-control form-control-user text-center" id="cnpj_banco" name="cnpj_banco_administradora" placeholder="CNPJ" value="<?php echo $data[0]->cnpj_banco_administradora; ?>" disabled>
										<input type="hidden" class="form-control form-control-user text-center" id="cnpj_banco" name="cnpj_banco_administradora" placeholder="CNPJ" value="<?php echo $data[0]->cnpj_banco_administradora; ?>" required>
									</div>
									<div class="form-group col-12">
										<input type="text" class="form-control form-control-user text-center" id="nome_banco" name="nome_banco_administradora" placeholder="Nome do banco" value="<?php echo $data[0]->nome_banco_administradora; ?>" required>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 text-center">
								<div class="row">
									<div class="col-12 ocultar-componente" id="componente-img">
										<img id="img-result" alt="Selecione uma imagem" class="img-fluid" width="150px" height="150px" src="<?php echo URL_BASE ?>assets/templates/img/Logo.svg">
									</div>
									<div class="col-12" id="componente-input-file">
										<label class="input-custom-arquivo" for="logo_banco_administradora">
											<i class="fas fa-plus fa-2x"></i>
										</label>
									</div>
								</div>
								<small>Upload da nova logo</small>
								<input type="file" name="logo_banco_administradora" id="logo_banco_administradora">
							</div>
							<br>
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-8 col-sm-12 text-center p-2">
										<button class="btn btn-custom-primary" type="submit">Salvar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/banco/dinamicsBanco.js"></script>
<script type="text/javascript" src="<?php echo URL_BASE ?>assets/js_master/banco/editarBanco.js"></script>