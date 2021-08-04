<?php
/* @var $this PracownikController */
/* @var $model Pracownik */

$this->breadcrumbs=array(
	'Pracownik'=>array('index'),
	$model->idPracownik,
);

$roles=Yii::app()->authManager->getRoles(Yii::app()->user->id);
foreach ($roles as $role)
    	$role->name;
    	if ($role->name =='admin'){
$this->menu=array(
	array('label'=>'Edytuj pracownika', 'url'=>array('update', 'id'=>$model->idPracownik)),
);}
?>

<h1>Pracownik #<?php echo $model->idPracownik; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPracownik',
		'login',
		'email',
		'data_rejestracji',
		'imie',
		'imie_drugie',
		'nazwisko',
		'stanowisko',
	),
)); ?>
