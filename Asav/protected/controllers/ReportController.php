<?php
class ReportController extends Controller {
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
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete' 
		); // we only allow deletion via POST request
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
						'allow', // allow all users to perform 'index' and
						         // 'view' actions
						'actions' => array (
								'index',
								'view' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'allow', // allow all users to perform 'index' and
						         // 'view' actions
						'actions' => array (
								'create',
								'update',
								'delete',
								'reportsbychild',
								'myreports' 
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
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$user = Yii::app()->user->user;
		
		$criteria = new CDbCriteria();
		if($user->group->Id == 1){
			$criteria->join = 'INNER JOIN children ON t.Child = children.Id INNER JOIN users on children.Sponsor = users.Id';
			$criteria->condition = 'users.Id = :id';
			$criteria->params = array (
					':id' => $user->Id
			);
		}
		
		$reports = new CActiveDataProvider ($model, array (
				'criteria' => $criteria
		) );
		
		$valid = false;
		foreach($reports->getData() as $report){
			if($report->Id == $id){
				$valid = true;
				break;
			}
		}
		
		if(!$valid){
			throw new CHttpException(403);
		}else{
			$this->render('view',array(
					'model'=>$model,
					'isInTeam' => (isset(Yii::app()->user->user) && Yii::app()->user->user->IsInTeam())
			));
		}
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view'
	 * page.
	 */
	public function actionCreate() {
		$model = new Report ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Report'] )) {
			$model->attributes = $_POST ['Report'];
			$model->Author = Yii::app ()->user->user->Id;
			$model->CreationDate = date ( 'Y-m-d' );
			$model->UpdateDate = date ( 'Y-m-d' );
			// Validate the model
			if ($model->validate ()) {
				// If there's a file to upload
				if (CUploadedFile::getInstanceByName ( 'File' ) != null) {
					if ($model->save ()) {
						$media = new Media ();
						// Set the Staffboard id
						$media->Report = $model->Id;
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
				} else {
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
				'model' => $model,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
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
		
		if (isset ( $_POST ['Report'] )) {
			$model->attributes = $_POST ['Report'];
			$model->UpdateDate = date ( 'Y-m-d' );
			// Validate the model
			if ($model->validate ()) {
				// If there's a file to upload
				if (CUploadedFile::getInstanceByName ( 'File' ) != null) {
					if ($model->save ()) {
						$media = new Media ();
						// Set the Staffboard id
						$media->Report = $model->Id;
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
				} else {
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
				'model' => $model,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
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
			$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
					'index' 
			) );
	}

	public function actionIndex()
	{
		$model = new Report('search');
		$user = Yii::app()->user->user;
		$criteria = new CDbCriteria();
		if($user->group->Id == 1){
			$criteria->join = 'INNER JOIN children ON t.Child = children.Id INNER JOIN users on children.Sponsor = users.Id';
			$criteria->condition = 'users.Id = :id';
			$criteria->params = array (
					':id' => $user->Id
			);
		}
		$dp = new CActiveDataProvider ($model, array (
				'criteria' => $criteria
		) );
		$this->render ('index', array(
			'dp' => $dp,
			'title' => "Rapports",
			'isInTeam' => (isset(Yii::app()->user->user) && Yii::app()->user->user->IsInTeam())
		));
	}
	public function actionMyreports() {
		$id = yii::app ()->user->id;
		$criteria = new CDbCriteria ();
		if ($id !== null) {
			$criteria->addCondition ( 'Author=' . $id );
		}
		$model = new Report ( 'search' );
		$dp = new CActiveDataProvider ( $model, array (
				'criteria' => $criteria 
		) );
		$this->render ( 'index', array (
				'dp' => $dp,
				'title' => "Mes rapports",
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	public function actionReportsbychild($child) {
		$criteria = new CDbCriteria ();
		$criteria->addCondition ( 'Child=' . $child );
		
		$model = new Report ( 'search' );
		
		$dp = new CActiveDataProvider ( $model, array (
				'criteria' => $criteria 
		) );
		$item = Child::model ()->findbyPk ( $child );
		
		$this->render ( 'reportsbychild', array (
				'dp' => $dp,
				'child' => $item,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Report ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Report'] ))
			$model->attributes = $_GET ['Report'];
		
		$this->render ( 'admin', array (
				'model' => $model,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
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
		$model = Report::model ()->findByPk ( $id );
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
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'report-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
