<?php
/* @var $this ReportController */
/* @var $data Report */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Author')); ?>:</b>
	<?php echo CHtml::encode($data->Author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Child')); ?>:</b>
	<?php echo CHtml::encode($data->Child); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Day')); ?>:</b>
	<?php echo CHtml::encode($data->Day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActionsNutricient')); ?>:</b>
	<?php echo CHtml::encode($data->ActionsNutricient); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActionsSchcool')); ?>:</b>
	<?php echo CHtml::encode($data->ActionsSchcool); ?>
	<br />

	 
	<b><?php echo CHtml::encode($data->getAttributeLabel('ActionsOther')); ?>:</b>
	<?php echo CHtml::encode($data->ActionsOther); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoteNutricient')); ?>:</b>
	<?php echo CHtml::encode($data->NoteNutricient); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoteSchool')); ?>:</b>
	<?php echo CHtml::encode($data->NoteSchool); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoteOther')); ?>:</b>
	<?php echo CHtml::encode($data->NoteOther); ?>
	<br />

	 

</div>