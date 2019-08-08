$(document).on("ready",main);

function main(){
	$("#login").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(resp){
				if(resp==="error"){
					alert("Los datos no existen");
				}
				else{
					window.location.href = "http://localhost/empresa/empleados";
				}
			}
		});
	});

	$("#cerrar").on("click",function(event){
		event.preventDefault();
		$.ajax({
			url:"http://localhost/empresa/login/cerrar",
			type:"POST", 
			data:{},
			success:function(){
				window.location.href = "http://localhost/empresa";
			}
		});
	});
}