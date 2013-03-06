<?php
/* @var $this ExamplePeopleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Liste des enfants',
);

$this->menu=array(
	array('label'=>'Create Child', 'url'=>array('create')),
	array('label'=>'Manage Child', 'url'=>array('admin')),
);
?>

<h1>Liste des enfants</h1>

<?php
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/

$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{summary}{items}{pager}",
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'columns'=>array(
		array('name'=>'Id', 'header'=>'#'),
        array('name'=>'Firstname', 'header'=>'Prénom'),
        array('name'=>'Lastname', 'header'=>'Nom'),
    	array('name'=>'sponsor.Firstname', 'header'=>'Parrain'),
    	array('name'=>'Birthday', 'header'=>'Birthday'),
    	array('name'=>'genre.Name', 'header'=>'Genre'),
    	
		/*array('name'=>'genre.Name', 'header'=>'Genre'),
		array('name'=>'country.Name', 'header'=>'Pays'),
        array('name'=>'Address', 'header'=>'Adresse'),*/
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));

?>