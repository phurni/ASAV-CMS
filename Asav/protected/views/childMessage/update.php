<?php
$this->breadcrumbs=array(
	'Child Messages'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChildMessage','url'=>array('index')),
	array('label'=>'Create ChildMessage','url'=>array('create')),
	array('label'=>'View ChildMessage','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage ChildMessage','url'=>array('admin')),
);
?>

<h1>Update ChildMessage <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>