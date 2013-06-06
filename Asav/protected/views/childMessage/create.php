<?php
$this->breadcrumbs=array(
	'Messages aux enfants'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Messages','url'=>array('index')),

);
?>

<h1>Créer un Message</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>