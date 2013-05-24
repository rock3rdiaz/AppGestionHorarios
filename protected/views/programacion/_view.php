<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProgramacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idProgramacion),array('view','id'=>$data->idProgramacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Horario_idHorario')); ?>:</b>
	<?php echo CHtml::encode($data->Horario_idHorario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Actividad_idActividad')); ?>:</b>
	<?php echo CHtml::encode($data->Actividad_idActividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Instructor_idInstructor')); ?>:</b>
	<?php echo CHtml::encode($data->Instructor_idInstructor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Calendario_idCalendario')); ?>:</b>
	<?php echo CHtml::encode($data->Calendario_idCalendario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Incidencia_idIncidencia')); ?>:</b>
	<?php echo CHtml::encode($data->Incidencia_idIncidencia); ?>
	<br />


</div>