<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app ()->name;
?>

<p class="SiteIndexIntro">
	<img src="images/logoasav.png" alt="Logo ASAV ONG"
		class="SiteIndexLogo" />
	<br /><br />
	Bienvenue sur le site intranet de <?php echo Yii::app ()->name; ?>.
	<br />
	<a href="<?php echo Yii::app()->createUrl("site/login"); ?>">Connectez-vous</a> afin de bénéficier de vos accès.
</p>