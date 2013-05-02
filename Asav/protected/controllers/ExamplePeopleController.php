<?php

class ExamplePeopleController extends Controller
{
	public function actionIndex()
	{
		// Get the Id of the logged user
		$id = yii::app()->user->id;
		/**
		 * Available data in [yii::app()->user]
		 * 	-	id
		 * 	-	name
		 */
	
	
	
		// Get the fullname of the logged user
		$fullname = "invité";
		if(isset(yii::app()->user->user)){
			$fullname = yii::app()->user->user->Fullname;
		}
		/**
		 * Available data in [yii::app()->user->user]
		 * 	All properties of the model [User]
		 */
	
	
		if(yii::app()->user->hasState("user") && yii::app()->user->user->group->Id == 1){
			$sponsor = yii::app()->user->id;
		}
		
		// Data 1
		$model=new Person('search');
		// Data 2
		$item = Child::model()->findbyPk(2);
	
		/**
		 * Send multiple data to the view
		*/
		$this->render('index',array(
				'model'=>$model,
				'item'=>$item,
				'id'=>$id,
				'name'=>$fullname,
		));
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Person;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Person']))
		{
			$model->attributes=$_POST['Person'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
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

		if(isset($_POST['Person']))
		{
			$model->attributes=$_POST['Person'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
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
		$model=new Person('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Person']))
			$model->attributes=$_GET['Person'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Person::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='person-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
