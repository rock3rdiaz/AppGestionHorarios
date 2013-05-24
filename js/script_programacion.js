$(function(){
	$("#Turnos_id").on('change', refreshHorarios);
});


var refreshHorarios = function(){
	$.ajax({
			url: "http://localhost/AppGestionHorarios/index.php?r=programacion/ajaxActualizarHorarios",
			//url: "http://192.168.0.231/AppGestionHorarios/index.php?r=programacion/ajaxActualizarHorraios",

			dataType: "html",

			type: "post",

			data: "id_turno="+this.value,

			success: function(datos){
				$("#prueba").html(datos);
			},

			error: function(datos){
				alert("Error en la peticion! "+datos.responseText);
			}
		});
	//console.info(this);
}