<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
)); 
$genres=CHtml::listData(Genre::model()->findAll(), 'Id', 'Name');
$groups=CHtml::listData(Group::model()->findAll(), 'Id', 'Name');
$countries=CHtml::listData(Country::model()->findAll(), 'Id', 'Name');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">	

<div class="span3">
		<?php echo $form->labelEx($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'Firstname'); ?>
		<?php echo $form->textField($model,'Firstname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Firstname'); ?>
	</div>
	
	<div class="span3">
		
		<?php echo $form->dropDownListRow($model,'Genre',$genres); ?>
		<?php echo $form->error($model,'Genre'); ?>
	</div>

	<div class="span3">
		<?php echo $form->dropDownListRow($model,'Group',$groups,array('empty' => 'Sélectionner un groupe...', 'class' => 'validate')); ?>
		<?php echo $form->error($model,'Group'); ?>
	</div>


</div>	

<div class="row-fluid">	
	<div class="span3">
	<?php echo $form->labelEx($model,'Birthday'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'name'=>'tmp-Birthday',
		// additional javascript options for the date picker plugin
		'options'=>array(
				'showAnim'=>'fold',
				'dateFormat' => 'dd mm yy',
				'altFormat' => 'yy-mm-dd',
				'altField' => "#User_Birthday",
				'changeYear'=>'true',
		),
		'model'=>$model,
		'value'=>$model->Birthday,
	)); ?>
	<?php echo $form->textField($model,'Birthday', array('style'=>"display:none")); ?>
	</div>



	<div class="span3">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'Username'); ?>
		<?php echo $form->textField($model,'Username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Username'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>
</div>	<!-- form -->
<div class="row-fluid">	

	<div class="span3">
		<?php echo $form->dropDownListRow($model,'Country',$countries); ?>
		<?php echo $form->error($model,'Country'); ?>
	</div>
	<div class="span3">
		<?php echo $form->labelEx($model,'Town'); ?>
		<?php echo $form->textField($model,'Town',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Town'); ?>
	</div>



	<div class="span3">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textField($model,'Address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Address'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'ZipCode'); ?>
		<?php echo $form->textField($model,'ZipCode'); ?>
		<?php echo $form->error($model,'ZipCode'); ?>
	</div>
</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer', array("class" => "btn")); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

