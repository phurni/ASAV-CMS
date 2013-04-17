<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'Liste des Rapports', 'url'=>array('index')),
	array('label'=>'Créer Rapport', 'url'=>array('create')),
	array('label'=>'Consulter Rapport', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Supprimer Rapport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce rapport ?')),
);
?>

<h1>Update Report <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>