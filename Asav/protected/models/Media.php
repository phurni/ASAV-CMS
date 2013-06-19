<?php

/**
 * This is the model class for table "media".
 *
 * The followings are the available columns in table 'media':
 * @property integer $Id
 * @property integer $Author
 * @property integer $Child
 * @property integer $ChildMessage
 * @property integer $StaffBoard
 * @property string $Path
 * @property string $Title
 * @property string $Description
 * @property string $Created
 * @property string $Modified
 *
 * The followings are the available model relations:
 * @property Users $author
 * @property Children $child
 * @property Childmessages $childMessage
 * @property Staffboard $staffBoard
 */
class Media extends CActiveRecord {
	public $File;
	
	/**
	 * Returns the static model of the specified AR class.
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return Media the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'media';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'Path, Title, Created',
						'required' 
				),
				array (
						'Author, Child, ChildMessage, StaffBoard',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'Title',
						'length',
						'max' => 100 
				),
				array (
						'Description, Modified',
						'safe' 
				),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array (
						'Id, Author, Child, ChildMessage, StaffBoard, Path, Title, Description, Created, Modified',
						'safe',
						'on' => 'search' 
				),
				array (
						'File',
						'file',
						'types' => 'jpg, gif, png, sql, java' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'author' => array (
						self::BELONGS_TO,
						'User',
						'Author' 
				),
				'child' => array (
						self::BELONGS_TO,
						'Child',
						'Child' 
				),
				'childMessage' => array (
						self::BELONGS_TO,
						'ChildMessage',
						'ChildMessage' 
				),
				'report' => array (
						self::BELONGS_TO,
						'Report',
						'Report'
				),
				'staffBoard' => array (
						self::BELONGS_TO,
						'Staffboard',
						'StaffBoard' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'Id' => 'ID',
				'Author' => 'Auteur',
				'Child' => 'Enfant',
				'ChildMessage' => 'ChildMessage',
				'StaffBoard' => 'Staff Board',
				'Path' => 'Fichier à charger',
				'Title' => 'Titre',
				'Description' => 'Description',
				'Created' => 'Créé',
				'Modified' => 'Modifié',
				'UploadedFile' => 'Chargé' 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * 
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'Id', $this->Id );
		$criteria->compare ( 'Author', $this->Author );
		$criteria->compare ( 'Child', $this->Child );
		$criteria->compare ( 'ChildMessage', $this->ChildMessage );
		$criteria->compare ( 'StaffBoard', $this->StaffBoard );
		$criteria->compare ( 'Path', $this->Path, true );
		$criteria->compare ( 'Title', $this->Title, true );
		$criteria->compare ( 'Description', $this->Description, true );
		$criteria->compare ( 'Created', $this->Created, true );
		$criteria->compare ( 'Modified', $this->Modified, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * The method is executed before the validation.
	 * It uploads the file stored in the member var 'File'.
	 *
	 * @see CModel::beforeValidate()
	 */
	protected function beforeValidate() {
		
		// Get the uploade file
		if (isset ( $this->File )) {
			// Create the path of the file
			$folderName = $this->generateRandomName ();
			$path = Yii::app ()->params ['custom'] ['uploadPath'] . $folderName;
			mkdir ( $path );
			// Save the file
			$this->File->saveAs ( $path . '/' . $this->File->name );
			$this->Path = $folderName . '/' . $this->File->name;
		}
		
		return parent::beforeValidate ();
	}
	
	/**
	 * The method is executed before a deletion.
	 * It removes the file from the file system.
	 */
	public function beforeDelete() {
		$file = Yii::app ()->params ['custom'] ['uploadPath'] . $this->Path;
		// Check if the file exists
		if (file_exists ( $file )) {
			// Remove the file from the file system
			unlink ($file);
			// Remove the folder from the file system
			rmdir(str_replace(pathinfo($file, PATHINFO_FILENAME) .'.'. pathinfo($file, PATHINFO_EXTENSION), '', $file));
		}
	}
	
	/**
	 * Generates a random name for files.
	 */
	public function generateRandomName() {
		// Declare variables
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// Set the start of the random string with the timestamp
		$randomString = time () . '_';
		// Add 4 random digits
		for($i = 0; $i < 4; $i ++) {
			$randomString .= $characters [rand ( 0, strlen ( $characters ) - 1 )];
		}
		// Return the string
		return $randomString;
	}
}