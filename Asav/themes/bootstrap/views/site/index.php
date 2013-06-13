<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app ()->name;
?>

<p class="SiteIndexIntro">
	<img src="images/logoasav.png" alt="Logo ASAV ONG"
		class="SiteIndexLogo" />
	<br /><br />
	Bienvenue sur le site intranet de <?php echo Yii::app ()->name; ?>.
	<br /><br />
	<a class="btn btn-large" href="<?php echo Yii::app()->createUrl("site/login"); ?>">Connexion à l'intranet</a>
</p>