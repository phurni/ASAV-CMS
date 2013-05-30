<?php
/* @var $this ReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array (
		'Rapports' 
);

$this->menu = array (
		array (
				'label' => 'Créer un rapport',
				'url' => array (
						'create'
				)
		),
		array (
				'label' => 'Liste des rapports',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Liste des rapports à valider',
				'url' => array (
						'dashboard/'
				)
		)
);
?>

<h1>Rapports</h1>

<?php
/*
 * $this->widget('zii.widgets.CListView', array( 'dataProvider'=>$dataProvider,
 * 'itemView'=>'_view', ));
 */

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
						'name' => 'Type',
						'header' => 'Type',
						'value' => '$data->type->Name' 
				),
				array (
						'name' => 'Status',
						'header' => 'Status',
						'value' => '$data->status->Status' 
				),
				array (
						'name' => 'Day',
						'header' => 'Date' 
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