<?php
/* @var $this ChildrenController */
/* @var $data Child */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sponsor')); ?>:</b>
	<?php echo CHtml::encode($data->Sponsor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Picture')); ?>:</b>
	<?php echo CHtml::encode($data->Picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Firstname')); ?>:</b>
	<?php echo CHtml::encode($data->Firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lastname')); ?>:</b>
	<?php echo CHtml::encode($data->Lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Birthday')); ?>:</b>
	<?php echo CHtml::encode($data->Birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture->Path); ?>
	<br />

</div>