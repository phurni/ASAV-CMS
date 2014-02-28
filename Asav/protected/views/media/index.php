<?php
$title = "Medias";

$columns = array();
$columns[] = array (
						'name' => 'Author',
						
						'value' => '($data->author ? $data->author->Fullname : "") '
				);
if(isset($type) && $type == "child"){
  $title = "Medias des enfants";
	$columns[] = array (
						'name' => 'Child',
						
						'type' => 'raw',
						'value'=>'$data->child ? CHtml::link($data->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->child->Id))) : ""'
				);
}else if(isset($type) && $type == "staffboard"){
  $title = "Medias de l'espace de communication";

}else if(isset($type) && $type == "childmessage"){
  $title = "Medias des messages des enfants";
	$columns[] = array (
						'name' => 'Child',
						
						'type' => 'raw',
						'value'=>'$data->childmessage->child ? CHtml::link($data->childmessage->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->childmessage->child->Id))) : ""'
				);
}else if(isset($type) && $type == "report"){
  $title = "Medias des rapports";
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
				
$this->breadcrumbs=array(
	$title,
);
?>

<h1><?php echo $title ?></h1>

<?php
$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'type' => 'striped bordered condensed',
		'dataProvider' => $dp,
		'filter' => null,
		'template' => "{summary}{items}{pager}",
		'summaryText' => 'Displaying {start}-{end} of {count} results.',
		'columns' => $columns
) );

?>


