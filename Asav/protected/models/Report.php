<?php

/**
 * This is the model class for table "reports".
 *
 * The followings are the available columns in table 'reports':
 * @property integer $Id
 * @property integer $Author
 * @property integer $Child
 * @property integer $Status
 * @property string $Type
 * @property string $CreationDate
 * @property string $UpdateDate
 * @property string $VisitDate
 * @property string $ActionsNutricient
 * @property string $ActionsSchcool
 * @property string $ActionsOther
 * @property string $NoteNutricient
 * @property string $NoteSchool
 * @property string $NoteOther
 * 
 *
 * The followings are the available model relations:
 * @property Reportstatus $status
 * @property Reporttypes $type
 * @property Children $child
 * @property Users $author
 */
class Report extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Report the static model class
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
		return 'reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Child, Status, CreationDate,VisitDate, NoteNutricient, NoteSchool', 'required'),
			array('Author, Child, Status,Type', 'numerical', 'integerOnly'=>true),
			array('ActionsNutricient, ActionsSchcool, ActionsOther, NoteOther', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Author, Child, Status, Type, CreationDate , UpdateDate,VisitDate, ActionsNutricient, ActionsSchcool, ActionsOther, NoteNutricient, NoteSchool, NoteOther', 'safe', 'on'=>'search'),
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
			'status' => array(self::BELONGS_TO, 'Reportstatus', 'Status'),
			'child' => array(self::BELONGS_TO, 'Child', 'Child'),
			'author' => array(self::BELONGS_TO, 'User', 'Author'),
			'type' => array(self::BELONGS_TO,'Reporttypes', 'Type'),
			'medias' => array(self::HAS_MANY, 'Media', 'Report')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Author' => 'Auteur',
			'Child' => 'Enfant',
			'Status' => 'Status',
			'Type' => 'Type',			
			'CreationDate' => 'Date de création',
			'UpdateDate' => 'Date de modification',
			'VisitDate' => 'Date de visite',
			'ActionsNutricient' => 'Actions nutritions',
			'ActionsSchcool' => 'Actions école',
			'ActionsOther' => 'Actions divers',
			'NoteNutricient' => 'Notes nutritions',
			'NoteSchool' => 'Notes école',
			'NoteOther' => 'Notes divers',
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
		$criteria->compare('Author',$this->Author);
		$criteria->compare('Child',$this->Child);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Type',$this->Type);
		$criteria->compare('CreationDate',$this->CreationDate,true);
		$criteria->compare('UpdateDate',$this->UpdateDate,true);
		$criteria->compare('VisitDate',$this->VisitDate,true);
		$criteria->compare('ActionsNutricient',$this->ActionsNutricient,true);
		$criteria->compare('ActionsSchcool',$this->ActionsSchcool,true);
		$criteria->compare('ActionsOther',$this->ActionsOther,true);
		$criteria->compare('NoteNutricient',$this->NoteNutricient,true);
		$criteria->compare('NoteSchool',$this->NoteSchool,true);
		$criteria->compare('NoteOther',$this->NoteOther,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				
		));
	}
}