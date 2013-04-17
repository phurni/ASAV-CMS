<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Rapports'=>array('index'),
	'Création',
);

$this->menu=array(
	array('label'=>'Liste des Rapports', 'url'=>array('index')),
	
);
?>

<h1>Créer un Rapport</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>