<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'programacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<fieldset>
		<legend>Fecha de vigencia</legend>
		<div class="well">
			<div class="row-fluid">
				<div class="span12">
					<div class="row-fluid">
						<div class="span6">
							<label for="vigencia_fecha_inicio" style="display:inline-block">Fecha de inicio</label>
							<?php echo CHtml::textField('vigencia_fecha_inicio', Calendario::model()->findByAttributes(array('estado'=>'activo'))->fecha_inicial, array('disabled'=>'true'))?>
						</div>
			
						<div class="span6">
							<label for="vigencia_fecha_fin" style="display:inline-block">Fecha de finalizaci&oacute;n</label>
							<?php echo CHtml::textField('vigencia_fecha_fin', Calendario::model()->findByAttributes(array('estado'=>'activo'))->fecha_final, array('disabled'=>'true'))?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Datos de la programaci&oacute;n</legend>
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span12">
						<?php 
							$instructores = CHtml::listData(Instructor::model()->findAll(array('order'=>'nombre asc')), 'idInstructor', 'nombre');								
							echo $form->dropDownListRow($model, 'Instructor_idInstructor', $instructores);
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span12">							
						<label>Turno</label>
						<?php 
							$turnos = CHtml::listData(Turno::model()->findAll(array('order'=>'nombre asc')), 'idTurno', 'nombre');	
							echo CHtml::dropDownList('Turnos[id]', '', $turnos, array('empty'=>'-- Seleccione un turno --', 'class'=>'span6'));
						?>
					</div>	
				</div>
			</div>
		</div>	
	</fieldset>

	<div id="prueba"></div>















<?php /*
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Horario_idHorario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Actividad_idActividad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Instructor_idInstructor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Calendario_idCalendario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Incidencia_idIncidencia',array('class'=>'span5')); */?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
