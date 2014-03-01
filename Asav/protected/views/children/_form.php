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
$genres = CHtml::listData ( Genre::model ()->findAll ("Type = 'Child'"), 'Id', 'Name' );
$people = CHtml::listData ( Person::model ()->findAll (), 'Id', 'Fullname' );
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
					'dateFormat' => 'dd.mm.yy',
					'altFormat' => 'yy-mm-dd',
					'altField' => "#Child_Birthday",
					'changeYear' => 'true' ,
					'yearRange' => 'c-20:c+0'
			),
			'model' => $model,
			'value' => $model->Birthday ? date('d.m.Y', strtotime($model->Birthday)) : ''
	) );
	?>
	<?php echo $form->textField($model,'Birthday', array('style'=>"display:none")); ?>
	</div>

	<div class="span3">
		
		<?php echo $form->dropDownListRow($model,'Genre',$genres); ?>
		<?php echo $form->error($model,'Genre'); ?>
	</div>



	<span class="span6 row-upload">
			<?php echo $form->labelEx($model,'Photo'); ?>
			<span>
			<input type="file" name="Picture" class="File" />
			<input type="text" class="textFile validate" placeholder="Joindre une image..." style="display: none;cursor: pointer; background-color: white;" readonly="readonly" />
	</span>
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

<!-- END form -->
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer', array("class" => "btn")); ?>
	</div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/upload.js"></script>

<?php $this->endWidget(); ?>
		