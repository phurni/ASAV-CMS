<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Utilisateurs',
);

$this->menu=array(
	array('label'=>'Créer un Utilisateur', 'url'=>array('create')),
	array('label'=>'Mailing', 'url'=>array('mailing')),
	array('label'=>'Publipostage', 'url'=>array('publipostage')),
);
?>

<h1>Utilisateurs</h1>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/

$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'type' => 'striped bordered condensed',
		'dataProvider' => $model->search (),
		'filter' => null,
		'template' => "{summary}{items}{pager}",
		'summaryText' => 'Displaying {start}-{end} of {count} results.',
		'columns' => array (

				array (
						'name' => 'Firstname',
						'header' => 'Prénom'
						
						
				),
				array (
						'name' => 'Lastname',
						'header' => 'Nom'
				),
				array (
						'name' => 'Username',
						'header' => "Nom d'utilisateur"
				),

				array (
						'name' => 'Group',
						'header' => 'Groupe',
						'value' => '$data->group->Name'
				),
				array (
						'name' => 'Genre',
						'header' => 'Genre',
						'value' => '$data->genre->Name'
				),
				array (
						'name' => 'Birthday',
						'header' => 'Date de naissance'
				),

				array (
						'class' => 'bootstrap.widgets.TbButtonColumn',
						'htmlOptions' => array (
								'style' => 'width: 50px'
						)
				)
		)
) );


?>
