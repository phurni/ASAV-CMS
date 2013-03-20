<?php
/* @var $this MediaController */
/* @var $model Media */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>"wideFields"),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'Title', array('maxlength'=>100)); ?>
	
	<div class="row-fluid">
		<span class="span6">
			<?php echo $form->textFieldRow($model,'Child'); ?>
		</span>
		<span class="span6">
			<?php echo $form->labelEx($model,'Fichier à charger'); ?>
			<span class="fileUploadContainer">
				<?php echo $form->fileField($model,'UploadedFile', 
						array('class'=>'fileUploadComponent',
							  'style'=>'font-size: 28px',
							  'onchange'=>'javascript:document.getElementById(\'file\').value = this.value')); ?>
				<input id="file" type="text" class="fileUploadCustom" placeholder="Joindre un fichier..." />
			</span>
		</span>
	</div>


		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>
