<?php
/* @var $this PacjentController */
/* @var $model Pacjent */

$this->breadcrumbs=array(
	'Pacjent'=>array('index'),
	$model->idPacjent=>array('view','id'=>$model->idPacjent),
	'Update',
);
?>

<h1>Aktualizuj pacjenta <?php echo $model->idPacjent; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>