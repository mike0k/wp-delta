<?php

/**
 * This is the model class for table "db_appointments".
 *
 * The followings are the available columns in table 'db_appointments':
 * @property integer $id
 * @property integer $userId
 * @property string $userType
 * @property integer $agentId
 * @property string $agentType
 * @property integer $refId
 * @property string $refType
 * @property integer $time
 * @property string $type
 * @property string $notes
 * @property string $status
 * @property integer $cancelled
 * @property integer $rescheduleCount
 * @property integer $addedBy
 * @property integer $updated
 * @property integer $created
 */
class DbAppointments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'db_appointments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, agentId, refId, time, cancelled, rescheduleCount, addedBy, updated, created', 'numerical', 'integerOnly'=>true),
			array('userType, agentType, refType, type, status', 'length', 'max'=>255),
			array('notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userId, userType, agentId, agentType, refId, refType, time, type, notes, status, cancelled, rescheduleCount, addedBy, updated, created', 'safe', 'on'=>'search'),
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
			'userId' => 'User',
			'userType' => 'User Type',
			'agentId' => 'Agent',
			'agentType' => 'Agent Type',
			'refId' => 'Ref',
			'refType' => 'Ref Type',
			'time' => 'Time',
			'type' => 'Type',
			'notes' => 'Notes',
			'status' => 'Status',
			'cancelled' => 'Cancelled',
			'rescheduleCount' => 'Reschedule Count',
			'addedBy' => 'Added By',
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
		$criteria->compare('userId',$this->userId);
		$criteria->compare('userType',$this->userType,true);
		$criteria->compare('agentId',$this->agentId);
		$criteria->compare('agentType',$this->agentType,true);
		$criteria->compare('refId',$this->refId);
		$criteria->compare('refType',$this->refType,true);
		$criteria->compare('time',$this->time);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('cancelled',$this->cancelled);
		$criteria->compare('rescheduleCount',$this->rescheduleCount);
		$criteria->compare('addedBy',$this->addedBy);
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
	 * @return DbAppointments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
