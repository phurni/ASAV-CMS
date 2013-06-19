<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	"mailing",
);
$this->menu=array(
		array('label'=>'Liste des membres', 'url'=>array('index')),
		array('label'=>'Créer un membre', 'url'=>array('create')),
		array('label'=>'Mailing', 'url'=>array('mailing')),
		array('label'=>'Publipostage', 'url'=>array('publipostage')),
);
?>

<h1>mailing</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>"wideFields"),
));
?>

<div class="row-fluid">
	<div class="span3">
		<h4>Tags</h4>
		<ul class="nav tags nav-tabs nav-stacked">
			<?php
				foreach ($tags as $index => $tag){
					echo "<li title='" . CHtml::encode($tag[1]) . "'><a href='#" . $tag[0] . "'>" . $index . "</a></li>";
				}
			?>
		</ul>
	</div>
	<div class="span8">
		<div class="row">
			<label>Destinataires</label>
			<div class="mail-dest"><?php
			$mails = array();
			foreach($dp->getData() as $data){
				$mails[] = CHtml::encode($data->Fullname);
			}
			echo implode(", ", $mails);
			?></div>
		</div>
		<div class="row">
			<label for="subject">Sujet</label>
			<input id="subject" name="subject" type="text"/>
		</div>
		<div class="row">
			<label for="message">Message</label>
			<textarea id="message" name="message"></textarea>
		</div>
		<div class="row">
			<br/>
			<input type="hidden" name="step" value="send" />
			<input type="submit" value="envoyer" class="btn"/>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>

<script src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		CKEDITOR.replace("message");
		$("ul.tags a").click(function(event){
			event.preventDefault();
			CKEDITOR.instances.message.insertText("{"+ $(this).attr("href").replace("#", "") +"}");
		});
	});
</script>