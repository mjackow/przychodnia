<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownik'=>array('index'),
	$model->idPracownik=>array('view','id'=>$model->idPracownik),
	'Update',
);

?>

<h1>Aktualizuj pracownika <?php echo $model->idPracownik; ?></h1>

<?php $this->renderPartial('_form3', array('model'=>$model)); ?>