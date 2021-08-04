<?php
/* @var $this SkierowanieController */
/* @var $model Skierowanie */

$this->breadcrumbs=array(
	'Skierowanies'=>array('index'),
	'Create',
);


?>

<h1>Nowe skierowanie</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>