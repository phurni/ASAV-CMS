<?php

class MediaController extends Controller
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
			array('allow',
				'actions'=>array('file'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('index','view', 'create', 'update', 'delete'),
				'roles'=>array('staff', 'admin'),
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
	public function actionCreateForChild()
	{
		$model=new Media;
		if(isset($_POST['Media']))
		{
			$model->attributes=$_POST['Media'];
			// Set the created date
			$model->Created = date('Y-m-d');
			// Set the owner of the file
			$model->Author = Yii::app()->user->Id;
			// Get the uploade file
			$model->File = CUploadedFile::getInstance($model,'File');
			if($model->validate())
			{
				if($model->save())
				{
					// Normal redirection to the media entry
					$this->redirect(array('view','id'=>$model->Id));
				}
			}
		}

		$this->render('createforchild',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate()
	{
		$model=new Media;
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Media']))
		{
			$model->attributes=$_POST['Media'];
			// Set the created date
			$model->Created = date('Y-m-d');
			// Get the uploade file
			$model->File = CUploadedFile::getInstance($model,'File');
			
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

		if(isset($_POST['Media']))
		{
			$model->attributes=$_POST['Media'];
			// Set the created date
			$model->Modified = date('Y-m-d');
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($type = null,$id = null)
	{
		if ($type == null AND $id == null){
		$dp=new CActiveDataProvider('Media');
		$this->render('index',array(
				'dp'=>$dp
				
		));	
		}
		else{
		//filter
		$criteria=new CDbCriteria;
		if($id == null){$criteria->addCondition($type);}
		else{
		
				
			$criteria->addCondition($type.'='.$id);
		}
		
		$model = new Media('search');
		$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
		
		$this->render('index',array(
				'dp'=>$dp,
		
		));
		}
	}
	
	public function actionFile($path)
	{
		// Store the full path of the media's directory
		$dir = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . Yii::app()->params ['custom'] ['uploadPath'] . $path . "/";
		$output = null;
		
		// Get the media of the directory
		if (is_dir($dir)) {
			if ($handle = opendir($dir)) {
				while (($file = readdir($handle)) !== false) {
					if($file != '.' && $file != '..'){
						$output = $dir . $file;
						break;
					}
				}
				closedir($handle);
			}
		}
		
		// Send the media to the logged user
		if($output){
			header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
			header("Cache-Control: public"); // needed for i.e.
			header('Content-Type: application/octet-stream');
			header("Content-Transfer-Encoding: Binary");
			header("Content-Length:".filesize($output));
            header("Content-Disposition: attachment; filename=" . pathinfo($output, PATHINFO_FILENAME) . "." . pathinfo($output, PATHINFO_EXTENSION));
            readfile($output);
		}
	}
	


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Media('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Media']))
			$model->attributes=$_GET['Media'];

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
		$model=Media::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='media-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
