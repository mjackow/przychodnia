<?php
/* @var $this ReceptaController */
/* @var $model Recepta */

$this->breadcrumbs=array(
	'Receptas'=>array('index'),
	'Create',
);


?>

<h1>Nowa recepta</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'pozycjaRecepta'=>$pozycjaRecepta,
		'validatedPozycja' => $validatedPozycja)); ?>