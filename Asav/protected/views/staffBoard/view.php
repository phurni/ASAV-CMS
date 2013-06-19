<?php
/* @var $this StaffBoardController */
/* @var $model StaffBoard */

$this->breadcrumbs=array(
	'Espace de communication'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'Créer un message', 'url'=>array('create')),
	array('label'=>'Espace de communication', 'url'=>array('index')),
	array('label'=>'Mettre à jour du message', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Suppression du message', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo $model->Title; ?></h1>

<div class="view StaffboardElement">

	<!-- Title -->
	<p class="title">
		<span>
			<?php 
			echo $model->Title;
			?>
		</span>
		<br />
		<!-- Author & Date -->
		<?php 
		echo $model->author->getFullname() .' - '. substr($model->DateCreated, 0, 10);
		?>
	</p>
	<p class="justify">
	<!-- Message -->
	<?php 
	echo $model->Content;
	?>
	</p>
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