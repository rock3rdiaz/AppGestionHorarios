<?php
$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	$model->idTurno=>array('view','id'=>$model->idTurno),
	'Update',
);

$this->menu=array(
	array('label'=>'List Turno','url'=>array('index')),
	array('label'=>'Create Turno','url'=>array('create')),
	array('label'=>'View Turno','url'=>array('view','id'=>$model->idTurno)),
	array('label'=>'Manage Turno','url'=>array('admin')),
);
?>

<h1>Update Turno <?php echo $model->idTurno; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'horarios'=>$horarios)); ?>

<?php
	Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/script.js', CClientScript::POS_END);
?>