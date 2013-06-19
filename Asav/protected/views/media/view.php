<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List Media','url'=>array('index')),
	array('label'=>'Create Media','url'=>array('create')),
	array('label'=>'Update Media','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Media','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),

);


?>

<h1>Consulter Media : #<?php echo $model->Id; ?></h1>

<div class="wideFields">
	<div class="row-fluid">	
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('Title')); ?>:
		</b>
		<?php echo CHtml::encode($model->Title); ?>
		</div>
	
	
	
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
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('ChildMessage')); ?>:
		</b>
		<?php if ($model->childMessage != null){
		echo CHtml::encode($model->childMessage->Id);
		} ?>
		</div>
		
		<div class="span4">
		<b>
		<?php echo CHtml::encode($model->getAttributeLabel('StaffBoard')); ?>:
		</b>
		<?php if ($model->staffBoard != null){
		echo CHtml::encode($model->staffBoard->Id);
		} ?>
		</div>
		
	</div>	
</div>