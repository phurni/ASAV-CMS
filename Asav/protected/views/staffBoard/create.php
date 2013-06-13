<?php
/* @var $this StaffBoardController */
/* @var $model StaffBoard */

$this->breadcrumbs=array(
	'Espace de communication'=>array('index'),
	'Création d\'un message',
);

$this->menu=array(
	array('label'=>'Espace de communication', 'url'=>array('index')),
);
?>

<h1>Création d'un message</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>