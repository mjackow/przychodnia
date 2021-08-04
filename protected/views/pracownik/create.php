<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownik'=>array('index'),
	'Create',
);


?>

<h1>Dodaj pracownika</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>