<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'Liste des membres', 'url'=>array('index')),
	array('label'=>'Créer un membre', 'url'=>array('create')),
	array('label'=>'Consulter la fiche du membre', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Supprimer la fiche du membre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Modifier Utilisateur : #<?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>