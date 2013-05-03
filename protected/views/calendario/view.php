<?php
$this->breadcrumbs=array(
	'Calendarios'=>array('index'),
	$model->idCalendario,
);

$this->menu=array(
	array('label'=>'List Calendario','url'=>array('index')),
	array('label'=>'Create Calendario','url'=>array('create')),
	array('label'=>'Update Calendario','url'=>array('update','id'=>$model->idCalendario)),
	array('label'=>'Delete Calendario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idCalendario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Calendario','url'=>array('admin')),
);
?>

<h1>View Calendario #<?php echo $model->idCalendario; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idCalendario',
		'fecha_inicial',
		'fecha_final',
		'estado',
	),
)); ?>
