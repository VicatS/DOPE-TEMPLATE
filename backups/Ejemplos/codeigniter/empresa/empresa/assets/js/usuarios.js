$(document).on("ready", main);

function main(){
	$("#msg-error").hide();
	$("#form-create-usuario").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:$(this).attr('action'),
			type:$(this).attr('method'),
			data:$(this).serialize(),
			success:function(resp){
				if (resp==="Exito") {
					alert(resp);
					$("#msg-error").hide();
					$("#form-create-usuario")[0].reset();
				}else if(resp==="Error"){
					alert(resp);
				}
				else{
					$(".list-errors").html(resp);
					$("#msg-error").show();
				}
			}

		});

	});
}