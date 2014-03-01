<?php
class ChildrenController extends Controller {
	
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
	public function actionIndex($sponsor = null) {
		$sponsorized = false;
		if (yii::app ()->user->hasState ( "user" ) && yii::app ()->user->user->group->Code == 'sponsor') {
			$sponsor = yii::app ()->user->id;
		  $gallery_title = "Enfants à parrainer";
		}
		else {
		  $gallery_title = "Trombinoscope";
		}
		$criteria = new CDbCriteria ();
		if ($sponsor != '') {
			$criteria->addCondition ( 'Sponsor=' . $sponsor );
			$sponsorized = true;
		}
		
		$model = new Child ( 'search' );
		
		$dp = new CActiveDataProvider ( $model, array (
				'criteria' => $criteria 
		) );
		
		$this->render ( 'index', array (
        'gallery_title' => $gallery_title,
				'dp' => $dp,
				'sponsorized' => $sponsorized,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	public function actionGallery() {
		$model = new Child ( 'search' );
		$criteria = new CDbCriteria ();
		
		if (yii::app ()->user->hasState ( "user" ) && yii::app ()->user->user->group->Code == 'sponsor') {
			$criteria->addCondition ( 'Sponsor IS NULL' );
		  $gallery_title = "Enfants à parrainer";
		}
		else {
		  $gallery_title = "Trombinoscope";
		}
		
		
		$dp = new CActiveDataProvider ( $model, array (
				'criteria' => $criteria 
		) );
		$this->render ( 'gallery', array (
		    'gallery_title' => $gallery_title,
				'dataProvider' => $dp,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete' 
		); // we only allow deletion via POST request
	}
	public function accessRules() {
		return array (
				array (
						'allow', // allow all users to perform 'index' and
						         // 'view' actions
						'actions' => array (
								'index',
								'view',
								'gallery' 
						),
						'roles' => array (
								'sponsor',
								'staff',
								'admin' 
						) 
				),
				array (
						'allow', // allow authenticated user to perform 'create'
						         // and 'update' actions
						'actions' => array (
								'create',
								'update',
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
	public function actionView($id) {
		$criteria = new CDbCriteria ();
		// $criteria->alias = 'relationships';
		$criteria->join = 'LEFT JOIN relationships ON t.Id=relationships.Child';
		$criteria->condition = 't.Id = :id ';
		$criteria->params = array (
				':id' => $id 
		);
		
		$model = new Child ( 'search' );
		
		$dp = new CActiveDataProvider ( $model, array (
				'criteria' => $criteria 
		) );
		echo "salut";
		$this->render ( 'view', array (
				'dp' => $dp,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	public function actionCreate() {
		$model = new Child ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Child'] )) {
			$model->attributes = $_POST ['Child'];
			// Validate the model
			if ($model->validate ()) {
				// -------------------------------
				// Save the child
				// -------------------------------
				$model->save ();
				// -------------------------------
				// Upload the picture
				// -------------------------------
				// If there's a picture to upload
				if (CUploadedFile::getInstanceByName ( 'Picture' ) != null) {
					// Get the uploade file
					$file = CUploadedFile::getInstanceByName ( 'Picture' );
					$picture = new Media ();
					// Set the Staffboard id
					$picture->Child = $model->Id;
					// Set the title
					$picture->Title = $file->getName ();
					// Set the owner of the file
					$picture->Author = Yii::app ()->user->Id;
					$picture->File = $file;
					// Save the id of the child in the picture
					$picture->Child = $model->Id;
					$picture->save ();
				}
				// -------------------------------
				// Upload the file
				// -------------------------------
				// If there's a file to upload
				if (CUploadedFile::getInstanceByName ( 'File' ) != null) {
					// Get the uploade file
					$file = CUploadedFile::getInstanceByName ( 'File' );
					$media = new Media ();
					// Set the Staffboard id
					$media->Child = $model->Id;
					// Set the title
					$media->Title = $_POST ['filename'];
					// Set the owner of the file
					$media->Author = Yii::app ()->user->Id;
					$media->File = $file;
					$media->save ();
				}
				// -------------------------------
				// Update the child
				// -------------------------------
				if (CUploadedFile::getInstanceByName ( 'Picture' ) != null) {
						
					// Save the id of the picture in the child
					$model->Picture = $picture->Id;
					$model->save();
				}
				// -------------------------------
				// Redirect to the view
				// -------------------------------
				$this->redirect ( array (
						'view',
						'id' => $model->Id
				) );
			}
		}
		
		$this->render ( 'create', array (
				'model' => $model,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Child'] )) {
			$model->attributes = $_POST ['Child'];
			// Validate the model
			if ($model->validate ()) {
				// -------------------------------
				// Save the child
				// -------------------------------
				$model->save ();
				// -------------------------------
				// Upload the picture
				// -------------------------------
				// If there's a picture to upload
				if (CUploadedFile::getInstanceByName ( 'Picture' ) != null) {
					// Get the uploade file
					$file = CUploadedFile::getInstanceByName ( 'Picture' );
					$picture = new Media ();
					// Set the Staffboard id
					$picture->Child = $model->Id;
					// Set the title
					$picture->Title = $file->getName ();
					// Set the owner of the file
					$picture->Author = Yii::app ()->user->Id;
					$picture->File = $file;
					// Save the id of the child in the picture
					$picture->Child = $model->Id;
					$picture->save ();
				}
				// -------------------------------
				// Upload the file
				// -------------------------------
				// If there's a file to upload
				if (CUploadedFile::getInstanceByName ( 'File' ) != null) {
					// Get the uploade file
					$file = CUploadedFile::getInstanceByName ( 'File' );
					$media = new Media ();
					// Set the Staffboard id
					$media->Child = $model->Id;
					// Set the title
					$media->Title = $_POST ['filename'];
					// Set the owner of the file
					$media->Author = Yii::app ()->user->Id;
					$media->File = $file;
					$media->save ();
				}
				// -------------------------------
				// Update the child
				// -------------------------------
				if (CUploadedFile::getInstanceByName ( 'Picture' ) != null) {
					
					// Save the id of the picture in the child
					$model->Picture = $picture->Id;
					$model->save();
				}
				// -------------------------------
				// Redirect to the view
				// -------------------------------
				$this->redirect ( array (
						'view',
						'id' => $model->Id 
				) );
			}
		}
		
		$this->render ( 'update', array (
				'model' => $model,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
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
	public function actionAdmin() {
		$model = new Child ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Child'] ))
			$model->attributes = $_GET ['Child'];
		
		$this->render ( 'admin', array (
				'model' => $model,
				'isInTeam' => (isset ( Yii::app ()->user->user ) && Yii::app ()->user->user->IsInTeam ()) 
		) );
	}
	public function loadModel($id) {
		$model = Child::model ()->findByPk ( $id );
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
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'child-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}//END

