<?php
/* @var $this PacjentController */
/* @var $model Pacjent */

$this->breadcrumbs=array(
	'Pacjent'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pacjent-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pacjenci</h1>


<?php echo CHtml::link('Szukanie Zaawansowane','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
Yii::import('zii.widgets.grid.CGridView3');
$this->widget('zii.widgets.grid.CGridView3', array(
	'id'=>'pacjent-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idPacjent',
		'imie',
		'imie_drugie',
		'nazwisko',
		'pesel',
		'ulica',
		/*
		'nr_domu',
		'nr_mieszkania',
		'miejscowosc',
		'kod_pocztowy',
		'Poczta',
		*/
		array(
			'class'=>'CButtonColumn3',
		),
	),
)); ?>
