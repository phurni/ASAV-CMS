<?php
/* @var $this ChildrenController */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	'Trombinoscope',
		
);

$this->menu = array (
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
				),
				'visible' => $isInTeam
		),
		array (
				'label' => 'Trombinoscope',
				'url' => array (
						'gallery'
				)
		)
);
?>
<h1>Trombinoscope</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_gallery',
)); ?>

<div class="clear" />
</div>