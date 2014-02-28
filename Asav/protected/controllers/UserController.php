<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	
	
	private $currentUser;
	

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
				'actions'=>array('index','view','mailing','publipostage','create','update','delete'),
				'roles'=>array('staff','admin'),
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
		$model=new User();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if(trim($model->Password) != ""){
				$credentials = $model->encrypt($model->Password);
				$model->Password = $credentials["hash"];
				$model->Salt = $credentials["key"];
			}
			
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if(trim($model->Password) != ""){
				$credentials = $model->encrypt($model->Password);
				$model->Password = $credentials["hash"];
				$model->Salt = $credentials["key"];
			}else{
				$model->Password = $this->loadModel($id)->Password;
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}
		
		$model->Password = "";
		
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new User('search');
		$this->render('index',array(
				'model'=>$model,
		));
	}
	
	public function actionMailing()
	{
		$model=new User();
		$criteria=new CDbCriteria();
		
		
		/**
		 * Second step
		 * Write the mail to send
		 */
		if(!empty($_POST) && isset($_POST["step"]) && $_POST["step"] == "select"){
			$_SESSION["list"] = $_POST;
			foreach ($_POST as $id => $value){
				if($id != "step"){
					$criteria->addCondition('t.Id=' . $value, "OR");
				}
			}
			
			
			$tagList = array();
			$tagList["id"] = array("Id", "affiche l'ID de l'utilisateur");
			$tagList["pays"] = array("Country", "affiche le pays de l'utilisateur");
			$tagList["genre"] = array("Genre", "affiche le genre de l'utilisateur");
			$tagList["prénom"] = array("Firstname", "affiche le prénom de l'utilisateur");
			$tagList["nom"] = array("Lastname", "affiche le nom de famille de l'utilisateur");
			$tagList["adresse"] = array("Address", "affiche l'adresse de l'utilisateur");
			$tagList["NPA"] = array("ZipCode", "affiche le code postal de l'utilisateur");
			$tagList["ville"] = array("Town", "affiche la ville de l'utilisateur");
			$tagList["mail"] = array("Email", "affiche l'email de l'utilisateur");
			$tagList["pseudo"] = array("Username", "affiche le pseudo de l'utilisateur");
			
			
			
			$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
			$this->render('mailing',array(
					'dp'=>$dp,
					'tags'=>$tagList
			));
		/**
		 * Last step
		 * Send the mail
		 */
		}else if(!empty($_POST) && isset($_POST["step"]) && $_POST["step"] == "send"){
			foreach ($_SESSION["list"] as $id => $value){
				if($id != "step"){
					$criteria->addCondition('t.Id=' . $value, "OR");
				}
			}
			$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
			foreach($dp->getData() as $user){
				$this->currentUser = $user;
				$subject = preg_replace_callback('/\{(\w+)\}/', array($this, "textReplace"), $_POST["subject"]);
				$msg = preg_replace_callback('/\{(\w+)\}/', array($this, "textReplace"), $_POST["message"]);
				
				// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				
				mail($user->Email, $subject, $msg, $headers);
			}
			
			/**
			 * Clear the stored data and show the list of sponsors
			 */
			$_SESSION["list"] = null;
			$criteria=new CDbCriteria();
			$criteria->addCondition('t.Group=1');
			$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
			$this->render('sponsors',array(
					'dp'=>$dp,
					'action'=>'mailing',
					'sended'=>true
			));
			
		/**
		 * First step
		 * Select the sponsors to contact
		 */
		}else{
			$criteria->addCondition('t.Group=1');
			$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
			$this->render('sponsors',array(
					'dp'=>$dp,
					'action'=>'mailing'
			));
		}
	}
	
	private function textReplace($matches){
		$match = $matches[1];
		switch($match){
			case "Country":
				return $this->currentUser->country->Name;
				break;
			case "Genre":
				return $this->currentUser->genre->Name;
				break;
			default:
				return $this->currentUser->$match;
				break;
		}
	}
	
	
	public function actionPublipostage()
	{
		$model=new User();
		$criteria=new CDbCriteria();
		if(isset($_POST) && !empty($_POST)){
			foreach ($_POST as $id => $value){
				if($id != "step"){
					$criteria->addCondition('t.Id=' . $value, "OR");
				}
			}
			
			$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
			
			//Print the header line
			$out = "Nom;Prénom;Date de naissance;Adresse;NPA;Ville;Pays;Email" . PHP_EOL;
			
			foreach($dp->getData() as $data){
				
				$out .= $data->Firstname . ";"
					  . $data->Lastname . ";"
					  . $birthday . ";"
					  . $data->Address . ";"
					  . $data->ZipCode . ";"
					  . $data->Town . ";"
					  . $data->country->Name . ";"
					  . $data->Email . PHP_EOL;
			}
			
			//Add the BOM to the UTF-8 output
			$out = chr(239) . chr(187) . chr(191) . $out;
			
			//Send the export
			Yii::app()->getRequest()->sendFile("export.csv", $out, "text/csv", true);
			
			
		}else{
			$criteria->addCondition('t.Group=1');
			$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
			$this->render('sponsors',array(
					'dp'=>$dp,
					'action'=>'publipostage'
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
