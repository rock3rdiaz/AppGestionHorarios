<?php
$this->breadcrumbs=array(
	'Turnos',
);

$this->menu=array(
	array('label'=>'Create Turno','url'=>array('create')),
	array('label'=>'Manage Turno','url'=>array('admin')),
);
?>

<h1>Turnos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
