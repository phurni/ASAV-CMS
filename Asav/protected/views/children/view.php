<?php
/* @var $this ChildController */
/* @var $model Child */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Enfants'=>array('index'),
	$model->Id,
);

$this->menu=array(
		array('label'=>'Liste des Enfants', 'url'=>array('index')),
		array('label'=>'Créer Enfant', 'url'=>array('create')),
		array('label'=>'Modifier Enfant', 'url'=>array('update', 'id'=>$model->Id)),
		array('label'=>'Supprimer Enfant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce rapport?')),

);
?>

<h1>Enfant : #<?php echo $model->Id; ?></h1>

<?php 
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
?>


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
		<?php echo CHtml::encode($model->getAttributeLabel('Sponsor')); ?>:
		</b>
		<?php echo CHtml::encode($model->sponsor->Fullname); ?>		
		</div>
		
		
	</div>
	
	<div class="row-fluid">	
	
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Birthday')); ?>:
		</b>
		<?php echo CHtml::encode($model->Birthday); ?>		
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Genre')); ?>:
		</b>
		<?php echo CHtml::encode($model->genre->Name); ?>		
		</div>
		

	
	</div>
</div>