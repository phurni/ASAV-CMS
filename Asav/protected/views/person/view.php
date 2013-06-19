<?php
$this->breadcrumbs=array(
	'Personne'=>array('index'),
	$model->GetFullname(),
);

$this->menu=array(
	array('label'=>'Liste des Personnes','url'=>array('index')),
	array('label'=>'Créer Personne','url'=>array('create')),
	array('label'=>'Modifier Personne','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Supprimer Personne','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1><?php echo $model->GetFullname(); ?></h1>

<div class="wideFields">

	<div class="row-fluid">
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Firstname')); ?>:
		</b>
		<?php echo CHtml::encode($model->Firstname); ?>		
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Lastname')); ?>:
		</b>
		<?php echo CHtml::encode($model->Lastname); ?>		
		</div>
	
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Genre')); ?>:
		</b>
		<?php echo CHtml::encode($model->genre->Name); ?>		
		</div>
	<div class="row-fluid">
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Adresse')); ?>:
		</b>
		<?php echo CHtml::encode($model->Address); ?>		
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Country')); ?>:
		</b>
		<?php echo CHtml::encode($model->country->Name); ?>		
		</div>
	</div>	
		
	</div>

</div>
