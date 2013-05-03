<?php
$this->breadcrumbs=array(
	'Calendarios'=>array('index'),
	$model->idCalendario=>array('view','id'=>$model->idCalendario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Calendario','url'=>array('index')),
	array('label'=>'Create Calendario','url'=>array('create')),
	array('label'=>'View Calendario','url'=>array('view','id'=>$model->idCalendario)),
	array('label'=>'Manage Calendario','url'=>array('admin')),
);
?>

<h1>Update Calendario <?php echo $model->idCalendario; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>