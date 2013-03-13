<?php
/* @var $this MediaController */
/* @var $data Media */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChildMessage')); ?>:</b>
	<?php echo CHtml::encode($data->ChildMessage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StaffBoard')); ?>:</b>
	<?php echo CHtml::encode($data->StaffBoard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Path')); ?>:</b>
	<?php echo CHtml::encode($data->Path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created')); ?>:</b>
	<?php echo CHtml::encode($data->Created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Modified')); ?>:</b>
	<?php echo CHtml::encode($data->Modified); ?>
	<br />

	*/ ?>

</div>