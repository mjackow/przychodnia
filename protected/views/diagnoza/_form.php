<?php
/* @var $this DiagnozaController */
/* @var $model Diagnoza */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diagnoza-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'Diagnoza'); ?>
		<?php echo $form->textarea($model,'Diagnoza',array(style=>"width: 1000px; height: 200px")); ?>
		<?php echo $form->error($model,'Diagnoza'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Zalecenia'); ?>
		<?php echo $form->textarea($model,'Zalecenia',array(style=>"width: 1000px; height: 200px")); ?>
		<?php echo $form->error($model,'Zalecenia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->