<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idActividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idActividad),array('view','id'=>$data->idActividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar')); ?>:</b>
	<?php echo CHtml::encode($data->lugar); ?>
	<br />


</div>