<?php
/* @var $this ChildController */
/* @var $model Child */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
));

$sponsors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$genres=CHtml::listData(Genre::model()->findAll(), 'Id', 'Name');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="form">	
<div class="row-fluid">	


	<div class="span4">
		<?php echo $form->labelEx($model,'Firstname'); ?>
		<?php echo $form->textField($model,'Firstname'); ?>
		<?php echo $form->error($model,'Firstname'); ?>
	</div>

	<div class="span4">
		<?php echo $form->labelEx($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname'); ?>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>
	
	<div class="span4">
		<?php echo $form->dropDownListRow($model,'Sponsor',$sponsors); ?>
		<?php echo $form->error($model,'Sponsor'); ?>
	</div>
</div>
<div class="row-fluid">	

	<div class="span3">
	<?php echo $form->labelEx($model,'Birthday'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'name'=>'tmp-Day',
		// additional javascript options for the date picker plugin
		'options'=>array(
				'showAnim'=>'fold',
				'dateFormat' => 'dd mm yy',
				'altFormat' => 'yy-mm-dd',
				'altField' => "#Child_Birthday",
		),
		'model'=>$model,
		'value'=>$model->Birthday,
	)); ?>
	<?php echo $form->textField($model,'Birthday', array('style'=>"display:none")); ?>
	</div>

	<div class="span2">
		
		<?php echo $form->dropDownListRow($model,'Genre',$genres); ?>
		<?php echo $form->error($model,'Genre'); ?>
	</div>
	 
		
		
			<span class="span6">
			<?php echo $form->labelEx($model,'Photo'); ?>
			<span>
				<?php echo $form->fileField($model,'Picture', array('id' => 'file')); ?>
				<input type="text" id="textFile" class="validate" placeholder="Joindre un fichier..." style="display: none;cursor: pointer; background-color: white;" readonly="readonly" />
			</span>
		</span>
	
</div> <!-- END form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
		
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
			with($("#file"))
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
						$("#file").click();
						
					}
				});
				click(function() {
					$("#file").click();
				});
			}
		});
	</script>
		