<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
		'Reports'=>array('index'),
		$model->Id,
);

$this->menu=array(
		array('label'=>'Liste des Rapports', 'url'=>array('index')),
		array('label'=>'Créer Rapport', 'url'=>array('create')),
		array('label'=>'Modifier Rapport', 'url'=>array('update', 'id'=>$model->Id)),
		array('label'=>'Supprimer Rapport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce rapport?')),

);
?>


<h1>Rapport : <?php echo CHtml::encode($model->Id);?></h1>
<?php 
$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
$status=CHtml::listData(Reportstatus::model()->findAll(), 'Id', 'Status');
?>
<div class="wideFields">
	


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
		
		<div class="span2">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Date')); ?>:
		</b>
		<?php echo CHtml::encode($model->Day); ?>		
		</div>
		
		<div class="span2">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Status')); ?>:
		</b>
		<?php echo CHtml::encode($model->status->Status); ?>		
		</div>
	</div>
	<div class="row-fluid">
		<p>
		<div class="row">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Actions nutritions')); ?>:
		</b>
		<?php echo CHtml::encode($model->ActionsNutricient); ?>		
		</div>
		</p>
		
		<p>
		<div class="row">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Actions école')); ?>:
		</b>
		<?php echo CHtml::encode($model->ActionsSchcool); ?>		
		</div>
		</p>
	
		<p>
		<div class="row">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Actions divers')); ?>:
		</b>
		<?php echo CHtml::encode($model->ActionsOther); ?>		
		</div>
		</p>
	
		<p>
		<div class="row">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Notes nutritions')); ?>:
		</b>
		<?php echo CHtml::encode($model->NoteNutricient); ?>		
		</div>
		</p>
		
		<p>
		<div class="row">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Notes école')); ?>:
		</b>
		<?php echo CHtml::encode($model->NoteSchool); ?>		
		</div>
		</p>
		
		<p>
		<div class="row">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Notes divers')); ?>:
		</b>
		<?php echo CHtml::encode($model->NoteOther); ?>		
		</div>
		</p>		
	</div>

</div>

