<?php
/* @var $this SponsorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parrainage',
);
?>

<h1>Parrainage</h1>

<?php
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
));

$countries=CHtml::listData(Country::model()->findAll(), 'Id', 'Name');
$genres=CHtml::listData(Genre::model()->findAll(), 'Id', 'Name');

?>
<div class="view">

<?php echo $form->textFieldRow($model, 'Firstname'); ?>
<?php echo $form->textFieldRow($model, 'Lastname'); ?>
<?php echo $form->dropDownListRow($model, 'Country', $countries); ?>
<?php echo $form->dropDownListRow($model, 'Genre', $genres); ?>

</div>

<?php $this->endWidget(); ?>

<?php
/*
$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->sponsor(),
	'filter'=>null,
    'template'=>"{summary}{items}{pager}",
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'columns'=>array(
    	array('name'=>'sponsor', 'value'=>'$data->Fullname'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));
*/

?>