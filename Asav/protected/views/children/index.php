<?php
/* @var $this ChildrenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Enfants',
);

$this->menu=array(
	array('label'=>'Créer Enfant', 'url'=>array('create')),
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
    'dataProvider'=>$dp,
	'filter'=>null,
    'template'=>"{summary}{items}{pager}",
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'columns'=>array(
        array('name'=>'Firstname', 'header'=>'Prénom'),
        array('name'=>'Lastname', 'header'=>'Nom'),
    	array('name'=>'Sponsor', 'value'=>'($data->sponsor ? $data->sponsor->FullName : "")'),
    	array('name'=>'Birthday', 'header'=>'Date de naissance'),
    	array('name'=>'Genre', 'value'=>'$data->genre->Name'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));

?>