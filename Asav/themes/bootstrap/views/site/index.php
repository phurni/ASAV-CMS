<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
				array('label'=>'Qui sommes nous ?'),
				array('label'=>'Historique', 'url'=>'#'),
				array('label'=>'Nos objectifs', 'url'=>'#'),
				array('label'=>'Nos valeurs', 'url'=>'#'),
				
				array('label'=>'Nos actions'),
				array('label'=>'Nos actions au Bénin', 'url'=>'#'),
				array('label'=>'Nos projets au Bénin', 'url'=>'#'),
				array('label'=>'Nos réalisations', 'url'=>'#'),
				
				array('label'=>'Domaines d\'intervention'),
				array('label'=>'Social', 'url'=>'#'),
				array('label'=>'Éducation et formation', 'url'=>'#'),
				array('label'=>'Santé', 'url'=>'#'),
				
				array('label'=>'Nous soutenir'),
				array('label'=>'Donations ou legs', 'url'=>'#'),
				array('label'=>'Parrainer un enfant', 'url'=>'#'),
				array('label'=>'Participer à nos activités', 'url'=>'#'),
		),
));

?>