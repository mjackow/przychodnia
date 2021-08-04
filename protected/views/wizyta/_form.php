<?php
/* @var $this WizytaController */
/* @var $model Wizyta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wizyta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'data_wizyty'); ?>
		<?php echo $form->dateField($model,'data_wizyty',array(style=>"width: 400px; ", 'min'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'data_wizyty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'godzina_wizyty'); ?>
		<?php echo $form->textField($model,'godzina_wizyty',array(style=>"width: 400px; ")); ?>
		<?php echo $form->error($model,'godzina_wizyty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pacjent_idPacjent'); ?>
		<?php echo $form->textField($model,'Pacjent_idPacjent',array(style=>"width: 400px; ")); ?>
		<?php echo $form->error($model,'Pacjent_idPacjent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pracownik_idPracownik'); ?>
		<?php echo $form->dropDownList($model,'Pracownik_idPracownik',CHTML::listData(Pracownik::model()->findAll(array('condition'=>'stanowisko=:stanowisko','params'=>array(':stanowisko'=>'lekarz'),)), 'idPracownik', 'fullname'),array(style=>"width: 400px; ")); ?>
		<?php echo $form->error($model,'Pracownik_idPracownik'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->