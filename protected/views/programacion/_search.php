<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idProgramacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Horario_idHorario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Actividad_idActividad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Instructor_idInstructor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Calendario_idCalendario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Incidencia_idIncidencia',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
