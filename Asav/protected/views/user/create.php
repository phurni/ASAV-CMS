<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Liste des utilisateurs', 'url'=>array('index')),
	array('label'=>'Créer un utilisateur', 'url'=>array('create')),
);
?>

<h1>Créer un utilisateur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>