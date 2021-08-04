<?php
/* @var $this PacjentController */
/* @var $model Pacjent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pacjent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'imie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imie_drugie'); ?>
		<?php echo $form->textField($model,'imie_drugie',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'imie_drugie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nazwisko'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pesel'); ?>
		<?php echo $form->textField($model,'pesel',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'pesel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ulica'); ?>
		<?php echo $form->textField($model,'ulica',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ulica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nr_domu'); ?>
		<?php echo $form->textField($model,'nr_domu',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'nr_domu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nr_mieszkania'); ?>
		<?php echo $form->textField($model,'nr_mieszkania',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'nr_mieszkania'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'miejscowosc'); ?>
		<?php echo $form->textField($model,'miejscowosc',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'miejscowosc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kod_pocztowy'); ?>
		<?php echo $form->textField($model,'kod_pocztowy',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'kod_pocztowy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Poczta'); ?>
		<?php echo $form->textField($model,'Poczta',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Poczta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->