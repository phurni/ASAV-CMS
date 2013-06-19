<?php

/**
 * This is the model class for table "relationships".
 *
 * The followings are the available columns in table 'relationships':
 * @property integer $Child
 * @property integer $Person
 * @property integer $RelationType
 * @property integer $IsHosted
 * @property integer $IsTutor
 *
 * The followings are the available model relations:
 * @property Children $child
 * @property People $person
 * @property Relationtypes $relationType
 */
class Relationship extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Relationship the static model class
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
		return 'relationships';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Child, Person, RelationType, IsHosted, IsTutor', 'required'),
			array('Child, Person, RelationType, IsHosted, IsTutor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Child, Person, RelationType, IsHosted, IsTutor', 'safe', 'on'=>'search'),
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
			'child' => array(self::BELONGS_TO, 'Child', 'Child'),
			'person' => array(self::BELONGS_TO, 'Person', 'Person'),
			'relationType' => array(self::BELONGS_TO, 'RelationType', 'RelationType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Child' => 'Child',
			'Person' => 'Person',
			'RelationType' => 'Relation Type',
			'IsHosted' => 'Is Hosted',
			'IsTutor' => 'Is Tutor',
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

		$criteria->compare('Child',$this->Child);
		$criteria->compare('Person',$this->Person);
		$criteria->compare('RelationType',$this->RelationType);
		$criteria->compare('IsHosted',$this->IsHosted);
		$criteria->compare('IsTutor',$this->IsTutor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}