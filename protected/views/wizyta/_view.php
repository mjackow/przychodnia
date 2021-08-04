<?php
/* @var $this WizytaController */
/* @var $data Wizyta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idWizyta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idWizyta), array('view', 'id'=>$data->idWizyta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_wizyty')); ?>:</b>
	<?php echo CHtml::encode($data->data_wizyty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('godzina_wizyty')); ?>:</b>
	<?php echo CHtml::encode($data->godzina_wizyty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pacjent_idPacjent')); ?>:</b>
	<?php echo CHtml::encode($data->Pacjent_idPacjent); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('Pracownik_idPracownik')); ?>:</b>
	<?php echo CHtml::encode($data->Pracownik_idPracownik); ?>
	<br />


</div>