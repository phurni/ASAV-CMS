<?php
/* @var $this ChildController */
/* @var $model Child */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste Enfants', 'url'=>array('index')),

);
?>

<h1>Créer Enfant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>