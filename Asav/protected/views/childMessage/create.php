<?php
$this->breadcrumbs=array(
	'Child Messages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChildMessage','url'=>array('index')),
	array('label'=>'Manage ChildMessage','url'=>array('admin')),
);
?>

<h1>Create ChildMessage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>