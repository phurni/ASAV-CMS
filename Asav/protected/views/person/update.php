<?php
$this->breadcrumbs=array(
	'people'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'Liste des Personnes','url'=>array('index')),
	array('label'=>'Créer Personne','url'=>array('create')),
	array('label'=>'Consulter Personne','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Supprimer Personne','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Modifier Personne <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>