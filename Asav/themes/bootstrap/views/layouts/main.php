<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="fr" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php
$isInTeam = isset(Yii::app()->user->user) && Yii::app()->user->user->IsInTeam();

$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=> Yii::app()->name,
    'brandUrl'=> '.',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
            	// Administration
            		array('label'=>'Administration', 'url'=>'#', 'visible'=>$isInTeam, 'items'=>array(
            				array('label'=>'Dashboard', 'url'=>Yii::app()->createUrl("/dashboard")),
            				array('label'=>'Espace de communication', 'url'=>Yii::app()->createUrl("/staffboard")),
            		)),
            	// Enfants
            	array('label'=>'Enfants', 'url'=>'#', 'visible'=>!Yii::app()->user->IsGuest, 'items'=>array(
            			array('label'=>'Annuaire', 'url'=>Yii::app()->createUrl("/children")),
            			array('label'=>'Créer un enfant', 'url'=>Yii::app()->createUrl("/children/create"), 'visible'=> $isInTeam),
            			array('label'=>'Envoyer un message à un enfant', 'url'=>Yii::app()->createUrl("/childMessage/create")),
            			array('label'=>'Messages envoyés aux enfants', 'url'=>Yii::app()->createUrl("/childMessage")),
            			array('label'=>'Trombinoscope', 'url'=>Yii::app()->createUrl("/children/gallery")),
            	)),
            	//Reports
            	array('label'=>'Rapports', 'url'=>'#', 'visible'=>$isInTeam, 'items'=>array(
            			array('label'=>'Créer un rapport', 'url'=>Yii::app()->createUrl("/report/create")),
            			array('label'=>'Liste des rapports', 'url'=>Yii::app()->createUrl("/report")),
						array('label'=>'Mes rapports', 'url'=>Yii::app()->createUrl("/report/myreports")),
            			array('label'=>'Validation des rapports', 'url'=>Yii::app()->createUrl("/dashboard")),
            	)),
            	// Utilisateurs
            	array('label'=>'Membres', 'url'=>'#', 'visible'=>$isInTeam, 'items'=>array(
            			array('label'=>'Créer un membre', 'url'=>Yii::app()->createUrl("/user/create")),
            			array('label'=>'Liste des membres', 'url'=>Yii::app()->createUrl("/user")),
            			array('label'=>'Mailing', 'url'=>Yii::app()->createUrl("/user/mailing")),
            			array('label'=>'Publipostage', 'url'=>Yii::app()->createUrl("/user/publipostage")),
            	)),
            	// Personnes
            	array('label'=>'Personnes', 'url'=>'#', 'visible'=>$isInTeam, 'items'=>array(
            			array('label'=>'Créer une personne', 'url'=>Yii::app()->createUrl("/person/create")),
            			array('label'=>'Liste des utilisateurs', 'url'=>Yii::app()->createUrl("/person")),
            	)),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
				array('label'=> !Yii::app()->user->isGuest ? Yii::app()->user->user->Firstname .' '. Yii::app()->user->user->Lastname : '', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Connexion', 'url'=>array('/site/login'), 'itemOptions'=> array('id'=>'sign_in'), 'active'=>false, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Déconnexion', 'url'=>array('/site/logout'), 'itemOptions'=> array('id'=>'sign_in'), 'active'=>false, 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
));
?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<p class="center">
			<br /><br /><br />
			Copyright &copy; <?php echo date('Y') . ' ' . Yii::app()->name; ?>, tous droits réservés.
		</p>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
