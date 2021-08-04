<?php
/* @var $this DiagnozaController */
/* @var $model Diagnoza */

$this->breadcrumbs=array(
	'Diagnozas'=>array('index'),
	'Create',
);


?>

<h1>Nowa diagnoza</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>