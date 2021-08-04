<?php
/* @var $this PracownikController */
/* @var $data Pracownik */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPracownik')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPracownik), array('view', 'id'=>$data->idPracownik)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_rejestracji')); ?>:</b>
	<?php echo CHtml::encode($data->data_rejestracji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imie')); ?>:</b>
	<?php echo CHtml::encode($data->imie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imie_drugie')); ?>:</b>
	<?php echo CHtml::encode($data->imie_drugie); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('nazwisko')); ?>:</b>
	<?php echo CHtml::encode($data->nazwisko); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stanowisko')); ?>:</b>
	<?php echo CHtml::encode($data->stanowisko); ?>
	<br />



</div>