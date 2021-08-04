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

	<p class="note">Pola <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'haslo'); ?>
		<?php echo $form->passwordField($model,'haslo',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'haslo'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->