<?php
/* @var $this MediaController */
/* @var $model Media */

$this->breadcrumbs=array(
	'Média'=>array('index'),
	'Ajouter un média',
);

$this->menu=array(
	array('label'=>'Liste des média', 'url'=>array('index')),
);
?>

<h1>Ajouter un media lié à un enfant</h1>

<?php echo $this->renderPartial('_formforchild', array('model'=>$model)); ?>