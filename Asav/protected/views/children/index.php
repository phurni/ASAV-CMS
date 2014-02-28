<?php
/* @var $this ChildrenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array (
		'Enfants' 
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

<h1>Liste des enfants</h1>

<?php
/**
 * Build the columns of the datagrid depending if the user need to see the
 * sponsor column
 */
$columns = array ();
$columns [] = array (
		'name' => 'Firstname',
		'header' => 'Prénom',
		'type' => 'raw',
		'value' => 'CHtml::link($data->Firstname, Yii::app()->createUrl("/children/view", array("id"=>$data->Id)))' 
);
$columns [] = array (
		'name' => 'Lastname',
		'header' => 'Nom',
		'type' => 'raw',
		'value' => 'CHtml::link($data->Lastname, Yii::app()->createUrl("/children/view", array("id"=>$data->Id)))' 
);

// Add the sponsor column if the user is not the sponsor himself
if (! $sponsorized) {
	$columns [] = array (
			'name' => 'Sponsor',
			'value' => '($data->sponsor ? $data->sponsor->FullName : "")' 
	);
}

// Add the rest of the columns
$columns [] = array (
		'name' => 'Birthday',
		'header' => 'Date de naissance' ,
		'value' => 'Yii::app()->dateFormatter->format("dd.MM.yyyy",strtotime($data->Birthday))'
);
$columns [] = array (
		'name' => 'Genre',
		'value' => '$data->genre->Name' 
);
$columns [] = array (
		'class' => 'bootstrap.widgets.TbButtonColumn',
		'htmlOptions' => array (
				'style' => 'width: 50px' 
		) 
);

$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'type' => 'striped bordered condensed',
		'dataProvider' => $dp,
		'filter' => null,
		'template' => "{summary}{items}{pager}",
		'summaryText' => 'Displaying {start}-{end} of {count} results.',
		'columns' => $columns 
) );

?>