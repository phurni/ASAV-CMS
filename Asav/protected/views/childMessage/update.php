<?php
$this->breadcrumbs=array(
	'Messages aux enfants'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Modifier',
);

$this->menu=array(
	array('label'=>'Liste des Messages','url'=>array('index')),
	array('label'=>'Créer un Message','url'=>array('create')),
	array('label'=>'Consulter un Message','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Supprimer un Message','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce message ?')),
		
);
?>

<h1>Modifier Message : # <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>