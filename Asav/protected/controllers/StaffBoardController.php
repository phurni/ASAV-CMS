<?php
class StaffboardController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to
	 *      '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array (
				'accessControl'  // perform access control for CRUD operations
		                 // 'postOnly + delete', // we only allow deletion via
		                 // POST request
		);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * 
	 * @return array access control rules
	 */
	public function accessRules() {
		return array (
				array (
						'allow', // allow authenticated user to perform 'create'
						               // and 'update' actions
						'actions' => array (
								'index',
								'view',
								'create',
								'update',
								'admin',
								'delete' 
						),
						'roles' => array (
								'staff',
								'admin' 
						) 
				),
				array (
						'deny', // deny all users
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	
	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view'
	 * page.
	 */
	public function actionCreate() {
		$model = new Staffboard ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Staffboard'] )) {
			$model->attributes = $_POST ['Staffboard'];
			// Set the author
			$model->Author = Yii::app ()->user->Id;
			// Set the created date
			$model->DateCreated = date ( 'Y-m-d h:i:s' );
			// Validate the model
			if ($model->validate ()) {
				// If there's a file to upload
				if(CUploadedFile::getInstanceByName ( 'File' ) != null)
				{
					if ($model->save ()) {
						$media = new Media ();
						// Set the Staffboard id
						$media->Staffboard = $model->Id;
						// Set the title
						$media->Title = $_POST ['filename'];
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
		
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view'
	 * page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Staffboard'] )) {
			$model->attributes = $_POST ['Staffboard'];
			// Validate the model
			if ($model->validate ()) {
				// If there's a file to upload
				if(CUploadedFile::getInstanceByName ( 'File' ) != null)
				{
					if ($model->save ()) {
						$media = new Media ();
						// Set the Staffboard id
						$media->Staffboard = $model->Id;
						// Set the title
						$media->Title = $_POST ['filename'];
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
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin'
	 * page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		// Get the model
		$model = $this->loadModel ( $id );
		// Delete each model attached
		foreach ( $model->medias as $media ) {
			$media->delete ();
		}
		// Delete the model
		$model->delete ();
		
		// if AJAX request (triggered by deletion via admin grid view), we
		// should not redirect the browser
		if (! isset ( $_GET ['ajax'] ))
			$this->redirect ( Yii::app ()->createUrl ( "/staffboard" ) );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider ( 'Staffboard', array('criteria'=>array('order'=>'DateCreated DESC')));
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Staffboard ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Staffboard'] ))
			$model->attributes = $_GET ['Staffboard'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET
	 * variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * 
	 * @param
	 *        	integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Staffboard::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * 
	 * @param
	 *        	CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'staff-board-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
