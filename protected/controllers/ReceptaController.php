<?php

class ReceptaController extends Controller
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
        return $user->id === $model->idRecepta0->Pracownik_idPracownik;
}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::import('ext.multimodelform.MultiModelForm');
		$model=new Recepta;
		$pozycjaRecepta = new PozycjaRecepta;
		$validatedPozycja = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Recepta']))
		{
			$model->attributes=$_POST['Recepta'];
			if( //validate detail before saving the master
                MultiModelForm::validate($pozycjaRecepta,$validatedPozycja,$deleteItems) &&
                $model->save()
               ) {
				$masterValues = array ('Recepta_idRecepta'=>$model->idRecepta);
				if (MultiModelForm::save($pozycjaRecepta,$validatedPozycja,$deletePozycja,$masterValues))
					$this->redirect(array('/Wizyta/view','id'=>$model->idRecepta));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'pozycjaRecepta'=>$pozycjaRecepta,
			'validatedPozycja' => $validatedPozycja,
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
    {
        Yii::import('ext.multimodelform.MultiModelForm');
 		
        $model=$this->loadModel($id); //the Group model
 
        $pozycjaRecepta = new PozycjaRecepta;
        $validatedPozycja = array(); //ensure an empty array
 
        if(isset($_POST['Recepta']))
        {
            $model->attributes=$_POST['Recepta'];
 
            //the value for the foreign key 'groupid'
            $masterValues = array ('Recepta_idRecepta'=>$model->idRecepta);
 
            if( //Save the master model after saving valid members
                MultiModelForm::save($pozycjaRecepta,$validatedPozycja,$deletePozycja,$masterValues) &&
                $model->save()
               )
                    $this->redirect(array('/Wizyta/view','id'=>$model->idRecepta));
        }
 
        $this->render('update',array(
            'model'=>$model,
            //submit the member and validatedItems to the widget in the edit form
            'pozycjaRecepta'=>$pozycjaRecepta,
            'validatedPozycja' => $validatedPozycja,
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

	public function actionGenerujPdf($id)
	{
		$model=$this->loadModel($id);
		$mPDF1 = Yii::app()->ePdf->mpdf();

		$oddzial_NFZ= $model->oddzial_NFZ;
		$uprawnienia= $model->uprawnienia;
		$pozycja= $model->getPozycja2($model->idRecepta);
		$data_wystawienia= $model->data_wystawienia;
		$data_realizacji= $model->data_realizacji;

		$Dane_Pacjenta= $model->idRecepta0->Pacjent_idPacjent;
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

		$Dane_Lekarza= $model->idRecepta0->Pracownik_idPracownik;
		$imie_lekarza= Pracownik::model()->findByPk($Dane_Lekarza)->imie;
		$imie_drugie_lekarza= Pracownik::model()->findByPk($Dane_Lekarza)->imie_drugie;
		$nazwisko_lekarza= Pracownik::model()->findByPk($Dane_Lekarza)->nazwisko;

		$html = '<html>

			<head>

			</head>

			<body>
	
	<div style="border: 1px solid #000000; width: 100%; float: left;">			
  <title>Recepta</title>
  <p style="margin: 10 0; margin-left:15px; font-size: 10pt; text-align: center;"> Przychodnia Lekarza Rodzinnego "Medicus"</p>
  <p style="margin: 5 0; margin-left:15px; font-size: 10pt; text-align: center;"> ul. Przemysłowa 100, 62-800 Kalisz</p>
  <p style="margin: 5 0; margin-left:15px; font-size: 10pt; text-align: center;"> tel. 606 202 101</p>
  <br><br><br>
  </div>
  <div style="border: 1px solid #000000; width: 75%; float: left;">	
  <title>Pacjent</title>
  <p style="  font-size: 12pt; margin: 0 0 0 15;">' .$nazwisko. ' '.$imie_pacjenta.' '.$imie_drugie.'</p>
  <p style="  font-size: 12pt; margin: 0 0 0 15;">' .$miejscowosc.' '.$ulica.' '.$numer_domu.' '.$numer_mieszkania.' </p>
  <p style="  font-size: 12pt; margin: 0 0 0 15;">'.$kod_pocztowy.' '.$poczta.'</p>
  <p style="  font-size: 12pt; margin: 10 0 0 15;">PESEL: ' .$pesel.'</p>
  </div>
  <div style="border: 1px solid #000000; width: 24%; float: right;" >
  <title> Oddział NFZ </title>
  <p style="  font-size: 15pt; margin: 0 0 0 0; text-align:center;">'.$oddzial_NFZ.' </p>
  </div>
  <div style="border: 1px solid #000000;  width: 24%; float: right;" >
  <title> Uprawnienia Dodatkowe </title>
  <p style="  font-size: 15pt; margin: 0 0 0 0; text-align:center;">'.$uprawnienia.' </p>
  </div>
  <div style="border: 1px solid #000000; width: 100%; float: left;">
  <title>Rp.</title>
  <p style="  font-size: 15pt; margin: 0 0 0 0; text-align:left;">'.$pozycja.' </p>
  </div>
  <div style="border: 1px solid #000000; width: 50%; float: left;">
  <title>Data Wystawienia</title>
  <p style="  font-size: 15pt; margin: 0 0 0 0; text-align:center;">'.$data_wystawienia.' <br><br></p>
  </div>
  <div style="border: 1px solid #000000; width: 49%; float: right;" >
  <title> Dane i podpis lekarza </title>
  <p style="  font-size: 12pt; margin: 15 0 70 15;">' .$nazwisko_lekarza. ' '.$imie_lekarza.' '.$imie_drugie_lekarza.'<br><br></p>
  </div>
   <div style="border: 1px solid #000000; width: 50%; float: left;">
  <title>Data Realizacji "od dnia"</title>
  <p style="  font-size: 15pt; margin: 0 0 0 0; text-align:center;">'.$data_realizacji.' <br><br></p>
  </div>	
</body>
' ;
$mPDF1->WriteHTML($html, 2);

					$mPDF1->Output();
	}




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Recepta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Recepta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Recepta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='recepta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
