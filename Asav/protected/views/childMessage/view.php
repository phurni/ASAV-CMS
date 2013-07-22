<?php
$this->breadcrumbs=array(
	'Messages aux enfants'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Liste des Messages','url'=>array('index')),
	array('label'=>'Consulter les média liés', 'url'=>array('media/index?type=childmessage&&id='. $model->Id)),
	array('label'=>'Créer un Message','url'=>array('create')),
	array('label'=>'Modifier un Message','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Supprimer un Message','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce message ?')),

);
?>

<h1>Consulter Message : #<?php echo $model->Id; ?></h1>

<div class="wideFields">
<br>	
<div class="row-fluid">	
	<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Autheur')); ?>:
		</b>
		<?php echo CHtml::encode($model->author->Fullname); ?>			
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Enfant')); ?>:
		</b>
		<?php echo CHtml::encode($model->child->Fullname); ?>			
		</div>
	</div>
	
	
	<div class="row-fluid">	

		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('DateCreated')); ?>:
		</b>
		<?php echo CHtml::encode($model->DateCreated); ?>		
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('IsForwarded')); ?>:
		</b>
		<?php echo CHtml::encode($model->IsForwarded ? "oui" : "non"); ?>		
		</div>
		
</div>		

	<div class="row-fluid">	
		
		<div class="span11">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Message')); ?>:
		</b><br />
		<?php echo CHtml::encode($model->Message); ?>		
		</div>
		
</div>		

<!-- Attached media -->
	<div class="row-fluid">
		<div class="span4">
			<p>
			<?php
			if (count ( $model->medias ) > 0) {
				echo '<br /><b>Fichiers attachés</b><br /><blockquote>';
				foreach ( $model->medias as $media ) {
					echo '<a href="'. Yii::app()->createUrl("media/file?path=" . dirname($media->Path)) .'">' . $media->Title . ' (' . pathinfo ( $media->Path, PATHINFO_FILENAME ) . '.' . pathinfo ( $media->Path, PATHINFO_EXTENSION ) . ')</a><br />';
				}
				echo '</blockquote>';
			}
			?>
			</p>
		</div>
	</div>

</div>
<br>