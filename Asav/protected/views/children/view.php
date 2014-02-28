<?php
/* @var $this ChildController */
/* @var $dp Child */
/* @var $form CActiveForm */

$authors = CHtml::listData ( User::model ()->findAll (), 'Id', 'Fullname' );
$child = $dp->data [0];

$this->breadcrumbs = array (
		'Enfants' => array (
				'index' 
		),
		$child->getFullName () 
);

$this->menu = array (
		array (
				'label' => 'Annuaire des enfants',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Consulter le portfolio',
				'url' => array (
						'media/index?type=child&&id=' . $child->Id
				),
				'visible' => $isInTeam
		),
		array (
				'label' => 'Consulter les rapports liés',
				'url' => array (
						'children/' . $child->Id . '/reportsbychild' 
				),
				'visible' => $isInTeam 
		),
		array (
				'label' => 'Créer un enfant',
				'url' => array (
						'create' 
				),
				'visible' => $isInTeam 
		),
		array (
				'label' => 'Modifier l\'enfant',
				'url' => array (
						'update',
						'id' => $child->Id 
				),
				'visible' => $isInTeam 
		),
		array (
				'label' => 'Supprimer l\'enfant',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $child->Id 
						),
						'confirm' => 'Êtes-vous sûr vous supprimer cet enfant?' 
				),
				'visible' => $isInTeam 
		) 
);
?>

<h1><?php echo $child->getFullName(); ?></h1>

<div class="wideFields">

	<div class="row-fluid">
		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Picture')); ?>:
		</b><br />
		<?php echo CHtml::image('../' . Yii::app()->params['custom']['uploadPath'] . (isset($child->picture) ? CHtml::encode($child->picture->Path) : '../../images/noimage.png')); ?>		
		</div>
	</div>

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
		<?php echo CHtml::encode(date('d.m.Y', strtotime($child->Birthday))); ?>		
		</div>

		<div class="span4">
			<b>
		<?php echo CHtml::encode($child->getAttributeLabel('Genre')); ?>:
		</b>
		<?php echo CHtml::encode($child->genre->Name); ?>		
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<b>
			<?php echo CHtml::encode($child->getAttributeLabel('Address')); ?>:
		</b><br />
		<?php echo CHtml::encode($child->host ? $child->host->genre->Name : "aucune"); ?>
		<?php echo CHtml::encode($child->host ? $child->host->Fullname : ""); ?>
		<br />
		<?php echo CHtml::encode($child->host ? $child->host->Address : ""); ?>
		</div>
		<div class="span4">
			<b>
			<?php echo CHtml::encode($child->getAttributeLabel('tutor')); ?>:
		</b><br />
		<?php echo CHtml::encode($child->tutor ?  $child->tutor->genre->Name : "aucun"); ?>
		<?php echo CHtml::encode($child->tutor ?  $child->tutor->Fullname : ""); ?>
		<br />
		<?php echo CHtml::encode($child->tutor ?  $child->tutor->Address : ""); ?>
		</div>
	</div>
	<!-- Attached media -->
	<div class="row-fluid">
		<div class="span4">
			<p>
			<?php
			if (count ( $child->medias ) > 0) {
				echo '<br /><b>Fichiers attachés</b><br /><blockquote>';
				foreach ( $child->medias as $media ) {
					echo '<a href="'. Yii::app()->createUrl("media/file?path=" . dirname($media->Path)) .'">' . $media->Title . ' (' . pathinfo ( $media->Path, PATHINFO_FILENAME ) . '.' . pathinfo ( $media->Path, PATHINFO_EXTENSION ) . ')</a><br />';
				}
				echo '</blockquote>';
			}
			?>
			</p>
		</div>
	</div>
</div>



