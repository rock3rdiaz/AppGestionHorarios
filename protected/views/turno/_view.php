<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTurno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTurno),array('view','id'=>$data->idTurno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_horas')); ?>:</b>
	<?php echo CHtml::encode($data->total_horas); ?>
	<br />
</div>