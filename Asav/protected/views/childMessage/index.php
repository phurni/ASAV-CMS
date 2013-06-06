<?php
$this->breadcrumbs=array(
	'Messages aux enfants',
);

$this->menu=array(
	array('label'=>'Envoyer un message','url'=>array('create')),

);
?>

<h1>Child Messages</h1>

<?php 

$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'type' => 'striped bordered condensed',
		'dataProvider' => $model->search (),
		'filter' => null,
		'template' => "{summary}{items}{pager}",
		'summaryText' => 'Displaying {start}-{end} of {count} results.',
		'columns' => array (

				array (
						'name' => 'Author',
						'header' => 'Auteur',
						'value' => '($data->author ? $data->author->Fullname : "") ' 
				),
				array (
						'name' => 'Child',
						'header' => 'Enfant',
						'type' => 'raw',
						'value'=>'$data->child ? CHtml::link($data->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->child->Id))) : ""'
				),
				array (
						'name' => 'DateCreated',
						'header' => "date de création"
				),

				array (
						$forwarded = 'name' => 'IsForwarded';
						if ($forwarded == '1'){
						'name' => 'oui',
						}
						else{
						'name' => 'non',
						}
						
						
						'header' => 'transmis ?',
					
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
