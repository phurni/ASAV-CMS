<?php
/* @var $this ReportController */
/* @var $model Report */
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
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Day'); ?>
		<?php echo $form->textField($model,'Day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActionsNutricient'); ?>
		<?php echo $form->textArea($model,'ActionsNutricient',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActionsSchcool'); ?>
		<?php echo $form->textArea($model,'ActionsSchcool',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActionsOther'); ?>
		<?php echo $form->textArea($model,'ActionsOther',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NoteNutricient'); ?>
		<?php echo $form->textArea($model,'NoteNutricient',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NoteSchool'); ?>
		<?php echo $form->textArea($model,'NoteSchool',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NoteOther'); ?>
		<?php echo $form->textArea($model,'NoteOther',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->