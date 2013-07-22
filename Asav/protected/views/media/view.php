<?php
$this->breadcrumbs = array (
		'Media' => array (
				'index' 
		),
		$model->Title 
);

$this->menu = array (
		array (
				'label' => 'Tous les média',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Média liés aux enfants',
				'url' => array (
						'index?type=child' 
				) 
		),
		array (
				'label' => 'Média liés à l\'espace de communication',
				'url' => array (
						'index?type=staffboard' 
				) 
		),
		array (
				'label' => 'Média liés aux messages des enfants',
				'url' => array (
						'index?type=childmessage' 
				) 
		),
		array (
				'label' => 'Média liés aux rapports',
				'url' => array (
						'index?type=report' 
				) 
		),
		array (
				'label' => 'Supprimer le média',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $model->Id 
						),
						'confirm' => 'Are you sure you want to delete this item?' 
				) 
		) 
)
;

?>

<h1><?php echo $model->Title; ?></h1>

<div class="wideFields">
<div class="row-fluid">
		<div class="span4">
			<b>Nom du fichier:</b> 
		<?php echo CHtml::encode(pathinfo($model->Path, PATHINFO_FILENAME) .'.'. pathinfo($model->Path, PATHINFO_EXTENSION)); ?>
	</div>
	</div>
	
	<div class="row-fluid">
		<div class="span4">
			<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Author')); ?>:
		</b>
		<?php echo CHtml::encode($model->author->Fullname); ?>
	</div>
	</div>


	<div class="row-fluid">
		<div class="span4">
			<?php 
				echo CHtml::link('Télécharger', Yii::app()->createUrl('media/file?path='. dirname($model->Path)), array("class" => "btn"));
			?>
		</div>
	</div>

</div>