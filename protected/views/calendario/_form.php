<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'calendario-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'fecha_inicial',array('class'=>'span5')); ?>

	<?php echo $form->labelEx($model, 'fecha_incial');?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		    //'name'=>'publishDate',
		    'model'=>$model,
			'attribute'=>'fecha_inicial',
			'language'=>'es',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'clip',		
		        'dateFormat'=>'yy/mm/dd',
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		));
	?>

	<?php //echo $form->textFieldRow($model,'fecha_final',array('class'=>'span5')); ?>

	<?php echo $form->labelEx($model, 'fecha_final');?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		    //'name'=>'publishDate',
		    'model'=>$model,
			'attribute'=>'fecha_final',
			'language'=>'es',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'clip',		
		        'dateFormat'=>'yy/mm/dd',
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		));
	?>

	<?php //echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
