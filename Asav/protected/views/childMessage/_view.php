<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Author')); ?>:</b>
	<?php echo CHtml::encode($data->Author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Child')); ?>:</b>
	<?php echo CHtml::encode($data->Child); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->DateCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Message')); ?>:</b>
	<?php echo CHtml::encode($data->Message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsForwarded')); ?>:</b>
	<?php echo CHtml::encode($data->IsForwarded); ?>
	<br />


</div>