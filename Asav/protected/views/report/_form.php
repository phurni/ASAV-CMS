<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'wideFields'),
)); 
$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$status=CHtml::listData(Reportstatus::model()->findAll(), 'Id', 'Status');
$type=CHtml::listData(Reporttypes::model()->findAll(), 'Id', 'Name');
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="form">	

<div class="row-fluid">	



	<div class="span3">
		
		<?php echo $form->dropDownListRow($model,'Child',$children);?>
		<?php echo $form->error($model,'Child'); ?>
	</div>
	
	<div class="span3">
		<?php //echo $form->textField($model,'Status'); ?>
		<?php echo $form->dropDownListRow($model,'Status',$status); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>
	
	<div class="span3">
		
		<?php echo $form->dropDownListRow($model,'Type',$type); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>




		<div class="span3">
			<?php echo $form->labelEx($model,'VisitDate'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'tmp-VisitDate',
				// additional javascript options for the date picker plugin
				'options'=>array(
						'showAnim'=>'fold',
						'dateFormat' => 'dd mm yy',
						'altFormat' => 'yy-mm-dd',
						'altField' => "#Report_VisitDate",
				),
				'model'=>$model,
				'value'=>$model->VisitDate,
			)); ?>
			<?php echo $form->textField($model,'VisitDate', array('style'=>"display:none")); ?>
		</div>
</div>	
<div class="row-fluid">	

	<div class="row">
		<?php echo $form->labelEx($model,'ActionsNutricient'); ?>
		<?php echo $form->textArea($model,'ActionsNutricient', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActionsNutricient'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActionsSchcool'); ?>
		<?php echo $form->textArea($model,'ActionsSchcool', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActionsSchcool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActionsOther'); ?>
		<?php echo $form->textArea($model,'ActionsOther', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActionsOther'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoteNutricient'); ?>
		<?php echo $form->textArea($model,'NoteNutricient', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'NoteNutricient'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoteSchool'); ?>
		<?php echo $form->textArea($model,'NoteSchool', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'NoteSchool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NoteOther'); ?>
		<?php echo $form->textArea($model,'NoteOther', array('class' => 'ReportsCreateBigField'),array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'NoteOther'); ?>
	</div>
	
	<div class="row-fluid">
		<!-- Upload file -->
		<span class="span6">
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer', array("class" => "btn")); ?>
	</div>

	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/upload.js"></script>
	
<?php $this->endWidget(); ?>
	</div>
</div><!-- form -->

