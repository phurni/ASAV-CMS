<?php
/* @var $this ChildrenController */

$this->breadcrumbs=array(
	'Children',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_gallery',
)); ?>