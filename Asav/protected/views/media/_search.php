<?php
/* @var $this MediaController */
/* @var $model Media */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Author'); ?>
		<?php echo $form->textField($model,'Author'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Child'); ?>
		<?php echo $form->textField($model,'Child'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChildMessage'); ?>
		<?php echo $form->textField($model,'ChildMessage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StaffBoard'); ?>
		<?php echo $form->textField($model,'StaffBoard'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Path'); ?>
		<?php echo $form->textField($model,'Path',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Modified'); ?>
		<?php echo $form->textField($model,'Modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->