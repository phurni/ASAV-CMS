<?php
/* @var $this ChildController */
/* @var $model Child */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	'Création',
);

$this->menu=array(
	array (
				'label' => 'Annuaire des enfants',
				'url' => array (
						'index'
				)
		),
		array (
				'label' => 'Créer un enfant',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Trombinoscope',
				'url' => array (
						'gallery'
				)
		)
);
?>

<h1>Créer un enfant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>