<?php
$this->breadcrumbs=array(
	'Programacions'=>array('index'),
	$model->idProgramacion,
);

$this->menu=array(
	array('label'=>'List Programacion','url'=>array('index')),
	array('label'=>'Create Programacion','url'=>array('create')),
	array('label'=>'Update Programacion','url'=>array('update','id'=>$model->idProgramacion)),
	array('label'=>'Delete Programacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idProgramacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Programacion','url'=>array('admin')),
);
?>

<h1>View Programacion #<?php echo $model->idProgramacion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idProgramacion',
		'Horario_idHorario',
		'Actividad_idActividad',
		'Instructor_idInstructor',
		'Calendario_idCalendario',
		'Incidencia_idIncidencia',
	),
)); ?>
