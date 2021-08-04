<?php
/* @var $this DiagnozaController */
/* @var $model Diagnoza */

$this->breadcrumbs=array(
	'Diagnozas'=>array('index'),
	$model->idDiagnoza=>array('view','id'=>$model->idDiagnoza),
	'Update',
);


?>

<h1>Edytuj diagnozę <?php echo $model->idDiagnoza; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>