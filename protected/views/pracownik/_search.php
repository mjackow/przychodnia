<?php
/* @var $this PracownikController */
/* @var $model Pracownik */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPracownik'); ?>
		<?php echo $form->textField($model,'idPracownik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_rejestracji'); ?>
		<?php echo $form->textField($model,'data_rejestracji'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imie_drugie'); ?>
		<?php echo $form->textField($model,'imie_drugie',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stanowisko'); ?>
		<?php echo $form->textField($model,'stanowisko',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->