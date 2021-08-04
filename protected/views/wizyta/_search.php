<?php
/* @var $this WizytaController */
/* @var $model Wizyta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'data_wizyty'); ?>
		<?php echo $form->textField($model,'data_wizyty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'godzina_wizyty'); ?>
		<?php echo $form->textField($model,'godzina_wizyty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Karta Pacjenta'); ?>
		<?php echo $form->textField($model,'Pacjent_idPacjent'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Szukaj'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->