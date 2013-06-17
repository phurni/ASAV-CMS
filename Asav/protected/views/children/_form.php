<?php
/* @var $this ChildController */
/* @var $model Child */
/* @var $form CActiveForm */
?>



<?php

$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'report-form',
		'enableAjaxValidation' => false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'wideFields')
) );

$sponsors = CHtml::listData ( User::model ()->findAll (), 'Id', 'Fullname' );
$genres = CHtml::listData ( Genre::model ()->findAll (), 'Id', 'Name' );
?>

<p class="note">
	Les champs avec <span class="required">*</span> sont requis.
</p>

<?php echo $form->errorSummary($model); ?>

<?php
// don't show the sponsor child when user create a new child
$actionName = $this->getAction ()->getId ();
if ($actionName != "create") {
	?>
<div class="row-fluid">
	<div class="span4">
		<?php echo $form->dropDownListRow($model,'Sponsor',$sponsors,array('empty' => 'Sélectionner un parrain...', 'class' => 'validate')); ?>
		<?php echo $form->error($model,'Sponsor'); ?>
	</div>
</div>
	<?php
}
// end IF.
?>

<div class="row-fluid">

	<div class="span6">
		<?php echo $form->labelEx($model,'Firstname'); ?>
		<?php echo $form->textField($model,'Firstname'); ?>
		<?php echo $form->error($model,'Firstname'); ?>
	</div>

	<div class="span6">
		<?php echo $form->labelEx($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname'); ?>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>

</div>

<div class="row-fluid">

	<div class="span3">
	<?php echo $form->labelEx($model,'Birthday'); ?>
	<?php
	
	$this->widget ( 'zii.widgets.jui.CJuiDatePicker', array (
			'name' => 'tmp-Day',
			// additional javascript options for the date picker plugin
			'options' => array (
					'showAnim' => 'fold',
					'dateFormat' => 'dd mm yy',
					'altFormat' => 'yy-mm-dd',
					'altField' => "#Child_Birthday",
					'changeYear' => 'true' 
			),
			'model' => $model,
			'value' => $model->Birthday 
	) );
	?>
	<?php echo $form->textField($model,'Birthday', array('style'=>"display:none")); ?>
	</div>

	<div class="span3">
		
		<?php echo $form->dropDownListRow($model,'Genre',$genres); ?>
		<?php echo $form->error($model,'Genre'); ?>
	</div>



	<span class="span6">
			<?php echo $form->labelEx($model,'Photo'); ?>
			<span>
				<!--<?php echo $form->fileField($model,'Picture', array('id' => 'File')); ?>
				<input type="text" id="textFile" class="validate"
			placeholder="Joindre un fichier..."
			style="display: none; cursor: pointer; background-color: white;"
			readonly="readonly" />-->
			<input type="file" name="File" id="File" />
			<input type="text" id="textFile" class="validate" placeholder="Joindre une image..." style="display: none;cursor: pointer; background-color: white;" readonly="readonly" />
	</span>
	</span>

</div>
<!-- END form -->
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer', array("class" => "btn")); ?>
	</div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/upload.js"></script>

<?php $this->endWidget(); ?>
		