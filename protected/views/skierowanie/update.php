<?php
/* @var $this SkierowanieController */
/* @var $model Skierowanie */

$this->breadcrumbs=array(
	'Skierowanies'=>array('index'),
	$model->idSkierowanie=>array('view','id'=>$model->idSkierowanie),
	'Update',
);

?>

<h1>Aktualizuj skierowanie <?php echo $model->idSkierowanie; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>