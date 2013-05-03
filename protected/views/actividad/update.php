<?php
$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	$model->idActividad=>array('view','id'=>$model->idActividad),
	'Update',
);

$this->menu=array(
	array('label'=>'List Actividad','url'=>array('index')),
	array('label'=>'Create Actividad','url'=>array('create')),
	array('label'=>'View Actividad','url'=>array('view','id'=>$model->idActividad)),
	array('label'=>'Manage Actividad','url'=>array('admin')),
);
?>

<h1>Update Actividad <?php echo $model->idActividad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'horarios'=>$horarios)); ?>

<?php
	Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/script.js', CClientScript::POS_END);
?>