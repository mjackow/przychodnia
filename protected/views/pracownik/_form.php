<?php
/* @var $this PracownikController */
/* @var $model Pracownik */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pracownik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'haslo'); ?>
		<?php echo $form->passwordField($model,'haslo',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'haslo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'imie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imie_drugie'); ?>
		<?php echo $form->textField($model,'imie_drugie',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'imie_drugie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'nazwisko'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stanowisko'); ?>
		<?php echo $form->dropDownList($model,'stanowisko',array('lekarz'=>'lekarz','pielegniarka'=>'pielegniarka', 'recepcjonista'=>'recepcjonista'));?>
		<?php echo $form->error($model,'stanowisko'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->