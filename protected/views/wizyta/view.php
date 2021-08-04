<?php
/* @var $this WizytaController */
/* @var $model Wizyta */

$this->breadcrumbs=array(
	'Wizytas'=>array('index'),
	$model->idWizyta,
);

$roles=Yii::app()->authManager->getRoles(Yii::app()->user->id);
foreach ($roles as $role)
    	$role->name;
    	if ($role->name =='lekarska')
    	{
	    	$data=date('Y-m-d');
			if($model->data_wizyty>=$data)
			{
				if($model->idWizyta!=$model->diagnoza->idDiagnoza && $model->idWizyta!=$model->recepta->idRecepta && $model->idWizyta!=$model->skierowanie->idSkierowanie){
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Wystaw diagnoze', 'url'=>array('/Diagnoza/create', 'id'=>$model->idWizyta)),
					array('label'=>'Wystaw recepte', 'url'=>array('/Recepta/create', 'id'=>$model->idWizyta)),
					array('label'=>'Wystaw skierowanie', 'url'=>array('/Skierowanie/create', 'id'=>$model->idWizyta)),
				);
				}
				else if($model->idWizyta!=$model->recepta->idRecepta && $model->idWizyta!=$model->skierowanie->idSkierowanie && $model->idWizyta==$model->diagnoza->idDiagnoza) {
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Edytuj diagnoze', 'url'=>array('/Diagnoza/update/'.$model->diagnoza->idDiagnoza )),
					array('label'=>'Usuń diagnoze', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Diagnoza/delete','id'=>$model->diagnoza->idDiagnoza),'confirm'=>'Czy napewno chcesz usunąć Diagnozę?')),
					array('label'=>'Wystaw recepte', 'url'=>array('/Recepta/create', 'id'=>$model->idWizyta)),
					array('label'=>'Wystaw skierowanie', 'url'=>array('/Skierowanie/create', 'id'=>$model->idWizyta)),
					);	
				}
				else if($model->idWizyta!=$model->diagnoza->idDiagnoza && $model->idWizyta!=$model->skierowanie->idSkierowanie && $model->idWizyta==$model->recepta->idRecepta)
				{
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Wystaw diagnoze', 'url'=>array('/Diagnoza/create', 'id'=>$model->idWizyta)),
					array('label'=>'Edytuj recepte', 'url'=>array('/Recepta/update/'.$model->recepta->idRecepta )),
					array('label'=>'Usuń recepte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Recepta/delete','id'=>$model->recepta->idRecepta),'confirm'=>'Czy napewno chcesz usunąć Receptę')),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					array('label'=>'Wystaw skierowanie', 'url'=>array('/Skierowanie/create', 'id'=>$model->idWizyta)),
					);
				}
				else if($model->idWizyta!=$model->skierowanie->idSkierowanie && $model->idWizyta==$model->diagnoza->idDiagnoza && $model->idWizyta==$model->recepta->idRecepta)
				{
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Edytuj diagnoze', 'url'=>array('/Diagnoza/update/'.$model->diagnoza->idDiagnoza )),
					array('label'=>'Usuń diagnoze', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Diagnoza/delete','id'=>$model->diagnoza->idDiagnoza),'confirm'=>'Czy napewno chcesz usunąć Diagnozę?')),
					array('label'=>'Edytuj recepte', 'url'=>array('/Recepta/update/'.$model->recepta->idRecepta )),
					array('label'=>'Usuń recepte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Recepta/delete','id'=>$model->recepta->idRecepta),'confirm'=>'Czy napewno chcesz usunąć Receptę')),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					array('label'=>'Wystaw skierowanie', 'url'=>array('/Skierowanie/create', 'id'=>$model->idWizyta)),
					);
				}
				else if($model->idWizyta==$model->skierowanie->idSkierowanie && $model->idWizyta!=$model->diagnoza->idDiagnoza && $model->idWizyta!=$model->recepta->idRecepta)
				{
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Wystaw diagnoze', 'url'=>array('/Diagnoza/create', 'id'=>$model->idWizyta)),
					array('label'=>'Wystaw recepte', 'url'=>array('/Recepta/create', 'id'=>$model->idWizyta)),
					array('label'=>'Edytuj skierowanie', 'url'=>array('/Skierowanie/update/'.$model->skierowanie->idSkierowanie )),
					array('label'=>'Usuń skierowanie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Skierowanie/delete','id'=>$model->skierowanie->idSkierowanie),'confirm'=>'Czy napewno chcesz usunąć Skierowanie')),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);
				}
				else if($model->idWizyta==$model->skierowanie->idSkierowanie && $model->idWizyta==$model->diagnoza->idDiagnoza && $model->idWizyta!=$model->recepta->idRecepta)
				{
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Edytuj diagnoze', 'url'=>array('/Diagnoza/update/'.$model->diagnoza->idDiagnoza )),
					array('label'=>'Usuń diagnoze', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Diagnoza/delete','id'=>$model->diagnoza->idDiagnoza),'confirm'=>'Czy napewno chcesz usunąć Diagnozę?')),
					array('label'=>'Wystaw recepte', 'url'=>array('/Recepta/create', 'id'=>$model->idWizyta)),
					array('label'=>'Edytuj skierowanie', 'url'=>array('/Skierowanie/update/'.$model->skierowanie->idSkierowanie )),
					array('label'=>'Usuń skierowanie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Skierowanie/delete','id'=>$model->skierowanie->idSkierowanie),'confirm'=>'Czy napewno chcesz usunąć Skierowanie')),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);
				}
				else if($model->idWizyta==$model->skierowanie->idSkierowanie && $model->idWizyta==$model->diagnoza->idDiagnoza && $model->idWizyta==$model->recepta->idRecepta)
				{
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Edytuj diagnoze', 'url'=>array('/Diagnoza/update/'.$model->diagnoza->idDiagnoza )),
					array('label'=>'Usuń diagnoze', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Diagnoza/delete','id'=>$model->diagnoza->idDiagnoza),'confirm'=>'Czy napewno chcesz usunąć Diagnozę?')),
					array('label'=>'Edytuj recepte', 'url'=>array('/Recepta/update/'.$model->recepta->idRecepta )),
					array('label'=>'Usuń recepte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Recepta/delete','id'=>$model->recepta->idRecepta),'confirm'=>'Czy napewno chcesz usunąć Receptę')),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					array('label'=>'Edytuj skierowanie', 'url'=>array('/Skierowanie/update/'.$model->skierowanie->idSkierowanie )),
					array('label'=>'Usuń skierowanie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Skierowanie/delete','id'=>$model->skierowanie->idSkierowanie),'confirm'=>'Czy napewno chcesz usunąć Skierowanie')),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);
				}
				else if($model->idWizyta==$model->skierowanie->idSkierowanie && $model->idWizyta!=$model->diagnoza->idDiagnoza && $model->idWizyta==$model->recepta->idRecepta)
				{
					$this->menu=array(
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Wystaw diagnoze', 'url'=>array('/Diagnoza/create', 'id'=>$model->idWizyta)),
					array('label'=>'Edytuj recepte', 'url'=>array('/Recepta/update/'.$model->recepta->idRecepta )),
					array('label'=>'Usuń recepte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Recepta/delete','id'=>$model->recepta->idRecepta),'confirm'=>'Czy napewno chcesz usunąć Receptę')),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					array('label'=>'Edytuj skierowanie', 'url'=>array('/Skierowanie/update/'.$model->skierowanie->idSkierowanie )),
					array('label'=>'Usuń skierowanie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('/Skierowanie/delete','id'=>$model->skierowanie->idSkierowanie),'confirm'=>'Czy napewno chcesz usunąć Skierowanie')),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);
				}
			}
			else{
				if($model->idWizyta!=$model->recepta->idRecepta && $model->idWizyta!=$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					);}
				if($model->idWizyta==$model->recepta->idRecepta && $model->idWizyta!=$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					);}
				if($model->idWizyta!=$model->recepta->idRecepta && $model->idWizyta==$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);}
				if($model->idWizyta==$model->recepta->idRecepta && $model->idWizyta==$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);}} ?>
			<h1>Wizyta #<?php echo $model->idWizyta; ?></h1>

			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'idWizyta',
					'data_wizyty',
					'godzina_wizyty',
					array(
						'label' => 'Numer Karty Pacjenta',
						'value' => $model->pacjentIdPacjent->idPacjent,
				),
					array(
						'label' =>'Imie Pacjenta',
						'value' => $model->pacjentIdPacjent->imie. ' '.$model->pacjentIdPacjent->imie_drugie,
				),
					array(
						'label' =>'Nazwisko Pacjenta',
						'value' => $model->pacjentIdPacjent->nazwisko,
				),
					array(
						'label'=>'Pesel',
						'value'=>$model->pacjentIdPacjent->pesel
						),
					array(
						'label'=>'Lekarz',
						'value'=>$model->pracownikIdPracownik->imie .' '. $model->pracownikIdPracownik->nazwisko
						),
			),));

			if($model->idWizyta==$model->diagnoza->idDiagnoza) {?>

			<h1>Diagnoza</h1>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array(
						'label'=>'Diagnoza',
						'value'=>$model->diagnoza->Diagnoza,
						),
					array(
						'label'=>'Zalecenia',
						'value'=>$model->diagnoza->Zalecenia
						),
					)
			));
		}
		if($model->idWizyta==$model->recepta->idRecepta) {?>
		<h1>Recepta</h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array(
						'label'=>'oddzial NFZ',
						'value'=>$model->recepta->oddzial_NFZ,
						),
					array(
						'label'=>'uprawnienia',
						'value'=>$model->recepta->uprawnienia,
						),
					array(
						'label'=>'data wystawienia',
						'value'=>$model->recepta->data_wystawienia,
						),
					array(
						'label'=>'data realizacji',
						'value'=>$model->recepta->data_realizacji,
						),
					array(
                        'name'=>'Pozycje',
                        'type'=>'html',
                        'value'=>$model->recepta->getPozycja($model->recepta->idRecepta),
         				 ),    
					)
			));
		}
		if($model->idWizyta==$model->skierowanie->idSkierowanie) {?>
		<h1>Skierowanie</h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array(
						'label'=>'do',
						'value'=>$model->skierowanie->do,
						),
					array(
						'label'=>'cel porady',
						'value'=>$model->skierowanie->cel_porady,
						),
					array(
						'label'=>'badania',
						'value'=>$model->skierowanie->Badania,
						),
					array(
						'label'=>'data wystawienia',
						'value'=>$model->skierowanie->data_wystawienia,
						), 
					)
			));
		}
	}

			else if ($role->name =='recepcja')
			{
				if ($model->data_wizyty>=date('Y-m-d')){
				$this->menu=array(

					array('label'=>'Edytuj wizyte', 'url'=>array('update', 'id'=>$model->idWizyta)),
					array('label'=>'Usuń wizyte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idWizyta),'confirm'=>'Czy napewno chcesz usunąć tą Wizytę?')),
					);}?>
				<h1>Wizyta #<?php echo $model->idWizyta; ?></h1>

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'idWizyta',
						'data_wizyty',
						'godzina_wizyty',
						array(
							'label' => 'Numer Karty Pacjenta',
							'value' => $model->pacjentIdPacjent->idPacjent,
					),
						array(
							'label' =>'Imie Pacjenta',
							'value' => $model->pacjentIdPacjent->imie. ' '.$model->pacjentIdPacjent->imie_drugie,
					),
						array(
							'label' =>'Nazwisko Pacjenta',
							'value' => $model->pacjentIdPacjent->nazwisko,
					),
						array(
							'label'=>'Pesel',
							'value'=>$model->pacjentIdPacjent->pesel
							),
						array(
							'label'=>'Lekarz',
							'value'=>$model->pracownikIdPracownik->imie .' '. $model->pracownikIdPracownik->nazwisko
							),
				),));

			}
			else if ($role->name =='pielegniarka')
			{
				if($model->idWizyta!=$model->recepta->idRecepta && $model->idWizyta!=$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					);}
				if($model->idWizyta==$model->recepta->idRecepta && $model->idWizyta!=$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					);}
				if($model->idWizyta!=$model->recepta->idRecepta && $model->idWizyta==$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);}
				if($model->idWizyta==$model->recepta->idRecepta && $model->idWizyta==$model->skierowanie->idSkierowanie){
				$this->menu=array( 
					array('label'=>'Dane pacjenta', 'url'=>array('/Pacjent/view/'.$model->pacjentIdPacjent->idPacjent)),
					array('label'=>'Drukuj receptę', 'url'=>array('/Recepta/generujpdf', 'id'=>$model->recepta->idRecepta)),
					array('label'=>'Drukuj skierowanie', 'url'=>array('/Skierowanie/generujpdf', 'id'=>$model->skierowanie->idSkierowanie)),
					);}
					?>
				<h1>Wizyta #<?php echo $model->idWizyta; ?></h1>

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'idWizyta',
						'data_wizyty',
						'godzina_wizyty',
						array(
							'label' => 'Numer Karty Pacjenta',
							'value' => $model->pacjentIdPacjent->idPacjent,
					),
						array(
							'label' =>'Imie Pacjenta',
							'value' => $model->pacjentIdPacjent->imie. ' '.$model->pacjentIdPacjent->imie_drugie,
					),
						array(
							'label' =>'Nazwisko Pacjenta',
							'value' => $model->pacjentIdPacjent->nazwisko,
					),
						array(
							'label'=>'Pesel',
							'value'=>$model->pacjentIdPacjent->pesel
							),
						array(
							'label'=>'Lekarz',
							'value'=>$model->pracownikIdPracownik->imie .' '. $model->pracownikIdPracownik->nazwisko
							),
				),));

				if($model->idWizyta==$model->diagnoza->idDiagnoza){?>

				<h1>Diagnoza</h1>
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array(
							'label'=>'Diagnoza',
							'value'=>$model->diagnoza->Diagnoza,
							),
						array(
							'label'=>'Zalecenia',
							'value'=>$model->diagnoza->Zalecenia
							),
						)
				));
				
				}
			if($model->idWizyta==$model->recepta->idRecepta) { ?>
		<h1>Recepta</h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array(
						'label'=>'oddzial NFZ',
						'value'=>$model->recepta->oddzial_NFZ,
						),
					array(
						'label'=>'uprawnienia',
						'value'=>$model->recepta->uprawnienia,
						),
					array(
						'label'=>'data wystawienia',
						'value'=>$model->recepta->data_wystawienia,
						),
					array(
						'label'=>'data realizacji',
						'value'=>$model->recepta->data_realizacji,
						),
					array(
                        'name'=>'Pozycje',
                        'type'=>'html',
                        'value'=>$model->recepta->getPozycja($model->recepta->idRecepta),
         				 ),    
					)
			));
		}
	if($model->idWizyta==$model->skierowanie->idSkierowanie) {?>
		<h1>Skierowanie</h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array(
						'label'=>'do',
						'value'=>$model->skierowanie->do,
						),
					array(
						'label'=>'cel porady',
						'value'=>$model->skierowanie->cel_porady,
						),
					array(
						'label'=>'badania',
						'value'=>$model->skierowanie->Badania,
						),
					array(
						'label'=>'data wystawienia',
						'value'=>$model->skierowanie->data_wystawienia,
						), 
					)
			));
		}}
				?>

