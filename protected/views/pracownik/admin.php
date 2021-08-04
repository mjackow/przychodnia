<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracowniks'=>array('index'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pracownik-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pracownicy</h1>

<?php echo CHtml::link('Szukanie Zaawansowane','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
Yii::import('zii.widgets.grid.CGridView2');
$this->widget('zii.widgets.grid.CGridView2', array(
	'id'=>'pracownik-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idPracownik',
		'login',

		'email',
		'data_rejestracji',
		'imie',

		'imie_drugie',
		'nazwisko',
		'stanowisko',
		
		array(
			'class'=>'CButtonColumn2',
		),
	),
)); ?>
