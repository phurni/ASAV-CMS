<?php
/* @var $this StaffBoardController */
/* @var $model StaffBoard */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'wideFields'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row-fluid">
		<span class="span11">
			<?php echo $form->labelEx($model,'Title'); ?>
			<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'Title'); ?>
		</span>
	</div>

	<div class="row-fluid">
		<span class="span11">
			<?php echo $form->labelEx($model,'Content'); ?>
			<?php echo $form->textArea($model,'Content',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Content'); ?>
		</span>
	</div>
	
	<div class="row-fluid">
		<!-- Upload file -->
		<span class="span5">
			<label>Fichier à charger (optionnel)</label>
			<span>
				<input type="file" name="File" id="File" />
				<input type="text" id="textFile" class="validate" placeholder="Joindre un fichier..." style="display: none;cursor: pointer; background-color: white;" readonly="readonly" />
			</span>
		</span>
		<!-- The file name -->
		<span class="span6">
			<label for="filename">Nom du fichier (optionnel)</label>
			
			<span>
				<input type="text" name="filename" id="filename" />
			</span>
		</span>
	</div>
	
	<?php if(Yii::app()->controller->action->id == "view") { ?>
	<div class="row-fluid">
		<span class="span5">
			<?php echo $form->labelEx($model,'Author'); ?>
			<?php echo $form->textField($model,'Author'); ?>
			<?php echo $form->error($model,'Author'); ?>
		</span>
		<span class="span5">
			<?php echo $form->labelEx($model,'DateCreated'); ?>
			<?php echo $form->textField($model,'DateCreated'); ?>
			<?php echo $form->error($model,'DateCreated'); ?>
		</span>
	</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauver', array('class'=>'btn')); ?>
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

		/*
			Executed when the page is fully loaded.
		*/
		$(function() {
			// Customize the file upload component
			with($("#File"))
			{
				css('display', 'none');
				change(function() {$("#textFile").val($(this).val())});
				//attr('onchéange', :$("#textFile").value = this.value');
			}
			with($("#textFile"))
			{
				css('display', 'inline');
				keypress(function(e) {
					// Check if the pressed key is a \n or a \t
					var code = e.keyCode || e.which;
					if(code == 13 || code == 32)
					{
						e.preventDefault();
						$("#File").click();
						
					}
				});
				click(function() {
					$("#File").click();
				});
			}
		});
	</script>

<?php $this->endWidget(); ?>

</div><!-- form -->