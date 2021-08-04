<?php
/* @var $this PacjentController */
/* @var $model Pacjent */

$this->breadcrumbs=array(
	'Pacjent'=>array('index'),
	'Create',
);

?>

<h1>Dodaj pacjenta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>