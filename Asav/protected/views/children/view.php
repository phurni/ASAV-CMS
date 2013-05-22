<?php
/* @var $this ChildController */
/* @var $dp Child */
/* @var $form CActiveForm */

$this->breadcrumbs = array (
		'Enfants' => array (
				'index' 
		),
		$dp->Id 
);

$this->menu = array (
		array (
				'label' => 'Liste des Enfants',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Créer Enfant',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Modifier Enfant',
				'url' => array (
						'update',
						'id' => $dp->Id 
				) 
		),
		array (
				'label' => 'Supprimer Enfant',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $dp->Id 
						),
						'confirm' => 'Êtes-vous sûr vous supprimer cet enfant?' 
				) 
		) 
);
?>

<h1>Enfant : #<?php echo $dp->Id; ?></h1>

<?php
$authors = CHtml::listData ( User::model ()->findAll (), 'Id', 'Fullname' );
$child = $dp->data [0];

// print_r($child);
// die();
?>


<div class="wideFields">

	<div class="row-fluid">


		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Firstname')); ?>:
		</b>
		<?php echo CHtml::encode($child->Firstname); ?>		
		</div>

		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Lastname')); ?>:
		</b>
		<?php echo CHtml::encode($child->Lastname); ?>		
		</div>

		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Sponsor')); ?>:
		</b>
		<?php echo CHtml::encode(($child->sponsor ? $child->sponsor->Fullname : "")); ?>		
		</div>


	</div>

	<div class="row-fluid">

		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Birthday')); ?>:
		</b>
		<?php echo CHtml::encode($child->Birthday); ?>		
		</div>

		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Genre')); ?>:
		</b>
		<?php echo CHtml::encode($child->genre->Name); ?>		
		</div>

		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Media')); ?>:
		</b>
		<?php echo CHtml::image(isset($child->picture) ? CHtml::encode($child->picture->Path) : '../images/noimage.png'); ?>		
		</div>
	</div>
	<?php
	// Check if the child is hosted somewhere
	foreach ( $child->relationships as $relation ) {
		if ($relation->IsHosted) {
			?>
			<div class="row-fluid">
				<div class="span4">
				<b>
					<?php echo CHtml::encode($child->getAttributeLabel('Adresse')); ?>:
				</b>
				<?php echo '<br />'. $relation->person->Firstname .' '. $relation->person->Lastname .'<br />'. $relation->person->Address .'<br /><br />'; ?>
				</div>
			</div>
			<?php
		}
	}
	?>	
</div>



