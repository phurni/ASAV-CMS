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
				),
				'visible' => $isInTeam
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
				),
				'visible' => $isInTeam
		),
		array (
				'label' => 'Mes rapports',
				'url' => array (
						'myreports' 
				),
				'visible' => $isInTeam
		)
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
						'name' => 'CreationDate',
						'header' => 'Création',
          	'value' => 'Yii::app()->dateFormatter->format("dd.MM.yyyy",strtotime($data->CreationDate))'
				),
				array (
						'name' => 'UpdateDate',
						'header' => 'Modification',
          	'value' => 'Yii::app()->dateFormatter->format("dd.MM.yyyy",strtotime($data->UpdateDate))'
				),
				array (
						'name' => 'VisitDate',
						'header' => 'Visite',
        		'value' => 'Yii::app()->dateFormatter->format("dd.MM.yyyy",strtotime($data->VisitDate))'
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