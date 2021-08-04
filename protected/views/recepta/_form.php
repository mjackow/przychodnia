<?php
/* @var $this ReceptaController */
/* @var $model Recepta */
/* @var $form CActiveForm */
/* @var $pozycjaRecepta PozycjaRecepta */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recepta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary(array_merge(array($model),$validatedPozycja)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'oddzial_NFZ'); ?>
		<?php echo $form->dropDownList($model,'oddzial_NFZ',array('1'=>'Dolnosląskie', '2'=>'Kujawsko-Pomorskie', '3'=>'Lubelskie', '4'=>'Lubuskie', '5'=>'Łódzkie', '6'=>'Małopolskie', '7'=>'Mazowieckie', '8'=>'Opolskie', '9'=>'Podkarpackie', '10'=>'Podlaskie', '11'=>'Pomorskie', '12'=>'Śląskie', '13'=>'Świętokrzyskie', '14'=>'Warmińsko-Mazurskie', '15'=>'Wielkopolskie', '16'=>'Zachodniopomorskie')); ?>
		<?php echo $form->error($model,'oddzial_NFZ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uprawnienia'); ?>
		<?php echo $form->dropDownList($model,'uprawnienia',array('X'=>'brak uprawnień', 'AZ'=>'pracownicy i byli pracownicy zakładów produkujących wyroby zawierające azbest','BW'=>'pacjenci którzy posiadają uprawnienia do świadczeń opieki zdrowotnej na podstawie decyzji władz samorządowych', 'CN'=>'nieubezpieczone kobiety podczas ciąży', 'DN'=>'osoby nieubezpieczone do ukończenia 18 roku życia', 'IB'=>'inwalidzi wojenni', 'IW'=>'inwalidzi wojskowi', 'PO'=>'żołnierze, którzy odbywają zasadniczą służbę wojskową', 'IN'=>'pacjenci inni niż ubezpieczeni, którzy posiadają uprawnienia do bezpłatnych świadczeń opieki zdrowotnej', 'WP'=>'żołnierze zawodowi', 'ZK'=>'Zasłużeni Honorowi Dawcy Krwi')); ?>
		<?php echo $form->error($model,'uprawnienia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_realizacji'); ?>
		<?php echo $form->dateField($model,'data_realizacji',array('min'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'data_realizacji'); ?>
	</div>

	<?php

	// see http://www.yiiframework.com/doc/guide/1.1/en/form.table
	// Note: Can be a route to a config file too,
	//       or create a method 'getMultiModelForm()' in the member model

	$pozycjareceptaFormConfig = array(
			'elements'=>array(
					'nazwa'=>array(
							'type'=>'text',
							'maxlength'=>45,
					),
					'odplatnosc'=>array(
							'type'=>'text',
							'maxlength'=>11,
					),
			));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'idpozycja_recepta', //the unique widget id
			'formConfig' => $pozycjareceptaFormConfig, //the form configuration array
			'model' => $pozycjaRecepta, //instance of the form model

		//if submitted not empty from the controller,
		//the form will be rendered with validation errors
			'validatedItems' => $validatedPozycja,

		//array of member instances loaded from db
			'data' => $pozycjaRecepta->findAll('Recepta_idRecepta=:Recepta_idRecepta', array(':Recepta_idRecepta'=>$model->idRecepta)),
	));
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
		<a href="javascript:history.back();">Wstecz</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->