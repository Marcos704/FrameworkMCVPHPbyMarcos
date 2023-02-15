<?php
@session_start();

use app\services\BancoService;

$bancoService = new BancoService();
$Logo = $bancoService->obterLogoBancoCNPJ($_GET['data']);
// Variaveis para lógica de tipo Bem
?>
<div class="container p-0">
<?php add("headerCards");?>
	<div class="card">
		<div class="card-body p-5">
			<div class="row">
				<div class="col-12 text-center">
					<h1 class="title">Logo Cadastrada</h1>
          <hr>
				</div>
			</div>
			<div class="container pl-5 pr-5">
				<form method="POST" id="cadastrar_banco_administradora">
					<div class="box-form-control" id="infor_cad_prod">
						<div class="form-row">
							<div class="col-lg-12 text-center">
								<div class="row">
									<div class="col-12">
										<img class="img-fluid" width="150px" height="150px" src="data:image/png;base64,<?php echo $Logo?>">
									</div>
								</div>
							</div>
              <hr>
							<br>
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-8 col-sm-12 text-center p-2">
										<a class="btn btn-custom-primary" href="<?php echo URL_BASE . "System/listarBanco" ?>">Voltar</a>
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