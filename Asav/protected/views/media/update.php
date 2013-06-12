<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Media','url'=>array('index')),
	array('label'=>'Create Media','url'=>array('create')),
	array('label'=>'View Media','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Media','url'=>array('admin')),
);
?>

<h1>Update Media <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>