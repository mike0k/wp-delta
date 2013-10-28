<?php

/**
 * This is the model class for table "db_property_spec".
 *
 * The followings are the available columns in table 'db_property_spec':
 * @property integer $id
 * @property integer $propId
 * @property string $type
 * @property string $description
 * @property integer $bathrooms
 * @property integer $publicRooms
 * @property integer $bedrooms
 * @property string $heating
 * @property string $garage
 * @property string $garden
 * @property string $windows
 * @property string $parking
 * @property string $condition
 * @property string $constructor
 * @property string $homeReport
 * @property string $floorplan
 * @property string $schedule
 * @property integer $updated
 * @property integer $created
 */
class DbPropertySpec extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'db_property_spec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propId, bathrooms, publicRooms, bedrooms, updated, created', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>100),
			array('heating, garage, garden, windows, parking, condition, constructor, homeReport, floorplan, schedule', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, propId, type, description, bathrooms, publicRooms, bedrooms, heating, garage, garden, windows, parking, condition, constructor, homeReport, floorplan, schedule, updated, created', 'safe', 'on'=>'search'),
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
			'propId' => 'Prop',
			'type' => 'Type',
			'description' => 'Description',
			'bathrooms' => 'Bathrooms',
			'publicRooms' => 'Public Rooms',
			'bedrooms' => 'Bedrooms',
			'heating' => 'Heating',
			'garage' => 'Garage',
			'garden' => 'Garden',
			'windows' => 'Windows',
			'parking' => 'Parking',
			'condition' => 'Condition',
			'constructor' => 'Constructor',
			'homeReport' => 'Home Report',
			'floorplan' => 'Floorplan',
			'schedule' => 'Schedule',
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
		$criteria->compare('propId',$this->propId);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('bathrooms',$this->bathrooms);
		$criteria->compare('publicRooms',$this->publicRooms);
		$criteria->compare('bedrooms',$this->bedrooms);
		$criteria->compare('heating',$this->heating,true);
		$criteria->compare('garage',$this->garage,true);
		$criteria->compare('garden',$this->garden,true);
		$criteria->compare('windows',$this->windows,true);
		$criteria->compare('parking',$this->parking,true);
		$criteria->compare('condition',$this->condition,true);
		$criteria->compare('constructor',$this->constructor,true);
		$criteria->compare('homeReport',$this->homeReport,true);
		$criteria->compare('floorplan',$this->floorplan,true);
		$criteria->compare('schedule',$this->schedule,true);
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
	 * @return DbPropertySpec the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
