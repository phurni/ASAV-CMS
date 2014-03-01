<?php
/* @var $this ChildrenController */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	$gallery_title,
		
);

$this->menu = array (
		array (
				'label' => 'Annuaire des enfants',
				'url' => array (
						'index'
				)
		),
		array (
				'label' => 'Ajouter un enfant',
				'url' => array (
						'create'
				),
				'visible' => $isInTeam
		),
		array (
				'label' => $gallery_title,
				'url' => array (
						'gallery'
				)
		)
);
?>
<h1><?php echo $gallery_title ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_gallery',
)); ?>

<div class="clear" />
</div>