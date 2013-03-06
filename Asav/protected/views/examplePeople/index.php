<?php
/* @var $this ExamplePeopleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'people',
);

$this->menu=array(
	array('label'=>'Create Person', 'url'=>array('create')),
	array('label'=>'Manage Person', 'url'=>array('admin')),
);
?>

<h1>people</h1>

<?php
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/

$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
	'filter'=>null,
    'template'=>"{summary}{items}{pager}",
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'columns'=>array(
		array('name'=>'Id', 'header'=>'#'),
        array('name'=>'Firstname', 'header'=>'Prénom'),
        array('name'=>'Lastname', 'header'=>'Nom'),
		array('name'=>'genre', 'value'=>'$data->genre->Name'),
		array('name'=>'country', 'value'=>'$data->country->Name'),
        array('name'=>'Address', 'header'=>'Adresse'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));

?>