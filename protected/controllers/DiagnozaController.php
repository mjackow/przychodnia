<?php

class DiagnozaController extends Controller
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
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Diagnoza;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Diagnoza'])){
			$model->attributes=$_POST['Diagnoza'];
			if($model->validate()) {

				$model->save();
				$this->redirect(array('/Wizyta/view','id'=>$model->idDiagnoza));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

		public function isOwner($user, $rule)
{
        $model = $this->loadModel($_GET['id']);
        return $user->id === $model->idDiagnoza0->Pracownik_idPracownik;
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

		if(isset($_POST['Diagnoza']))
		{
			$model->attributes=$_POST['Diagnoza'];
			if($model->save())
				$this->redirect(array('/Wizyta/view','id'=>$model->idDiagnoza));
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
	 * @return Diagnoza the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Diagnoza::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Diagnoza $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='diagnoza-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
