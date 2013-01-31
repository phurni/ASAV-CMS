<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>$this->pageTitle,
    'brandUrl'=>'.',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>'.', 'active'=>true),
                array('label'=>'Parrainer un enfant', 'url'=>'#'),
                array('label'=>'Comment nous soutenir', 'url'=>'#', 'items'=>array(
                    array('label'=>'Parrainage', 'url'=>'#'),
                    array('label'=>'Bénévolat', 'url'=>'#'),
                    array('label'=>'Devenir membre', 'url'=>'#'),
                	array('label'=>'Équipement', 'url'=>'#'),
                )),
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Rechercher"></form>',
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'items'=>array(
				array('label'=>'Contact', 'url'=>'#'),
			)
		),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
				array('label'=>'Webmail', 'url'=>'#'),
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
		Copyright &copy; <?php echo date('Y') . ' ' . $this->pageTitle; ?>.<br/>
		All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
