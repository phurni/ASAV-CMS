<?php

class ChildrenController extends Controller
{
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	/**
	 * @return array action filters
	 */
	
	public function actionIndex($sponsor = null)
	{
		$sponsorized = false;
		if(yii::app()->user->hasState("user") && yii::app()->user->user->group->Id == 1){
			$sponsor = yii::app()->user->id;
		}
		$criteria=new CDbCriteria;
		if($sponsor != ''){
			$criteria->addCondition('Sponsor='.$sponsor);
			$sponsorized = true;
		}
		
		$model = new Child('search');
		
		$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
		
		$this->render('index',array(
				'dp'=>$dp,
				'sponsorized'=>$sponsorized
		));		
	}
	
	public function actionGallery()
	{
		$dataProvider=new CActiveDataProvider('Child');
		$this->render('gallery',array(
				'dataProvider'=>$dataProvider,
		));
	}
	
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
}

	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view', 'gallery'),
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
	
	public function actionView($id)
	{
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCreate()
	{
		$model=new Child;
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Child']))
		{
			$model->attributes=$_POST['Child'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}
	
		$this->render('create',array(
				'model'=>$model,
		));
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Child']))
		{
			$model->attributes=$_POST['Child'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}
	
		$this->render('update',array(
				'model'=>$model,
		));
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
	
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	public function actionAdmin()
	{
		$model=new Child('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Child']))
			$model->attributes=$_GET['Child'];
	
		$this->render('admin',array(
				'model'=>$model,
		));
	}
	
	public function loadModel($id)
	{
		$model=Child::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='child-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
}//END

