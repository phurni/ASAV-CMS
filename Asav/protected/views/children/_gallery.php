<?php
/* @var $this ChildrenController */
/* @var $data Child */
?>

<div class="view center">

	<!-- Picture -->
	<?php 
	echo Chtml::link(
		CHtml::image(
			CHtml::encode($data->picture->Path),
			CHtml::encode($data->Firstname .' '. $data->Lastname),
			array('width' => '200')
		),
		array('view', 'id'=>$data->Id)
	);
	?>
	<br /><br />
	
	<!-- Name -->
	<?php 
	echo Chtml::link(
			CHtml::encode($data->Firstname .' '. $data->Lastname),
			array('view', 'id'=>$data->Id)
	);
	?>
	<br />

</div>