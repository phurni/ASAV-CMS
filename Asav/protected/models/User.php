<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $Id
 * @property integer $Country
 * @property integer $Genre
 * @property integer $Group
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
 * @property Childmessages[] $childmessages
 * @property Children[] $childrens
 * @property Media[] $medias
 * @property Reports[] $reports
 * @property Staffboard[] $staffboards
 * @property Countries $country
 * @property Genres $genre
 * @property Groups $group
 */
class User extends CActiveRecord
{
	
	public function getFullname(){
		return $this->Firstname . " " . $this->Lastname;
	}
	
	
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
			array('Country, Genre, Group, Firstname, Lastname, Birthday, Address, Username, Password, Salt', 'required'),
			array('Country, Genre, Group, ZipCode', 'numerical', 'integerOnly'=>true),
			array('Firstname, Lastname, Email', 'length', 'max'=>100),
			array('Address', 'length', 'max'=>255),
			array('Town', 'length', 'max'=>60),
			array('Username', 'length', 'max'=>50),
			array('Password', 'length', 'max'=>44),
			array('Salt', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Country, Genre, Group, Firstname, Lastname, Birthday, Address, ZipCode, Town, Email, Username, Password, Salt', 'safe', 'on'=>'search'),
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
			'childmessages' => array(self::HAS_MANY, 'Childmessages', 'Author'),
			'childrens' => array(self::HAS_MANY, 'Children', 'Sponsor'),
			'medias' => array(self::HAS_MANY, 'Media', 'Author'),
			'reports' => array(self::HAS_MANY, 'Reports', 'Author'),
			'staffboards' => array(self::HAS_MANY, 'Staffboard', 'Author'),
			'country' => array(self::BELONGS_TO, 'Country', 'Country'),
			'genre' => array(self::BELONGS_TO, 'Genre', 'Genre'),
			'group' => array(self::BELONGS_TO, 'Group', 'Group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Country' => 'Pays',
			'Genre' => 'Genre',
			'Group' => 'Groupe',
			'Firstname' => 'Prénom',
			'Lastname' => 'Nom',
			'Birthday' => 'Date de naissance',
			'Address' => 'Adresse',
			'ZipCode' => 'Zip Code',
			'Town' => 'Ville',
			'Email' => 'Email',
			'Username' => "Nom d'utilisateur",
			'Password' => 'Mot de passe',
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
		$criteria->compare('Group',$this->Group);
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
		
		$criteria->with = array('genre', 'country');

		
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	public function sponsor()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('Id',$this->Id);
		$criteria->compare('Country',$this->Country);
		$criteria->compare('Genre',$this->Genre);
		$criteria->compare('Group',$this->Group);
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
	
		$criteria->with = array('genre', 'country');
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	/**
	 * Gets if the user is an administrator.
	 */
	public function IsAdmin()
	{
		return $this->group->Id == 3;
	}
	
	/**
	 * Gets if the user is the team.
	 */
	public function IsInTeam()
	{
		return $this->IsAdmin() || $this->IsStaff();
	}
	
	/**
	 * Gets if the user is a sponsor.
	 */
	public function IsSponsor()
	{
		return $this->group->Id == 1;
	}
	
	/**
	 * Gets if the user is in the staff.
	 */
	public function IsStaff()
	{
		return $this->group->Id == 2;
	}
	
	
	/**
	 * 
	 * Encrypt the given data and return an array with the encrypted data and the salt
	 */
	public function encrypt($value, $key = null){
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, "cbc");
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		if(!$key){
			$key = md5(time());
		}
		$chain = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $value, MCRYPT_MODE_CBC, md5(md5($key))));
		
		return array("key" => $key, "hash" => sha1($chain, true));
	}
}