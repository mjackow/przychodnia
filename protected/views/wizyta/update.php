<?php
/* @var $this WizytaController */
/* @var $model Wizyta */

$this->breadcrumbs=array(
	'Wizytas'=>array('index'),
	$model->idWizyta=>array('view','id'=>$model->idWizyta),
	'Update',
);


?>

<h1>Aktualizuj wizytę <?php echo $model->idWizyta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>