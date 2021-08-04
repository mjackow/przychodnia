<?php

class WizytaController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'roles'=>array('lekarska', 'pielegniarka', 'recepcja'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'delete'),
				'roles'=>array('recepcja'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array('recepcja'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('recepcja_historia'),
				'roles'=>array('recepcja'),
			),
			array('allow', 
				'actions'=>array('lekarz',),
				'roles'=>array('lekarska'),
			),
			array('allow', 
				'actions'=>array('pielegniarka'),
				'roles'=>array('pielegniarka',),
			),
			array('allow', 
				'actions'=>array('pielegniarka_zaplanowane'),
				'roles'=>array('pielegniarka',),
			),
			array('allow', 
				'actions'=>array('pacjent',),
				'roles'=>array('lekarska', 'pielegniarka', 'recepcja'),
			),
			array('allow', 
				'actions'=>array('historia',),
				'roles'=>array('lekarska'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Wizyta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Wizyta']))
		{
			$model->attributes=$_POST['Wizyta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idWizyta));
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

		if(isset($_POST['Wizyta']))
		{
			$model->attributes=$_POST['Wizyta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idWizyta));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionRecepcja_historia()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('recepcja_historia',array(
			'model'=>$model,
		));
	}

	public function actionLekarz()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('lekarz',array(
			'model'=>$model,
		));
	}

	public function actionPielegniarka()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('pielegniarka',array(
			'model'=>$model,
		));
	}

	public function actionPielegniarka_zaplanowane()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('pielegniarka_zaplanowane',array(
			'model'=>$model,
		));
	}

	public function actionPacjent()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('pacjent',array(
			'model'=>$model,
		));
	}

	public function actionHistoria()
	{
		$model=new Wizyta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wizyta']))
			$model->attributes=$_GET['Wizyta'];

		$this->render('historia',array(
			'model'=>$model,
		));
	}

		public function isOwner($user, $rule)
{
        $model = $this->loadModel($_GET['id']);
        return $user->id === $model->idPracownik;
}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Wizyta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Wizyta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Wizyta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wizyta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
