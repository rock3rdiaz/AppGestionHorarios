<?php
$this->breadcrumbs=array(
	'Programacions'=>array('index'),
	$model->idProgramacion=>array('view','id'=>$model->idProgramacion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Programacion','url'=>array('index')),
	array('label'=>'Create Programacion','url'=>array('create')),
	array('label'=>'View Programacion','url'=>array('view','id'=>$model->idProgramacion)),
	array('label'=>'Manage Programacion','url'=>array('admin')),
);
?>

<h1>Update Programacion <?php echo $model->idProgramacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>