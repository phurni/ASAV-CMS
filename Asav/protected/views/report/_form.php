<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
)); 

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">	


	<div class="span4">
		<?php echo $form->labelEx($model,'Author'); ?>
		<?php echo $form->textField($model,'Author'); ?>
		<?php echo $form->error($model,'Author'); ?>
	</div>

	<div class="span4">
		<?php echo $form->labelEx($model,'Child'); ?>
		<?php echo $form->textField($model,'Child');?>
		<?php echo $form->error($model,'Child'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'Day'); ?>
		<?php echo $form->textField($model,'Day'); ?>
		<?php echo $form->error($model,'Day'); ?>
	</div>
</div>
<div class="row-fluid">	


	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'ActionsNutricient'); ?>
		<?php echo $form->textArea($model,'ActionsNutricient', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActionsNutricient'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActionsSchcool'); ?>
		<?php echo $form->textArea($model,'ActionsSchcool', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActionsSchcool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActionsOther'); ?>
		<?php echo $form->textArea($model,'ActionsOther', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActionsOther'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoteNutricient'); ?>
		<?php echo $form->textArea($model,'NoteNutricient', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'NoteNutricient'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoteSchool'); ?>
		<?php echo $form->textArea($model,'NoteSchool', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'NoteSchool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoteOther'); ?>
		<?php echo $form->textArea($model,'NoteOther', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'NoteOther'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'report-form',
    'type'=>'inline',
    'htmlOptions'=>array('class'=>'well'),


)); 
$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Lastname');
?>
<?php echo $form->labelEx($model,'Author'); ?>
<?php echo " ";?>
<?php echo $form->textFieldRow($model, 'Author', array('class'=>'input-medium')); ?>
<?php echo $form->error($model,'Author'); ?>
<?php echo " ";?>


<?php echo $form->labelEx($model,'Child'); ?>
<?php echo " ";?>
<?php echo $form->dropDownListRow($model, 'Child'); ?>
<?php echo $form->error($model,'Child'); ?>
<?php echo " ";?>


<?php echo $form->labelEx($model,'Day'); ?>
<?php echo " ";?>
<?php echo $form->textFieldRow($model, 'Day', array('class'=>'input-small')); ?>
<?php echo $form->error($model,'Day'); ?>
<?php echo " ";?>

<?php echo $form->labelEx($model,'Status'); ?>
<?php echo " ";?>
<?php echo $form->textFieldRow($model, 'Status', array('class'=>'input-small')); ?>
<?php echo $form->error($model,'Status'); ?>

 
<?php $this->endWidget(); ?>