<?php
/* @var $this ExamplePeopleController */
/* @var $data Person */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country')); ?>:</b>
	<?php echo CHtml::encode($data->country->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Genre')); ?>:</b>
	<?php echo CHtml::encode($data->Genre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Firstname')); ?>:</b>
	<?php echo CHtml::encode($data->Firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lastname')); ?>:</b>
	<?php echo CHtml::encode($data->Lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />


</div>