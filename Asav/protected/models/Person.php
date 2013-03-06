<?php

/**
 * This is the model class for table "people".
 *
 * The followings are the available columns in table 'people':
 * @property integer $Id
 * @property integer $Country
 * @property integer $Genre
 * @property string $Firstname
 * @property string $Lastname
 * @property string $Address
 *
 * The followings are the available model relations:
 * @property Countries $country
 * @property Genres $genre
 * @property Relationships[] $relationships
 */
class Person extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
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
		return 'people';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Country, Genre, Firstname, Lastname, Address', 'required'),
			array('Country, Genre', 'numerical', 'integerOnly'=>true),
			array('Firstname, Lastname', 'length', 'max'=>100),
			array('Address', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Country, Genre, Firstname, Lastname, Address', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'Country', 'Country'),
			'genre' => array(self::BELONGS_TO, 'Genre', 'Genre'),
			'relationships' => array(self::HAS_MANY, 'Relationships', 'Person'),
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
			'Address' => 'Address',
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
		
		$sort = new CSort();
		$sort->attributes = array(
			'genre'=>array(
				'asc'=>'genre.Name ASC',
				'desc'=>'genre.Name DESC',
			),
			'country'=>array(
				'asc'=>'country.Name ASC',
				'desc'=>'country.Name DESC',
			),
			'*',
		);
		
		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Country.Name',$this->Country);
		$criteria->compare('genre.Name',$this->genre); 
		$criteria->compare('Firstname',$this->Firstname,true);
		$criteria->compare('Lastname',$this->Lastname,true);
		$criteria->compare('Address',$this->Address,true);
		
		$criteria->with = array('genre', 'country');

		return new CActiveDataProvider($this, array(
	        'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 25,
			),
			'sort'=>$sort,
	));
	}
}