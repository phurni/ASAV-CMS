<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'person-form',
	'enableAjaxValidation'=>false,
)); 
$genres=CHtml::listData(Genre::model()->findAll(), 'Id', 'Name');
$countries=CHtml::listData(Country::model()->findAll(), 'Id', 'Name');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="wideFields">	
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
			<?php echo $form->dropDownListRow($model,'Genre',$genres); ?>
			<?php echo $form->error($model,'Genre'); ?>
		</div>
		
	<div class="row-fluid">	
	
		<div class="span4">
			<?php echo $form->labelEx($model,'Adresse'); ?>
			<?php echo $form->textField($model,'Address'); ?>
			<?php echo $form->error($model,'Address'); ?>
		</div>
		

		
		<div class="span4">
			<?php echo $form->dropDownListRow($model,'Country',$countries); ?>
			<?php echo $form->error($model,'Country'); ?>
		</div>
	</div>	
	
	</div>
</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>
