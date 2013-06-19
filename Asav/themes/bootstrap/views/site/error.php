<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app ()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Erreur',
)); ?>
<p>Vous ne disposez pas des droits nécessaires pour accéder à cette page.</p>
<?php $this->endWidget(); ?>