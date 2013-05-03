<?php
$this->breadcrumbs=array(
	'Calendarios',
);

$this->menu=array(
	array('label'=>'Create Calendario','url'=>array('create')),
	array('label'=>'Manage Calendario','url'=>array('admin')),
);
?>

<h1>Calendarios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
