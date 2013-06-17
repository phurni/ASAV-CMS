<?php
/* @var $this ChildController */
/* @var $model Child */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	$model->getFullname()=>array('view','id'=>$model->Id),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Enfants', 'url'=>array('index')),
	array('label'=>'Créer Enfant', 'url'=>array('create')),
	array('label'=>'Consulter Enfant', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Supprimer Enfant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce rapport ?')),
);
?>
<h1><?php echo $model->getFullname(); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>