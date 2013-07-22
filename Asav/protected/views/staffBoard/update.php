<?php
/* @var $this StaffboardController */
/* @var $model Staffboard */

$this->breadcrumbs=array(
	'Espace de communication'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Mise à jour',
);

$this->menu=array(
	array('label'=>'Espace de communication', 'url'=>array('index')),
	array('label'=>'Suppression du message', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Voir le message', 'url'=>array('view', 'id'=>$model->Id)),
);
?>

<h1><?php echo $model->Title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>