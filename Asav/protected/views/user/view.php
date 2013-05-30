<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Liste des utilisateurs', 'url'=>array('index')),
	array('label'=>'Créer un utilisateur', 'url'=>array('create')),
	array('label'=>'Modifier un utilisateur', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Supprimer un utilisateur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Utilisateur : #<?php echo $model->Id; ?></h1>


<div class="wideFields">
	
<div class="row-fluid">	

		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Lastname')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Lastname); ?>		
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Firstname')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Firstname); ?>			
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Genre')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->genre->Name); ?>			
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Group')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->group->Name); ?>			
		</div>
	</div><!-- end row-fluid -->
	<br>
	<div class="row-fluid">	
	
	<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Birthday')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Birthday); ?>		
		</div>
	
	
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Email')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Email); ?>		
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Username')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Username); ?>		
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Password')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Password); ?>		
		</div>
	
	</div> <!-- end row-fluid -->
	<br>
	<div class="row-fluid">	
	
	<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Country')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Country); ?>		
	</div>
	
	<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Town')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Town); ?>		
	</div>
	
	<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Address')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->Address); ?>		
	</div>
	
	<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('ZipCode')); ?>:
		</b><br>
		<?php echo CHtml::encode($model->ZipCode); ?>		
	</div>
	
	</div> <!-- end row-fluid -->
		
	
</div> <!-- end wideFields -->
<br>
