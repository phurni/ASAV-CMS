<?php
/* @var $this ChildrenController */
/* @var $data Child */
?>

<div class="view center ChildrenGalleryElement">

	<!-- Picture -->
	<?php 
	echo Chtml::link(
		CHtml::image(
			isset($data->picture) ? CHtml::encode($data->picture->Path) : '../images/noimage.png',
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