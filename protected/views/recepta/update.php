<?php
/* @var $this ReceptaController */
/* @var $model Recepta */

$this->breadcrumbs=array(
	'Receptas'=>array('index'),
	$model->idRecepta=>array('view','id'=>$model->idRecepta),
	'Update',
);

?>

<h1>Edytuj receptę <?php echo $model->idRecepta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'pozycjaRecepta'=>$pozycjaRecepta,
		'validatedPozycja' => $validatedPozycja)); ?>