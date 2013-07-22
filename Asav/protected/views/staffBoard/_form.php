<?php
/* @var $this StaffboardController */
/* @var $model Staffboard */
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
	
	<div class="row-fluid row-upload">
		<!-- Upload file -->
		<span class="span5">
			<label>Fichier à charger (optionnel)</label>
			<span>
				<input type="file" name="File" class="File" />
				<input type="text" class="textFile validate" placeholder="Joindre un fichier..." style="display: none;cursor: pointer; background-color: white;" readonly="readonly" />
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
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/upload.js"></script>

<?php $this->endWidget(); ?>

</div><!-- form -->