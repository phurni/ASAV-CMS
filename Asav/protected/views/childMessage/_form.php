<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'child-message-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'wideFields'),
)); 
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$children=CHtml::listData($children, 'Id', 'Fullname');
$isInTeam = (isset(Yii::app()->user->user) && Yii::app()->user->user->IsInTeam());
?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row-fluid">	

		<div class="span5">		
			<?php echo $form->dropDownListRow($model,'Child',$children);?>
			<?php echo $form->error($model,'Child'); ?>
		</div>
		
		<?php 
		
		$action = $this->getAction()->getId();
		if($action != "create"){
			?>
			<div class="span2">
			<?php
				if($isInTeam){
					echo $form->labelEx($model,'IsForwarded');
					echo $form->CheckBox($model,'IsForwarded');
					echo $form->error($model,'IsForwarded');
				}
			?>
		</div>
			
		<div class="span4">
			<?php
				if($isInTeam){
					echo $form->labelEx($model,'DateCreated');
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
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
					));
					echo $form->textField($model,'DateCreated', array('style'=>"display:none"));
				}
			?>
		</div>
	
		<?php	
		}
		?>
	
	</div>
	<?php echo $form->textAreaRow($model,'Message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton(($model->isNewRecord ? 'Créer' : 'Enregistrer'),array('class'=>'btn')); ?>
	</div>
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/upload.js"></script>

<?php $this->endWidget(); ?>
