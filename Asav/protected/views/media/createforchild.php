<?php
/* @var $this MediaController */
/* @var $model Media */

$this->breadcrumbs=array(
	'Média'=>array('index'),
	'Ajouter un media',
);

$this->menu=array(
	array('label'=>'Liste des media', 'url'=>array('index')),
	array('label'=>'Manage Média', 'url'=>array('admin')),
);
?>

<h1>Ajouter un media pour un enfant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>