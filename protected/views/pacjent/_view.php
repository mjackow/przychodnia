<?php
/* @var $this PacjentController */
/* @var $data Pacjent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPacjent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPacjent), array('view', 'id'=>$data->idPacjent)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesel')); ?>:</b>
	<?php echo CHtml::encode($data->pesel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ulica')); ?>:</b>
	<?php echo CHtml::encode($data->ulica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nr_domu')); ?>:</b>
	<?php echo CHtml::encode($data->nr_domu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nr_mieszkania')); ?>:</b>
	<?php echo CHtml::encode($data->nr_mieszkania); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miejscowosc')); ?>:</b>
	<?php echo CHtml::encode($data->miejscowosc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kod_pocztowy')); ?>:</b>
	<?php echo CHtml::encode($data->kod_pocztowy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Poczta')); ?>:</b>
	<?php echo CHtml::encode($data->Poczta); ?>
	<br />

	*/ ?>

</div>