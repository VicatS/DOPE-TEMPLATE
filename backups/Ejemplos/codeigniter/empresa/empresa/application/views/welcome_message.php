<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto Empresa</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<style type="text/css">
		body {
		  background-color: #0B4C5F;
		  
		}
		.contenido{
			padding: 10px;
		}
		.login{
			border: 1px solid #FF8000;
			
			width: 400px;
			color:white;
			font-weight: bolder;
			top: 50%;
			left: 50%;
			position: absolute;
			margin-top: -200px;
			margin-left: -200px; 
		}
		.login-title{
			padding: 10px;
			text-align: center;
			background-color: #FF8000;
		}
		form{
			padding: 10px 20px;
			background: #A4A4A4;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="login">
			<div class="login-title">
				<p>AUTENTICACION DE USUARIO</p>
			</div>
			<form id="login" action="<?= base_url('login/ingresar')?>" class="form-horizontal" method="POST">
				<div class="form-group">
					<div class="col-md-12">
						<label for="email" class="control-label">Email:</label>
						<input id="email" name="email" type="email" class="form-control" placeholder="Ingrese su email">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label for="password" class="control-label">Contraseña:</label>
						<input id="password" name="password" type="password" class="form-control" placeholder="Ingrese Contraseña">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary" value="Acceder">
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?= base_url('assets/js/jquery-1.11.3.min.js')?>"></script>
	<script src="<?= base_url('assets/js/login.js')?>"></script>
</body>
</html>