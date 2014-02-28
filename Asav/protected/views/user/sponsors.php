<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$action,
);


if($action == "mailing"){
	$this->menu=array(
		array('label'=>'Liste des membres', 'url'=>array('index')),
		array('label'=>'Créer un membre', 'url'=>array('create')),
		array('label'=>'Publipostage', 'url'=>array('publipostage')),
	);
}else if($action == "publipostage"){
	$this->menu=array(
		array('label'=>'Liste des membres', 'url'=>array('index')),
		array('label'=>'Créer un membre', 'url'=>array('create')),
		array('label'=>'Mailing', 'url'=>array('mailing')),
	);
}


if(isset($sended)){
	?><div class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Email envoyé</strong> Votre email à bien été corectement envoyé.
</div><?php
}
?>

<h1><?php echo $action ?></h1>

<form action="" method="post">
<?php
$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'type' => 'striped bordered condensed',
		'dataProvider' => $dp,
		'filter' => null,
		'template' => "{summary}{items}{pager}",
		'summaryText' => 'Displaying {start}-{end} of {count} results.',
		'columns' => array (
				
				array (
						'type' => 'raw',
						'value' =>  '"<input type=\"checkbox\" value=\"" . $data->Id . "\" name=\"row" . $data->Id . "\"/>"',
						'header' => '<a href="#" class="select-all">Tous</a>/<a href="#" class="select-none">Aucun</a>',
						'htmlOptions'=>array('width'=>'85px', 'style' => 'text-align:center')
				),
				array (
						'name' => 'Firstname',
						'header' => 'Prénom'
				),
				array (
						'name' => 'Lastname',
						'header' => 'Nom'
				),
				array (
						'name' => 'Genre',
						'header' => 'Genre',
						'value' => '$data->genre->Name'
				),
				array (
						'name' => 'Group',
						'header' => 'Groupe',
						'value' => '$data->group->Name'
				)
		)
) );


?>
<input type="hidden" name="step" value="select" />
<input type="submit" class="btn" value="<?php echo ($action == "publipostage" ? "exporter" : "envoyer") ?>" />
</form>
<script type="text/javascript">
	/*
		Executed when the page is fully loaded.
	*/
	$(function() {
		// Add the select all/none function
		$(".select-all").click(function(e) {
			e.preventDefault();
			$(this).closest("form").find("input[type='checkbox']").attr("checked", true);
		});
		$(".select-none").click(function(e) {
			e.preventDefault();
			$(this).closest("form").find("input[type='checkbox']").attr("checked", false);
		});
	});
</script>