<?php

/**
 * This is the model class for table "db_message_board".
 *
 * The followings are the available columns in table 'db_message_board':
 * @property integer $id
 * @property integer $refId
 * @property string $refType
 * @property string $subject
 * @property string $message
 * @property integer $addedBy
 * @property integer $priority
 * @property integer $updated
 * @property integer $created
 */
class DbMessageBoard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'db_message_board';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refId, addedBy, priority, updated, created', 'numerical', 'integerOnly'=>true),
			array('refType, subject', 'length', 'max'=>255),
			array('message', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, refId, refType, subject, message, addedBy, priority, updated, created', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'refId' => 'Ref',
			'refType' => 'Ref Type',
			'subject' => 'Subject',
			'message' => 'Message',
			'addedBy' => 'Added By',
			'priority' => 'Priority',
			'updated' => 'Updated',
			'created' => 'Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('refId',$this->refId);
		$criteria->compare('refType',$this->refType,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('addedBy',$this->addedBy);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DbMessageBoard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
