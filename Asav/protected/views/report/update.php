<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Rapports'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des Rapports', 'url'=>array('index')),
	array('label'=>'Créer un Rapport', 'url'=>array('create')),
	array('label'=>'Consulter un Rapport', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Supprimer un Rapport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce rapport ?')),
);
?>

<h1>Modification du rapport #<?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>