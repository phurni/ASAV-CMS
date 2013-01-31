<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $Id
 * @property integer $Country
 * @property integer $Genre
 * @property string $Firstname
 * @property string $Lastname
 * @property string $Birthday
 * @property string $Address
 * @property integer $ZipCode
 * @property string $Town
 * @property string $Email
 * @property string $Username
 * @property string $Password
 * @property string $Salt
 *
 * The followings are the available model relations:
 * @property Children[] $childrens
 * @property Media[] $medias
 * @property Reports[] $reports
 * @property Countries $country
 * @property Genres $genre
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Country, Genre, Firstname, Lastname, Birthday, Address, Username, Password, Salt', 'required'),
			array('Country, Genre, ZipCode', 'numerical', 'integerOnly'=>true),
			array('Firstname, Lastname, Email', 'length', 'max'=>100),
			array('Address', 'length', 'max'=>255),
			array('Town', 'length', 'max'=>60),
			array('Username', 'length', 'max'=>50),
			array('Password', 'length', 'max'=>40),
			array('Salt', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Country, Genre, Firstname, Lastname, Birthday, Address, ZipCode, Town, Email, Username, Password, Salt', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'children' => array(self::HAS_MANY, 'Children', 'Sponsor'),
			'media' => array(self::HAS_MANY, 'Media', 'Author'),
			'reports' => array(self::HAS_MANY, 'Reports', 'Author'),
			'country' => array(self::BELONGS_TO, 'Countries', 'Country'),
			'genre' => array(self::BELONGS_TO, 'Genres', 'Genre'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Country' => 'Country',
			'Genre' => 'Genre',
			'Firstname' => 'Firstname',
			'Lastname' => 'Lastname',
			'Birthday' => 'Birthday',
			'Address' => 'Address',
			'ZipCode' => 'Zip Code',
			'Town' => 'Town',
			'Email' => 'Email',
			'Username' => 'Username',
			'Password' => 'Password',
			'Salt' => 'Salt',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Country',$this->Country);
		$criteria->compare('Genre',$this->Genre);
		$criteria->compare('Firstname',$this->Firstname,true);
		$criteria->compare('Lastname',$this->Lastname,true);
		$criteria->compare('Birthday',$this->Birthday,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('ZipCode',$this->ZipCode);
		$criteria->compare('Town',$this->Town,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Salt',$this->Salt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}