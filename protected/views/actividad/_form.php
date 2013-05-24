<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'actividad-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<fieldset>
		<legend>Datos de la actividad</legend>
		<div class="well">
			<div class="row-fluid">
				<div class="span12">
					<div class="row-fluid">
						<div class="span4">
							<?php echo $form->dropDownListRow($model,'tipo', 
								array('clase_grupal'=>'Clase grupal', 'servicio_empresarial'=>'Servicio empresarial')); ?>		
						</div>
			
						<div class="span4">
							<?php echo $form->textFieldRow($model,'descripcion',array('maxlength'=>45)); ?>		
						</div>
			
						<div class="span4">
							<?php echo $form->textFieldRow($model,'lugar',array('maxlength'=>45)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Horarios</legend>
		<div class="well">
			<div id="cont_horarios">
				<?php
				if(!isset($horarios)){

					echo '<div class="row-fluid">
				            <div class="span12">
				                <div class="row-fluid">
				                    <div class="span4">
				                        <label for="Horario_nombre" class="required">Dia <span class="required">*</span></label>
										<select name="Horario[dia]">
											<option value="lunes">Lunes</option>
											<option value="martes">Martes</option>
											<option value="miercoles">Miercoles</option>
											<option value="jueves">Jueves</option>
											<option value="viernes">Viernes</option>
											<option value="sabado">Sabado</option>								
										</select>
										<span class="help-block error" style="display: none"></span>
				                    </div>

				                    <div class="span3">
				                    	<label for="Horario_hora_inicial" class="required">Hora inicial <span class="required">*</span></label>
										<input type="text" name="Horario[hora_inicio]" class="span10" />
										<span class="help-block error" style="display: none"></span>
				                    </div>

				                    <div class="span3">
				                       	<label for="Horario_hora_final" class="required">Hora final <span class="required">*</span></label>
										<input type="text" name="Horario[hora_fin]" class="span10" />
										<span class="help-block error" style="display: none"></span>
				                    </div>
				                </div>
				            </div>
			        	</div>';									
				}
			
				else{
					foreach($horarios as $horario){
						$id = rand(1, 10000);
						echo '<div class="row-fluid" id="'.$id.'">
				            <div class="span12">
				                <div class="row-fluid">
				                    <div class="span4">
				                        <label for="Horario_nombre" class="required">Dia <span class="required">*</span></label>
										<select name="Horario[dia]">
											<option value="lunes"'.(($horario["dia"] == "lunes") ? "selected" : "").'>Lunes</option>
											<option value="martes"'.(($horario["dia"] == "martes") ? "selected" : "").'>Martes</option>
											<option value="miercoles"'.(($horario["dia"] == "miercoles") ? "selected" : "").'>Miercoles</option>
											<option value="jueves"'.(($horario["dia"] == "jueves") ? "selected" : "").'>Jueves</option>
											<option value="viernes"'.(($horario["dia"] == "viernes") ? "selected" : "").'>Viernes</option>
											<option value="sabado"'.(($horario["dia"] == "sabado") ? "selected" : "").'>Sabado</option>								
										</select>
										<span class="help-block error" style="display: none"></span>
				                    </div>

				                    <div class="span3">
				                    	<label for="Horario_hora_inicial" class="required">Hora inicial <span class="required">*</span></label>
										<input type="text" name="Horario[hora_inicio]" value="'.$horario["hora_inicio"].'" class="span10"/>
										<span class="help-block error" style="display: none"></span>
				                    </div>
									
				                    <div class="span3">
				                       	<label for="Horario_hora_final" class="required">Hora final <span class="required">*</span></label>
											<input type="text" name="Horario[hora_fin]" value="'.$horario["hora_fin"].'" class="span10"/>
										<span class="help-block error" style="display: none"></span>
				                    </div>
									
				                    <div class="span2">
				                    	<label for="btn_del">:\'(</label>
				                    	<button class="btn btn-primary btn-mini" name="remove" type="button" onclick="eliminarHTML('.$id.')">-</button>
				                    </div>
				                </div>
				            </div>
			        	</div>';
					}
				}
				?>
			</div>
        	<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'button',
				'type'=>'primary',
				'label'=>'Agregar horario',
				'htmlOptions'=>array('id'=>'btn_add_horario')
			)); ?>
			<input id="datos_horarios" name="datos_horarios" hidden></input>
		</div>	
	</fieldset>	
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
			'htmlOptions'=>array('id'=>'btn_grabar_actividad'),
			'label'=>$model->isNewRecord ? 'Guardar datos' : 'Actualizar datos',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

