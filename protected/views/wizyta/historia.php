<?php
/* @var $this WizytaController */
/* @var $model Wizyta */

$this->breadcrumbs=array(
	'Wizytas'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#wizyta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Wizyty</h1>

<?php echo CHtml::link('Szukanie Zaawansowane','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
Yii::import('zii.widgets.grid.CGridView3');
 $this->widget('zii.widgets.grid.CGridView3', array(
	'id'=>'wizyta-grid',
	'dataProvider'=>$model->search3(),
	'filter'=>$model,
	'columns'=>array(
		'data_wizyty',
		'godzina_wizyty',
		'Pacjent_idPacjent:Karta Pacjenta',
		array(
			'class'=>'CButtonColumn3',
		),
	),
)); ?>
