<?php
$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	$model->idActividad,
);

$this->menu=array(
	array('label'=>'List Actividad','url'=>array('index')),
	array('label'=>'Create Actividad','url'=>array('create')),
	array('label'=>'Update Actividad','url'=>array('update','id'=>$model->idActividad)),
	array('label'=>'Delete Actividad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idActividad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Actividad','url'=>array('admin')),
);
?>

<h1>View Actividad #<?php echo $model->idActividad; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idActividad',
		'tipo',
		'descripcion',
		'lugar',
	),
)); ?>
