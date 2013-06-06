<?php
$this->breadcrumbs=array(
	'people'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Liste des Personnes','url'=>array('index')),
	
);
?>

<h1>Créer une Personne</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>