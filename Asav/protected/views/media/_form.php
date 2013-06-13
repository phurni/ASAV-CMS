<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'child-message-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
)); 
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
$childmessage=CHtml::listData(ChildMessage::model()->findAll(), 'Id', 'Id');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row-fluid">	
		<div class="span6">		
			<?php echo $form->textFieldRow($model, 'Title', array('maxlength'=>100, 'class' => 'validate')); ?>
		</div>
		
		<div class="span6">
			<?php echo $form->labelEx($model,'Path'); ?>
			<div>
				<?php echo $form->fileField($model,'File', array('id' => 'File')); ?>
				<input type="text" id="textFile" class="validate" placeholder="Joindre un fichier..." style="display: none;cursor: pointer; background-color: white;" readonly="readonly" />
			</div>
		</div>
	</div>
	
	<div class="row-fluid">	
	
		<div class="span4">		
			<?php echo $form->dropDownListRow($model,'Author',$authors, array('empty' => 'Sélectionner un auteur...', 'class' => 'validate'));?>
			<?php echo $form->error($model,'Author'); ?>
		</div>	
	
		<div class="span4">		
			<?php echo $form->dropDownListRow($model,'Child',$children, array('empty' => 'Sélectionner un enfant...', 'class' => 'validate'));?>
			<?php echo $form->error($model,'Child'); ?>
		</div>
		
		<div class="span2">		
			<?php echo $form->dropDownListRow($model,'ChildMessage',$childmessage);?>
			<?php echo $form->error($model,'ChildMessage'); ?>
		</div>
		
		<div class="span2">		
			<?php echo $form->dropDownListRow($model,'StaffBoard',$childmessage);?>
			<?php echo $form->error($model,'StaffBoard'); ?>
		</div>	
	</div>
	<div class="row-fluid">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>
	
	</div>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Créer' : 'Sauvegarder',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
