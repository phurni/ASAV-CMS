<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'Liste des Medias','url'=>array('index')),
	array('label'=>'Supprimer Media','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),

);


?>

<h1>Consulter Media : #<?php echo $model->Title; ?></h1>

<div class="wideFields">
	<div class="row-fluid">	
		<div class="span12">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Title')); ?>:
		</b>
		<?php echo CHtml::encode($model->Title); ?>
		</div>
	</div>	
	<div class="row-fluid">	
		
		<div class="span4">
			<b>
			<?php echo CHtml::encode($model->getAttributeLabel('Author')); ?>:
			</b>
			<?php echo CHtml::encode($model->author->Fullname); ?>
		</div>
	
		<div class="span4">
			<b>
			<?php echo CHtml::encode($model->getAttributeLabel('Child')); ?>:
			</b>
			<?php if ($model->child != null){
			echo CHtml::encode($model->child->Fullname);
			} ?>
		</div>


		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Path')); ?>:
		</b>
		<?php echo CHtml::encode($model->Path); ?>
		</div>
		

		
	</div>	
</div>