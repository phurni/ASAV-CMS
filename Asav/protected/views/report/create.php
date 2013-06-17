<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs = array (
		'Rapports' => array (
				'index' 
		),
		'Création' 
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
		),
		array (
				'label' => 'Mes rapports',
				'url' => array (
						'myreports' 
				) 
		)
)
;
?>

<h1>Créer un Rapport</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>