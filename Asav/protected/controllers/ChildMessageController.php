<?php

class ChildMessageController extends Controller
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
				'actions'=>array('index','view', 'create', 'update'),
				'roles'=>array('sponsor', 'staff', 'admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
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
		$model = $this->loadModel($id);
		$user = Yii::app()->user->user;
		
		if($user->group->Id == 1 && $model->Author != $user->Id){
			throw new CHttpException(403);
		}else{
			$this->render('view',array(
					'model'=>$model,
			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ChildMessage;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['ChildMessage']))
		{
			$model->attributes=$_POST['ChildMessage'];
			// Set the author
			$model->Author = Yii::app()->user->user->Id;
			// Set the created date
			$model->DateCreated = date ( 'Y-m-d h:i:s' );
			// Set the forward flag
			$model->IsForwarded = 0;
		// Validate the model
			if ($model->validate ()) {
				// If there's a file to upload
				if(CUploadedFile::getInstanceByName ( 'File' ) != null)
				{
					if ($model->save ()) {
						$media = new Media ();
						// Set the Staffboard id
						$media->ChildMessage = $model->Id;
						// Set the title
						$media->Title = $_POST ['filename'];
						// Set the created date
						$media->Created = date ( 'Y-m-d h:i:s' );
						// Set the owner of the file
						$media->Author = Yii::app ()->user->Id;
						// Get the uploade file
						$media->File = CUploadedFile::getInstanceByName ( 'File' );
						if ($media->save ()) {
							$this->redirect ( array (
									'view',
									'id' => $model->Id 
							) );
						}
					}
				}
				else 
				{
					if ($model->save ()) {
						$this->redirect ( array (
								'view',
								'id' => $model->Id
						) );
					}
				}
			}
		}
		
		$user = Yii::app()->user->user;
		
		$child = new Child('search');
		$criteria = new CDbCriteria();
		if($user->group->Id == 1){
			$criteria->join = 'INNER JOIN users ON t.Sponsor = users.Id';
			$criteria->condition = 'users.Id = :id';
			$criteria->params = array (
					':id' => $user->Id
			);
		}
		$child = new CActiveDataProvider ($child, array (
				'criteria' => $criteria
		) );
		
		$children = array();
		foreach($child->getData() as $row){
			$children[] = $row;
		}
		
		$this->render('create',array(
			'model'=>$model,
			'children'=>$children
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

		if(isset($_POST['ChildMessage']))
		{
			$model->attributes=$_POST['ChildMessage'];
		// Validate the model
			if ($model->validate ()) {
				// If there's a file to upload
				if(CUploadedFile::getInstanceByName ( 'File' ) != null)
				{
					if ($model->save ()) {
						$media = new Media ();
						// Set the Staffboard id
						$media->ChildMessage = $model->Id;
						// Set the title
						$media->Title = $_POST ['filename'];
						// Set the created date
						$media->Created = date ( 'Y-m-d h:i:s' );
						// Set the owner of the file
						$media->Author = Yii::app ()->user->Id;
						// Get the uploade file
						$media->File = CUploadedFile::getInstanceByName ( 'File' );
						if ($media->save ()) {
							$this->redirect ( array (
									'view',
									'id' => $model->Id 
							) );
						}
					}
				}
				else 
				{
					if ($model->save ()) {
						$this->redirect ( array (
								'view',
								'id' => $model->Id
						) );
					}
				}
			}
		}
		
		$user = Yii::app()->user->user;
		
		$child = new Child('search');
		$criteria = new CDbCriteria();
		if($user->group->Id == 1){
			$criteria->join = 'INNER JOIN users ON t.Sponsor = users.Id';
			$criteria->condition = 'users.Id = :id';
			$criteria->params = array (
					':id' => $user->Id
			);
		}
		$child = new CActiveDataProvider ($child, array (
				'criteria' => $criteria
		) );
		
		$children = array();
		foreach($child->getData() as $row){
			$children[] = $row;
		}

		$this->render('update',array(
			'model'=>$model,
			'children'=>$children
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($sponsor = null)
	{
		$sponsorized = false;
		if(yii::app()->user->hasState("user") && yii::app()->user->user->group->Id == 1){
			$sponsor = yii::app()->user->id;
		}
		$criteria=new CDbCriteria;
		if($sponsor != ''){
			$criteria->addCondition('Author='.$sponsor);
			$sponsorized = true;
		}
		
		$model = new ChildMessage('search');
		
		$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
		
		$this->render('index',array(
				'dp'=>$dp,
				'sponsorized'=>$sponsorized
		));		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ChildMessage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ChildMessage']))
			$model->attributes=$_GET['ChildMessage'];

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
		$model=ChildMessage::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='child-message-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
