<?php
/* @var $this MediaController */
/* @var $model Media */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Author'); ?>
		<?php echo $form->textField($model,'Author'); ?>
		<?php echo $form->error($model,'Author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Child'); ?>
		<?php echo $form->textField($model,'Child'); ?>
		<?php echo $form->error($model,'Child'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ChildMessage'); ?>
		<?php echo $form->textField($model,'ChildMessage'); ?>
		<?php echo $form->error($model,'ChildMessage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StaffBoard'); ?>
		<?php echo $form->textField($model,'StaffBoard'); ?>
		<?php echo $form->error($model,'StaffBoard'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Path'); ?>
		<?php echo $form->textField($model,'Path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
		<?php echo $form->error($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Modified'); ?>
		<?php echo $form->textField($model,'Modified'); ?>
		<?php echo $form->error($model,'Modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->