<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
		'Rapports'=>array('index'),
		$model->Id,
);

$this->menu=array(
		array('label'=>'Liste des rapports', 'url'=>array('index')),
		array('label'=>'Créer un rapport', 'url'=>array('create')),
		array('label'=>'Modifier un rapport', 'url'=>array('update', 'id'=>$model->Id)),
		array('label'=>'Supprimer un rapport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Êtes-vous sûr vous supprimer ce rapport?')),

);
?>


<h1>Rapport : #<?php echo CHtml::encode($model->Id);?></h1>
<?php 
//$children=CHtml::listData(Child::model()->findAll(), 'Id', 'Fullname');
//$authors=CHtml::listData(User::model()->findAll(), 'Id', 'Fullname');
//$status=CHtml::listData(Reportstatus::model()->findAll(), 'Id', 'Status');
//$type=CHtml::listData(Reporttype::model()->findAll(), 'Id', 'Name');
?>
<div class="wideFields">
	
<div class="row-fluid">	
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Status')); ?>:
		</b>
		<?php echo CHtml::encode($model->status->Status); ?>		
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Type')); ?>:
		</b>
		<?php echo CHtml::encode($model->type->Name); ?>			
		</div>


		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Autheur')); ?>:
		</b>
		<?php echo CHtml::encode($model->author->Fullname); ?>		
		</div>
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Enfant')); ?>:
		</b>
		<?php echo CHtml::encode($model->child->Fullname); ?>		
		</div>
</div>


<div class="row-fluid">			
		
		<div class="span3">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('CreationDate')); ?>:
		</b>
		<?php echo CHtml::encode($model->CreationDate); ?>		
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('UpdateDate')); ?>:
		</b>
		<?php echo CHtml::encode($model->UpdateDate); ?>		
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('VisitDate')); ?>:
		</b>
		<?php echo CHtml::encode($model->VisitDate); ?>		
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

