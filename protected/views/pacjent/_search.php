<?php
/* @var $this PacjentController */
/* @var $model Pacjent */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPacjent'); ?>
		<?php echo $form->textField($model,'idPacjent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imie_drugie'); ?>
		<?php echo $form->textField($model,'imie_drugie',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pesel'); ?>
		<?php echo $form->textField($model,'pesel',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ulica'); ?>
		<?php echo $form->textField($model,'ulica',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nr_domu'); ?>
		<?php echo $form->textField($model,'nr_domu',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nr_mieszkania'); ?>
		<?php echo $form->textField($model,'nr_mieszkania',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miejscowosc'); ?>
		<?php echo $form->textField($model,'miejscowosc',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kod_pocztowy'); ?>
		<?php echo $form->textField($model,'kod_pocztowy',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Poczta'); ?>
		<?php echo $form->textField($model,'Poczta',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->