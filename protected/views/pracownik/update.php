<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownik'=>array('index'),
	$model->idPracownik=>array('view','id'=>$model->idPracownik),
	'Update',
);

$this->menu=array(
	array('label'=>'Edytuj hasło', 'url'=>array('haslo', 'id'=>$model->idPracownik)),
);
?>

<h1>Aktualizuj pracownika <?php echo $model->idPracownik; ?></h1>

<?php $this->renderPartial('_form2', array('model'=>$model)); ?>