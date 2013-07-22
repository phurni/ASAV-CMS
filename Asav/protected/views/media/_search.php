<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Author',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Child',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Childmessage',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Staffboard',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Path',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'Title',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'Description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'Created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Modified',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
