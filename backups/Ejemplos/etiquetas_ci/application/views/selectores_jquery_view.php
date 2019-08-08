<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/960.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset.css" media="screen" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <title><?=$titulo?></title> 
        <script type="text/javascript">
        	$(document).ready(function(){
        		$("#nuevo").find("#add_selector:last").live('click',function(){	
        			if($(this).prevAll("#nombre").val() == '')	
        			{
        				alert('No puedes dejar un campo vacío');
        			}
        			else if($(this).prevAll("#puntos").val() == '')
        			{
        				alert('Debes dar una puntuacion');
        			}else{
        				$("#nuevo").append('<div style="margin:10px 0px 0px -10px; border:0"'+
        				'<div id="nuevo" class="grid_12">'+
						'<input type="text" id="nombre" name="nombre[]" />&nbsp;'+
						'<select name="puntos[]" id="puntos">'+	
						'<option value="">Escoge una puntuación</option><option value="1">1 punto</option>'+
						'<option value="2">2 puntos</option><option value="3">3 puntos</option>'+
						'<option value="4">4 puntos</option></select>'+
						'<span class="grid_2" id="add_selector">Añadir etiqueta</span></div><div class="grid_2"'+
	        			'id="eliminar">Eliminar</div>');
        			}      			
        		})
        		$('#nuevo').find("#eliminar").live('click',function(){
        			$(this).prevAll().eq(0).css('background','yellow');
        			valor_input = $(this).prevAll().eq(0).find('input').val();
        			valor_select = $(this).prevAll().eq(0).find('select').val();
        			if(confirm('¿Quieres eliminar la etiqueta con nombre '+valor_input+' y puntuación '+valor_select+'?' ))
        			{
        				$(this).prev("#nuevo").remove();
        				$(this).remove();
        			}else{
        				alert('No se hicieron cambios');
        				$(this).prevAll().eq(0).css('background','#2792bd');
        			}   			
        		})
        	});
        </script>   
        <style type="text/css">
        	#nuevo{
        		border: 3px solid #fff;
        		background: #2792bd;
        		color: #fff;
        		font-size: 12px;
        		padding: 9px 10px;
        		border: 8px solid #e4e8ee;
        	}
        	#add_selector{
        		font-size: 14px;
        		margin-top: 1px;
        		padding: 1px 5px;
        		border-radius: 4px;
        		background: #111;
        		text-align: center;
        		cursor: pointer;
        	}
        	#eliminar{
        		font-size: 14px;
        		margin: -34px 0px 0px 650px;
        		padding: 1px 5px;
        		border-radius: 4px;
        		background: #111;
        		text-align: center;
        		cursor: pointer;
        	}
        	#boton{
        		text-align: center;
        		background: #fff;
        		color: #111;
        		cursor: pointer;
        		font-weight: bold;
        		padding: 7px 10px;
        	}
        </style>   
    </head>
	    <body style="background-color: #111; color:#fff">
			<div class="container_12"> 
				<h1 style="text-align: center">Pruebas jquery</h1>
				<?php $atributos = array('name' => 'formulario', 'id' => 'formulario'); ?>
				<?=form_open(base_url().'selectores_jquery/array_selectores',$atributos)?>	
					<div id="nuevo" class="grid_12">
						<input type="text" value="" id="nombre" name="nombre[]" />
						<select name="puntos[]" id="puntos">	
								<option value="">Escoge una puntuación</option>
								<option value="1">1 punto</option>
								<option value="2">2 puntos</option>
								<option value="3">3 puntos</option>
								<option value="4">4 puntos</option>
						</select>
						<span class="grid_2" id="add_selector">Añadir etiqueta</span>	
					</div><br />
					<div class="grid_4" id="boton" onclick="document.forms.formulario.submit()">
						Enviar datos
					</div>						
				<?=form_close()?>			
			</div>
    </body>
</html>
    	
   