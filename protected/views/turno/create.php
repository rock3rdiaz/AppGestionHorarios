<?php
$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Turno','url'=>array('index')),
	array('label'=>'Manage Turno','url'=>array('admin')),
);
?>

<h1>Create Turno</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
	Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/script.js', CClientScript::POS_END);
?>