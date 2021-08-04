<?php
/* @var $this WizytaController */
/* @var $model Wizyta */

$this->breadcrumbs=array(
	'Wizytas'=>array('index'),
	'Create',
);

?>

<h1>Utwórz wizytę</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>