<?php
$this->breadcrumbs=array(
	'Media',
);


?>

<h1>Medias</h1>

<?php

$columns = array();
$columns[] = array (
						'name' => 'Author',
						
						'value' => '($data->author ? $data->author->Fullname : "") '
				);
if(isset($type) && $type == "child"){
	$columns[] = array (
						'name' => 'Child',
						
						'type' => 'raw',
						'value'=>'$data->child ? CHtml::link($data->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->child->Id))) : ""'
				);
}else if(isset($type) && $type == "childMessage"){
	$columns[] = array (
						'name' => 'Child',
						
						'type' => 'raw',
						'value'=>'$data->childMessage->child ? CHtml::link($data->childMessage->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->childMessage->child->Id))) : ""'
				);
}else if(isset($type) && $type == "report"){
	$columns[] = array (
						'name' => 'Child',
						
						'type' => 'raw',
						'value'=>'$data->report->child ? CHtml::link($data->report->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->report->child->Id))) : ""'
				);
}
$columns[] = array (
						'name' => 'Title',
						'type' => 'raw',
						'value' => 'CHtml::link($data->Title . \' (\' . pathinfo ( $data->Path, PATHINFO_FILENAME ) . \'.\' . pathinfo ( $data->Path, PATHINFO_EXTENSION ) . \')\', Yii::app()->createUrl(\'media/file?path=\'. dirname($data->Path)))'
				);
$columns[] = array (
						'name' => 'Created',
				
						'value' => '$data->Created'
				);
$columns[] = array (
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


