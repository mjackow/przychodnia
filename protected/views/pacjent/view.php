<?php
/* @var $this PacjentController */
/* @var $model Pacjent */

$this->breadcrumbs=array(
	'Pacjent'=>array('index'),
	$model->idPacjent,
);
	$roles=Yii::app()->authManager->getRoles(Yii::app()->user->id);
foreach ($roles as $role)
    	$role->name;
    	if ($role->name =='lekarska' || $role->name =='pielegniarka'){
	$this->menu=array(
	array('label'=>'Wizyty pacjenta', 'url'=>array('/Wizyta/pacjent' , 'id'=>$model->idPacjent)),
	);
	}
	else if ($role->name =='recepcja'){
		$this->menu=array(
		array('label'=>'Wizyty pacjenta', 'url'=>array('/Wizyta/pacjent' , 'id'=>$model->idPacjent)),
		array('label'=>'Edytuj pacjenta', 'url'=>array('update', 'id'=>$model->idPacjent)),
		array('label'=>'Usuń pacjenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPacjent),'confirm'=>'Czy napewno chcesz usunąć Pacjenta z bazy danych?')),
	);
	}

?>

<h1>Pacjent #<?php echo $model->idPacjent; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPacjent',
		'imie',
		'imie_drugie',
		'nazwisko',
		'pesel',
		'ulica',
		'nr_domu',
		'nr_mieszkania',
		'miejscowosc',
		'kod_pocztowy',
		'Poczta',
	),
)); ?>
