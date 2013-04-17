<?php
/* @var $this ChildController */
/* @var $model Child */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Sponsor'); ?>
		<?php echo $form->textField($model,'Sponsor'); ?>
		<?php echo $form->error($model,'Sponsor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Firstname'); ?>
		<?php echo $form->textField($model,'Firstname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Birthday'); ?>
		<?php echo $form->textField($model,'Birthday'); ?>
		<?php echo $form->error($model,'Birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Genre'); ?>
		<?php echo $form->textField($model,'Genre'); ?>
		<?php echo $form->error($model,'Genre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->