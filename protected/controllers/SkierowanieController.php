<?php

class SkierowanieController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		//$owner_id = $this->loadModel($_GET['idDiagnoza'])->Pracownik_idPracownik;
		
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array('lekarska'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update', 'delete'),
				'roles'=>array('lekarska'),
				'expression'=>array($this, 'isOwner')
			),
			array('allow',
				'actions'=>array('GenerujPdf'),
				'roles'=>array('lekarska', 'pielegniarka'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function isOwner($user, $rule)
{
        $model = $this->loadModel($_GET['id']);
        return $user->id === $model->idSkierowanie0->Pracownik_idPracownik;
}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Skierowanie;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Skierowanie']))
		{
			$model->attributes=$_POST['Skierowanie'];
			if($model->validate()) {

				$model->save();
				$this->redirect(array('/Wizyta/view','id'=>$model->idSkierowanie));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Skierowanie']))
		{
			$model->attributes=$_POST['Skierowanie'];
			if($model->save())
				$this->redirect(array('/Wizyta/view','id'=>$model->idSkierowanie));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/Wizyta/view','id'=>$_GET['id']));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Skierowanie the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Skierowanie::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Skierowanie $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='skierowanie-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGenerujPdf($id)
	{
		$model=$this->loadModel($id);
		$mPDF1 = Yii::app()->ePdf->mpdf();

		$do= $model->do;
		$cel_porady= $model->cel_porady;
		$badania= $model->Badania;
		$data= $model->data_wystawienia;

		$Dane_Pacjenta= $model->idSkierowanie0->Pacjent_idPacjent;
		$imie_pacjenta= Pacjent::model()->findByPk($Dane_Pacjenta)->imie;
		$imie_drugie= Pacjent::model()->findByPk($Dane_Pacjenta)->imie_drugie;
		$nazwisko= Pacjent::model()->findByPk($Dane_Pacjenta)->nazwisko;
		$pesel= Pacjent::model()->findByPk($Dane_Pacjenta)->pesel;
		$ulica= Pacjent::model()->findByPk($Dane_Pacjenta)->ulica;
		$miejscowosc= Pacjent::model()->findByPk($Dane_Pacjenta)->miejscowosc;
		$kod_pocztowy= Pacjent::model()->findByPk($Dane_Pacjenta)->kod_pocztowy;
		$poczta= Pacjent::model()->findByPk($Dane_Pacjenta)->Poczta;
		$numer_domu= Pacjent::model()->findByPk($Dane_Pacjenta)->nr_domu;
		$numer_mieszkania= Pacjent::model()->findByPk($Dane_Pacjenta)->nr_mieszkania;

		$Dane_Lekarza= $model->idSkierowanie0->Pracownik_idPracownik;
		$imie_lekarza= Pracownik::model()->findByPk($Dane_Lekarza)->imie;
		$imie_drugie_lekarza= Pracownik::model()->findByPk($Dane_Lekarza)->imie_drugie;
		$nazwisko_lekarza= Pracownik::model()->findByPk($Dane_Lekarza)->nazwisko;


		$html = '<html>

			<head>

			</head>

			<body>

			<h3 style="text-align: center; padding-top: 40px; font-size: 20pt; font-weight: bold; clear: both;"> Skierowanie do Poradni Specjalistycznej -  '  .$do. '</h3>
			<p style="margin: 10 0; margin-left:15px; font-size: 10pt;"> Przychodnia Lekarza Rodzinnego "Medicus"</p>
			<p style="margin: 5 0; margin-left:15px; font-size: 10pt;"> ul. Przemysłowa 100, 62-800 Kalisz</p>
			<p style="margin: 5 0; margin-left:15px; font-size: 10pt;"> tel. 606 202 101</p>
			<p style="  font-size: 12pt; margin: 80 0 0 0;">Proszę objąć leczeniem specjalistycznym Pana/Panią</p>
			<p style="  font-size: 12pt; margin: 0;">' .$nazwisko. ' '.$imie_pacjenta.' '.$imie_drugie.'</p>
			<p style="  font-size: 12pt; margin: 0;">PESEL: ' .$pesel.'</p>
			<p style="  font-size: 12pt; margin: 0;">' .$miejscowosc.' '.$ulica.' '.$numer_domu.' '.$numer_mieszkania.' '.$kod_pocztowy.' '.$poczta.'</p>
			<p style="  font-size: 12pt; margin: 80 0 0 0;">Cel Porady: '.$cel_porady.'</p>
			<p style="  font-size: 12pt; margin: 0;">Badania dotychczas wykonane: ' .$badania.'</p>
			<p style="  font-size: 12pt; margin: 80 0 0 0;">Dnia: '.$data.'</p>
			<div>
			<div style="width: 25%; margin-top: 35px; margin-left: 0px;  text-align: center">
			........................................
			<p style="font-size: 10px; margin: 5 0;">Wystawił: </p><p style="font-size: 10px; margin: 5 0;"> '.$imie_lekarza.' '.$imie_drugie_lekarza.' ' .$nazwisko_lekarza.'</p>
			</div>
			<p style=" text-align: justify;  font-size: 12pt; margin: 100 0 0 0;">Uwagi poradni specjalistycznej:</p>
			<p style="  font-size: 12pt; margin: 0;">Data zgłoszenia się pacjenta ze skierowaniem .............................</p>
			<p style="  font-size: 12pt; margin: 0;">Termin wyznaczonej porady .........................................................</p>

			</body>

			' ;


			$mPDF1->WriteHTML($html, 2);

					$mPDF1->Output();
	}
}
