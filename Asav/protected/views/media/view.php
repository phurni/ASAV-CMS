<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List Media','url'=>array('index')),
	array('label'=>'Create Media','url'=>array('create')),
	array('label'=>'Update Media','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Media','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Media','url'=>array('admin')),
);
?>

<h1>View Media #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Author',
		'Child',
		'ChildMessage',
		'StaffBoard',
		'Path',
		'Title',
		'Description',
		'Created',
		'Modified',
	),
)); ?>
