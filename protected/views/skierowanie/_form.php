<?php
/* @var $this SkierowanieController */
/* @var $model Skierowanie */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skierowanie-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'do'); ?>
		<?php echo $form->textarea($model,'do',array(style=>"width: 500px; height: 100px")); ?>
		<?php echo $form->error($model,'do'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cel_porady'); ?>
		<?php echo $form->textarea($model,'cel_porady',array(style=>"width: 500px; height: 100px"));; ?>
		<?php echo $form->error($model,'cel_porady'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Badania'); ?>
		<?php echo $form->textarea($model,'Badania',array(style=>"width: 500px; height: 100px")); ?>
		<?php echo $form->error($model,'Badania'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->