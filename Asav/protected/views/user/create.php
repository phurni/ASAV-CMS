<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Liste des membres', 'url'=>array('index')),
	array('label'=>'Mailing', 'url'=>array('mailing')),
	array('label'=>'Publipostage', 'url'=>array('publipostage')),
);
?>

<h1>Créer un utilisateur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>