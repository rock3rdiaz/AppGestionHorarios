<?php
$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	$model->idTurno,
);

$this->menu=array(
	array('label'=>'List Turno','url'=>array('index')),
	array('label'=>'Create Turno','url'=>array('create')),
	array('label'=>'Update Turno','url'=>array('update','id'=>$model->idTurno)),
	array('label'=>'Delete Turno','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idTurno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Turno','url'=>array('admin')),
);
?>

<h1>View Turno #<?php echo $model->idTurno; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idTurno',
		'nombre',
		'total_horas',		
	),
)); ?>
