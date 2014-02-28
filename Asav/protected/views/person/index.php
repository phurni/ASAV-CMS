<?php
$this->breadcrumbs=array(
	'Personne',
);

$this->menu=array(
	array('label'=>'Créer Personne','url'=>array('create')),
	
);
?>

<h1>Listes des Personnes</h1>

<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered condensed',
		'dataProvider'=>$model->search(),
		'filter'=>null,
		'template'=>"{summary}{items}{pager}",
		'summaryText'=>'Displaying {start}-{end} of {count} results.',
		'columns'=>array(

				array('name'=>'Firstname','header'=>'Prénom'),
				array('name'=>'Lastname','header'=>'Nom'),
				array('name'=>'Genre', 'value'=>'$data->genre->Name'),
				array('name'=>'Country','header'=>'Pays', 'value'=>'$data->country->Name'),
				array('name'=>'Address', 'header'=>'Adresse'),
				 
				array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
						'htmlOptions'=>array('style'=>'width: 50px'),
				),
		),
));

?>
