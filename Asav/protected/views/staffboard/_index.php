<?php
/* @var $this StaffboardController */
/* @var $data Staffboard */
?>

<div class="view StaffboardElement">

	<!--  Actions -->
	<p class="right">
		<a data-original-title="Voir" class="view" rel="tooltip" href="<?php echo Yii::app()->createUrl("/staffboard/view", array('id' => $data->Id)); ?>"><i class="icon-eye-open"></i></a> 
		<a data-original-title="Mettre à jour" class="update" rel="tooltip" href="<?php echo Yii::app()->createUrl("/staffboard/update", array('id' => $data->Id)); ?>"><i class="icon-pencil"></i></a> 
		<a data-original-title="Supprimer" class="delete" rel="tooltip" href="<?php echo Yii::app()->createUrl("/staffboard/delete", array('id' => $data->Id)); ?>"><i class="icon-trash"></i></a>
	</p>
	<!-- Title -->
	<p class="title">
		<span>
			<?php 
			echo $data->Title;
			?>
		</span>
		<br />
		<!-- Author & Date -->
		<?php 
		echo $data->author->getFullname() .' - '. date('d.m.Y', strtotime($data->DateCreated));
		?>
	</p>
	<p class="justify">
	<!-- Message -->
	<?php 
	echo $data->Content;
	?>
	</p>
	<!-- Attached media -->
	<div class="row-fluid">
		<div class="span4">
			<p>
			<?php
			if (count ( $data->medias ) > 0) {
				echo '<br /><b>Fichiers attachés</b><br /><blockquote>';
				foreach ( $data->medias as $media ) {
					echo '<a href="'. Yii::app()->createUrl("media/file?path=" . dirname($media->Path)) .'">' . $media->Title . ' (' . pathinfo ( $media->Path, PATHINFO_FILENAME ) . '.' . pathinfo ( $media->Path, PATHINFO_EXTENSION ) . ')</a><br />';
				}
				echo '</blockquote>';
			}
			?>
			</p>
		</div>
	</div>
</div>