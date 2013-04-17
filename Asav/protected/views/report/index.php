<?php
/* @var $this ReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reports',
);

$this->menu=array(
	array('label'=>'Create Report', 'url'=>array('create')),
);
?>

<h1>Reports</h1>

<?php 
/* $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */


$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
	'filter'=>null,
    'template'=>"{summary}{items}{pager}",
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'columns'=>array(
		
		array('name'=>'Author','header'=>'Autheur', 'value'=>'($data->author ? $data->author->Fullname : "") '),
    	array('name'=>'Child', 'header'=>'Enfant' ,'value'=>'($data->child ? $data->child->Fullname : "") '),
    	array('name'=>'Status', 'header'=>'Status', 'value'=>'$data->status->Status'),
    	array('name'=>'Day', 'header'=>'Date'),
       
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));

?>