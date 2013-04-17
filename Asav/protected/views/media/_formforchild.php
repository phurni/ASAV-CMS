<?php
/* @var $this MediaController */
/* @var $model Media */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'wideFields','onsubmit'=>'return Validate()'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'Title', array('maxlength'=>100, 'class' => 'validate')); ?>
	
	<div class="row-fluid">
		<!-- Combobox for child -->
		<span class="span6">
			<?php
			$children = CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
			echo $form->dropDownListRow($model, 'Child', $children, array('empty' => 'Sélectionner un enfant...', 'class' => 'validate'));
			?>
		</span>
		<!-- Upload file -->
		<span class="span6">
			<?php echo $form->labelEx($model,'Path'); ?>
			<span class="fileUploadContainer">
				<?php echo $form->fileField($model,'Path', 
						array('class'=>'fileUploadComponent',
							  'style'=>'font-size: 28px',
							  'onchange'=>'javascript:document.getElementById(\'file\').value = this.value')); ?>
				<input id="file" type="text" class="fileUploadCustom validate" placeholder="Joindre un fichier..." />
			</span>
		</span>
	</div>


		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn')); ?>
	</div>
	
	<script type="text/javascript">
		/*
			Validates the form fields marked with the class 'validate'.
			This function performs a "is not empty" check.
	 	*/
		function Validate() {
			var isValid  = true;
			// Enumerate all fields in the form
			var fields = $("#form .validate");
			for(var i = 0 ; i < fields.length ; i++)
			{
				if(fields.eq(i).val() == "")
				{
					isValid = false;
					fields.eq(i).addClass("error");
				}
				else
				{
					fields.eq(i).removeClass("error");
				}
			}

			return isValid;
		};
	</script>

<?php $this->endWidget(); ?>
