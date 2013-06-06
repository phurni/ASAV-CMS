<?php

/**
 * This is the model class for table "childmessages".
 *
 * The followings are the available columns in table 'childmessages':
 * @property integer $Id
 * @property integer $Author
 * @property integer $Child
 * @property string $DateCreated
 * @property string $Message
 * @property integer $IsForwarded
 *
 * The followings are the available model relations:
 * @property Children $child
 * @property Users $author
 * @property Media[] $medias
 */
class ChildMessage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChildMessage the static model class
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
		return 'childmessages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Child, DateCreated, Message, IsForwarded', 'required'),
			array('Author, Child, IsForwarded', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Author, Child, DateCreated, Message, IsForwarded', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'User', 'Author'),
			'medias' => array(self::HAS_MANY, 'Media', 'ChildMessage'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Author' => 'Author',
			'Child' => 'Child',
			'DateCreated' => 'Date Created',
			'Message' => 'Message',
			'IsForwarded' => 'Is Forwarded',
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
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('Message',$this->Message,true);
		$criteria->compare('IsForwarded',$this->IsForwarded);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}