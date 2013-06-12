<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'child-message-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
)); 
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row-fluid">	

		
		
		<div class="span4">		
			<?php echo $form->dropDownListRow($model,'Child',$children);?>
			<?php echo $form->error($model,'Child'); ?>
		</div>
		
		<div class="span2">		
			<?php echo $form->labelEx($model,'IsForwarded'); ?>
			<?php echo $form->CheckBox($model,'IsForwarded');?>
			<?php echo $form->error($model,'IsForwarded'); ?>
		</div>
		
	
		<div class="span2">
			<?php echo $form->labelEx($model,'DateCreated'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'tmp-Day',
				// additional javascript options for the date picker plugin
				'options'=>array(
						'showAnim'=>'fold',
						'dateFormat' => 'dd mm yy',
						'altFormat' => 'yy-mm-dd',
						'altField' => "#ChildMessage_DateCreated",
				),
				'model'=>$model,
				'value'=>$model->DateCreated,
			)); ?>
			<?php echo $form->textField($model,'DateCreated', array('style'=>"display:none")); ?>
		</div>
	
	</div>
	<?php echo $form->textAreaRow($model,'Message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>
