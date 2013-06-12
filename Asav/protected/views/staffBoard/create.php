<?php
/* @var $this StaffBoardController */
/* @var $model StaffBoard */

$this->breadcrumbs=array(
	'Staff Boards'=>array('index'),
	'Création d\'un article',
);

$this->menu=array(
	array('label'=>'Espace de communication', 'url'=>array('index')),
);
?>

<h1>Création d'un article</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>