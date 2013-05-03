$(document).on('ready', iniciar());

	function iniciar(){

		$("#btn_add_horario").on('click', function(){
			adicionarHTML();
		});

		$("#btn_grabar_turno").on('click', function(){
			
			var flag = generarHorarios();//Callback

			if(flag){				
				$("#turno-form").submit();
			}
			else{
				alert("Existen errores en los horarios :(");
			}
				
		});

		$("#btn_grabar_actividad").on('click', function(){
			
			var flag = generarHorarios();//Callback

			if(flag){				
				$("#actividad-form").submit();
			}
			else{
				alert("Existen errores en los horarios :(");
			}
				
		});
	}

	/**
	* @summary: Funcion que genera todos los horarios entre dos horas establecidas. La duracion de cada segmento es de 1 hora.
	* @return {[boolean]} [Valor que determina si se debe o no enviar el formulario']
	*/
	function generarHorarios(){
		var horarios = new Array();
			
		var flag = true;
		var min, max;

		var dias            = $("select[name='Horario[dia]']");
		var horas_iniciales = $("input[name='Horario[hora_inicio]']");
		var horas_finales   = $("input[name='Horario[hora_fin]']");
				
		for(i = 0; i < dias.length; i++){

			if(dias[i].value != '' && horas_iniciales[i].value != '' && horas_finales[i].value != ''){
					
				min = parseInt(horas_iniciales[i].value.split(":", 1));	
				max = parseInt(horas_finales[i].value.split(":", 1));					

				/*Ambas horas no deben ser iguales ni la hora inicial debe ser mayor a la hora final*/
				if(min == max || min > max){
					flag = false;
				}

				for(j = min; j < max; j++){

					var obj = {};
					obj['dia']        = dias[i].value;
					obj['hora_inicio']= j+":00:00";
					obj['hora_fin']   = (j + 1)+":00:00";		

					horarios.push(obj);	
				}
			}
			else{
				flag = false;
				break;
			}				
		}
			
		$("#datos_horarios").attr('value', JSON.stringify(horarios));
		return flag;
	}

	/**
	 * @summary: Metodo que permite adicionar dinamicamente elementos html al DOM. Util al momento de agregar horarios a un turno.
	 * 
	 */
	function adicionarHTML(){
		/*Numero aleatorio que me permitira individualizar la eliminacion de elemento type que contienen las horas.*/
			var id = parseInt(Math.random()*10000);

			var html = '<div class="row-fluid" id="'+id+'">\
				            <div class="span12">\
				                <div class="row-fluid">\
				                    <div class="span4">\
				                        <label for="Horario_nombre" class="required">Dia <span class="required">*</span></label>\
										<select name="Horario[dia]">\
											<option value="lunes">Lunes</option>\
											<option value="martes">Martes</option>\
											<option value="miercoles">Miercoles</option>\
											<option value="jueves">Jueves</option>\
											<option value="viernes">Viernes</option>\
											<option value="sabado">Sabado</option>\
										</select>\
										<span class="help-block error" style="display: none"></span>\
				                    </div>\
				                    \
				                    <div class="span3">\
				                    	<label for="Horario_hora_inicial" class="required">Hora inicial <span class="required">*</span></label>\
										<input type="text" name="Horario[hora_inicio]" class="span10" />\
										<span class="help-block error" style="display: none"></span>\
				                    </div>\
									\
				                    <div class="span3">\
				                       	<label for="Horario_hora_final" class="required">Hora final <span class="required">*</span></label>\
										<input type="text" name="Horario[hora_fin]" class="span10" />\
										<span class="help-block error" style="display: none"></span>\
				                    </div>\
									\
				                    <div class="span2">\
				                    	<label for="btn_del">:\'(</label>\
				                    	<button class="btn btn-primary btn-mini" name="remove" type="button" onclick="eliminarHTML('+id+')">-</button>\
				                    </div>\
				                </div>\
				            </div>\
			        	</div>';

			$("#cont_horarios").append(html);

			//Adicionamos el componente js que permite ingresar la hora
			/*$(".horas_"+id).timepicker({
				'showMinute': false,
				'language': 'es',	
				'timeFormat': "h:mm:ss tt"	
			});*/

			/*Adicionamos el timepicker a cada elemento 'hora_inicio', 'hora_fin' creados dinamicamente.
			$("input[name='Horario[hora_inicio]']").each(function(index, element){
				$(this).timepicker({
					'showMinute': false,
					'language': 'es',	
					'timeFormat': "hh:mm:ss tt"			
				});
			});*/
	}

	/**
	 * @summary: Metodo que elimina un elemento del DOM dado su id
	 * @param  {[sting]} id [Identificador unico del elemento html]
	 * 
	 */
	function eliminarHTML(id){
		$("div#"+id).remove();
	}