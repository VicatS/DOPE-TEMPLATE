<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Proyecto Empresa</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<style type="text/css">
		body {
		  padding-top: 60px;
		  
		}
		.contenido{
			padding: 10px;
		}
	</style>
</head>
<body>


	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= base_url('empleados')?>">Empleados</a></li>
          	<li><a href="<?= base_url('usuarios')?>">Usuarios</a></li>
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('name')?><b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a></li>
                  <li><a href="javascript:void(0)" id="cerrar"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a></li>
                </ul>
              </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
    <div class="container">
		
		<section class="contenido">
			<div class="row">

				<ul class="nav nav-tabs">
			        <li class="active"><a href="#tab1" data-toggle="tab">Registrar</a></li>
			        <li><a id="tab-consultar" href="#tab2" data-toggle="tab">Consultar</a></li>
			    </ul>
			   
			    <div class="tab-content">
			        <div class="tab-pane  active" id="tab1">
			        	<div class="col-lg-4"></div>
			            <div class="col-lg-4 text-center">
			            	<h2>Registro de Empleado</h2>
							<form id="form-create-empleado" class="form-horizontal" role="form" action="<?php base_url();?>empleados/guardar" method="POST">
		            			<div class="form-group">
		            				<input type="text" name="nombres" class="form-control" placeholder="Ingrese su Nombres"/>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus Apellidos  "/>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="dni" class="form-control" placeholder="Ingrese su DNI"/>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="telefono" class="form-control" placeholder="Ingrese su Telefono"/>
		            			</div>
		            			<div class="form-group">
		            				<input type="email" name="email" class="form-control" placeholder="Ingrese su Email"/>
		            			</div>
		            			<div class="form-group">
				            		<button type="submit" class="btn btn-primary btn-block" value="Registrar">Registrar</button>
			      				</div>
		            		</form>
		            	</div>
			        </div>

			        <div class="tab-pane fade" id="tab2">

			            <div class="row">
			            	<br>
			            	<div class="col-lg-7"></div>
			            	<div class="col-lg-3">
			            		<input type="text" class="form-control" id="buscar" placeholder="Buscar">
			            	</div>
			            	<div class="col-lg-2">
			            		<input type="button" class="btn btn-primary btn-block" id="btnbuscar" value="Mostrar Todo" data-toggle='modal' data-target='#basicModal'>
			            	</div>
			            </div>
			            <hr>
			            <div class="row">
			            	<div id="listaEmpleados" class="col-lg-8">
			            		
			            	</div>
			            	<div class="col-lg-4">
			            		<div class="panel panel-default">
 									<div class="panel-heading">Editar Empleado</div>
								  	<div class="panel-body">
								  		<form id="form-actualizar" class="form-horizontal" action="<?php echo base_url();?>empleados/actualizar" method="post" role="form" style="padding:0 10px;">
								  			<div class="form-group">
								  				<label>Nombres:</label>
								  				<input type="hidden" id="idsele" name="idsele" value="">
								  				<input type="text" name="nombressele" id="nombressele" class="form-control">
								  			</div>
								  			<div class="form-group">
								  				<label>Apellidos:</label>
								  				<input type="text" name="apellidossele" id="apellidossele" class="form-control">
								  			</div>
								  			<div class="form-group">
								  				<label>DNI:</label>
								  				<input type="text" name="dnisele" id="dnisele" class="form-control">
								  			</div>
								  			<div class="form-group">
								  				<label>Telefono:</label>
								  				<input type="text" name="telefonosele" id="telefonosele" class="form-control">
								  			</div>
								  			<div class="form-group">
								  				<label>Email:</label>
								  				<input type="email" name="emailsele" id="emailsele" class="form-control">
								  			</div>
								  			<div class="form-group">
								  				<button type="button" id="btnactualizar" class="btn btn-success btn-block">Guardar</button>

								  			</div>
								  		</form>
								    
								  	</div>
								</div>
			            		
			            	</div>

			            </div>

			        </div>

			    </div>
				

			</div>

		</section>


    </div>

 
<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/empleado.js"></script>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
</body>
</html>
</body>
</html>