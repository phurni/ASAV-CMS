<?php
/* @var $this ChildrenController */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	'Trombinoscope',
		
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_gallery',
)); ?>

<div class="clear" />