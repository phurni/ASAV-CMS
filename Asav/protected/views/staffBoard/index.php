<?php
/* @var $this StaffBoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espace de communication',
);

$this->menu=array(
	array('label'=>'Créer un article', 'url'=>array('create')),
);
?>

<h1>Espace de communication</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_index',
)); ?>

