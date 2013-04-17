<?php
/* @var $this ChildrenController */
/* @var $model Child */
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
		<?php echo $form->label($model,'Sponsor'); ?>
		<?php echo $form->textField($model,'Sponsor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Firstname'); ?>
		<?php echo $form->textField($model,'Firstname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Birthday'); ?>
		<?php echo $form->textField($model,'Birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Genre'); ?>
		<?php echo $form->textField($model,'Genre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->