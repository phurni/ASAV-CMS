<?php
$this->breadcrumbs=array(
	'Child Messages'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List ChildMessage','url'=>array('index')),
	array('label'=>'Create ChildMessage','url'=>array('create')),
	array('label'=>'Update ChildMessage','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete ChildMessage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChildMessage','url'=>array('admin')),
);
?>

<h1>View ChildMessage #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Author',
		'Child',
		'DateCreated',
		'Message',
		'IsForwarded',
	),
)); ?>
