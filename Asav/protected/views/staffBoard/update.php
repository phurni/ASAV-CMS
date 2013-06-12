<?php
/* @var $this StaffBoardController */
/* @var $model StaffBoard */

$this->breadcrumbs=array(
	'Espace de communication'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'Espace de communication', 'url'=>array('index')),
	array('label'=>'Créer un article', 'url'=>array('create')),
	array('label'=>'Voir l\'article', 'url'=>array('view', 'id'=>$model->Id)),
);
?>

<h1>Update StaffBoard <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>