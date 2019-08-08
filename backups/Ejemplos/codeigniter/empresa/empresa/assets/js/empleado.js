$(document).on("ready",inicio);

function inicio(){
	mostrarDatos("");
	$("#buscar").keyup(function(){
		buscar = $("#buscar").val();
		mostrarDatos(buscar);
	});
	$("#btnbuscar").click(function(){
		mostrarDatos("");
		$("#buscar").val("");
	});
	$("#btnactualizar").click(actualizar);
	$("#form-create-empleado").submit(function (event){

		event.preventDefault();

		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:$("form").serialize(),
			success:function(respuesta){
				alert(respuesta);
				mostrarDatos("");
			}
		});
	});
	$("body").on("click","#listaEmpleados a",function(event){
		event.preventDefault();
		idsele = $(this).attr("href");
		nombressele = $(this).parent().parent().children("td:eq(1)").text();
		apellidossele = $(this).parent().parent().children("td:eq(2)").text();
		dnisele = $(this).parent().parent().children("td:eq(3)").text();
		telefonosele = $(this).parent().parent().children("td:eq(4)").text();
		emailsele = $(this).parent().parent().children("td:eq(5)").text();

		$("#idsele").val(idsele);
		$("#nombressele").val(nombressele);
		$("#apellidossele").val(apellidossele);
		$("#dnisele").val(dnisele);
		$("#telefonosele").val(telefonosele);
		$("#emailsele").val(emailsele);
	});
	$("body").on("click","#listaEmpleados button",function(event){
		idsele = $(this).attr("value");
		eliminar(idsele);
	});
}

function mostrarDatos(valor){
	$.ajax({
		url:"http://localhost/empresa/empleados/mostrar",
		type:"POST",
		data:{buscar:valor},
		success:function(respuesta){
			//alert(respuesta);
			var registros = eval(respuesta);
			
			html ="<table class='table table-responsive table-bordered'><thead>";
 			html +="<tr><th>#</th><th>Nombres</th><th>Apellidos</th><th>DNI</th><th>Telefono</th><th>Email</th><th>Usuario</th><th>Accion</th></tr>";
			html +="</thead><tbody>";
			for (var i = 0; i < registros.length; i++) {
				html +="<tr><td>"+registros[i]["id_empleado"]+"</td><td>"+registros[i]["nombres_empleado"]+"</td><td>"+registros[i]["apellidos_empleado"]+"</td><td>"+registros[i]["dni_empleado"]+"</td><td>"+registros[i]["telefono_empleado"]+"</td><td>"+registros[i]["email_empleado"]+"</td><td>"+registros[i]["nombres"]+"</td><td><a href='"+registros[i]["id_empleado"]+"' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>E</a> <button class='btn btn-danger' type='button' value='"+registros[i]["id_empleado"]+"'>X</button></td></tr>";
			};
			html +="</tbody></table>";
			$("#listaEmpleados").html(html);
		}
	});
}

function actualizar(){
	$.ajax({
		url:"http://localhost/empresa/empleados/actualizar",
		type:"POST",
		data:$("#form-actualizar").serialize(),
		success:function(respuesta){
			alert(respuesta);
			mostrarDatos("");
		}
	});
}

function eliminar(idsele){
	$.ajax({
		url:"http://localhost/empresa/empleados/eliminar",
		type:"POST",
		data:{id:idsele},
		success:function(respuesta){
			alert(respuesta);
			mostrarDatos("");
		}
	});
}

