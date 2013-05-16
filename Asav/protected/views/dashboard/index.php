<?php
/* @var $this DashboardController */

$this->breadcrumbs = array (
		'Dashboard' 
);
?>
<h1>Dashboard</h1>
<p>
	Vous êtes connecté en tant que <strong>
	<?php echo Yii::app()->user->user->Firstname .' '. Yii::app()->user->user->Lastname; ?></strong> 
	(rôle: <?php echo Yii::app()->user->user->group->Name; ?>).
	<br /><br />
</p>

<h4>Liste des rapports à valider</h4>
<?php
$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'type' => 'striped bordered condensed',
		'dataProvider' => $reportProvider,
		'filter' => null,
		'template' => "{items}{pager}",
		'htmlOptions' => array (
				'class' => 'DashboardIndexTable' 
		),
		'columns' => array (
				array (
						'name' => 'Id',
						'header' => '#' 
				),
				array (
						'name' => 'Author',
						'header' => 'Auteur',
						'value' => '($data->author ? $data->author->Fullname : "") ' 
				),
				array (
						'name' => 'Child',
						'header' => 'Enfant',
						'type' => 'raw',
						'value' => '$data->child ? CHtml::link($data->child->Fullname, Yii::app()->createUrl("/children/view", array("id"=>$data->child->Id))) : ""' 
				),
				array (
						'name' => 'Type',
						'header' => 'Type',
						'value' => '$data->type->Name' 
				),
				array (
						'name' => 'Day',
						'header' => 'Date' 
				),
				array (
						'class' => 'bootstrap.widgets.TbButtonColumn',
						'template' => '{update}',
						'updateButtonUrl' => 'Yii::app()->createUrl("/Report/update", array("id" => $data->Id))',
						'htmlOptions' => array (
								'style' => 'width: 20px' 
						) 
				) 
		) 
) );

?>