<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */
?>



<?php 
$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$status=CHtml::listData(Reportstatus::model()->findAll(), 'Id', 'Status');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row-fluid">	


	<div class="span4">
		<?php echo $form->dropDownListRow($model,'Author',$authors); ?>
		<?php echo $form->error($model,'Author'); ?>
	</div>

	<div class="span4">
		
		<?php echo $form->dropDownListRow($model,'Child',$children);?>
		<?php echo $form->error($model,'Child'); ?>
	</div>	

	<div class="span2">
		<?php echo $form->labelEx($model,'Day'); ?>
		<?php echo CHtml::encode($model,'Day'); ?>
		<?php echo $form->error($model,'Day'); ?>
		
	</div>
	
	<div class="span2">
		<?php //echo $form->textField($model,'Status'); ?>
		<?php echo $form->dropDownListRow($model,'Status',$status); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>
</div>
<div class="row-fluid">	

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

