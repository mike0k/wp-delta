<?php

/**
 * This is the model class for table "db_buyers".
 *
 * The followings are the available columns in table 'db_buyers':
 * @property integer $id
 * @property integer $userId
 * @property integer $priceMin
 * @property integer $priceMax
 * @property string $areas
 * @property string $towns
 * @property string $regions
 * @property string $locations
 * @property string $propertyTypes
 * @property integer $bedrooms
 * @property integer $bathrooms
 * @property integer $publicRooms
 * @property string $heating
 * @property string $garden
 * @property string $windows
 * @property string $parking
 * @property string $garage
 * @property string $status
 * @property string $notes
 * @property string $buyReason
 * @property integer $updated
 * @property integer $created
 */
class DbBuyers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'db_buyers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, priceMin, priceMax, bedrooms, bathrooms, publicRooms, updated, created', 'numerical', 'integerOnly'=>true),
			array('heating, garden, windows, parking, garage, status', 'length', 'max'=>255),
			array('areas, towns, regions, locations, propertyTypes, notes, buyReason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userId, priceMin, priceMax, areas, towns, regions, locations, propertyTypes, bedrooms, bathrooms, publicRooms, heating, garden, windows, parking, garage, status, notes, buyReason, updated, created', 'safe', 'on'=>'search'),
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
			'priceMin' => 'Price Min',
			'priceMax' => 'Price Max',
			'areas' => 'Areas',
			'towns' => 'Towns',
			'regions' => 'Regions',
			'locations' => 'Locations',
			'propertyTypes' => 'Property Types',
			'bedrooms' => 'Bedrooms',
			'bathrooms' => 'Bathrooms',
			'publicRooms' => 'Public Rooms',
			'heating' => 'Heating',
			'garden' => 'Garden',
			'windows' => 'Windows',
			'parking' => 'Parking',
			'garage' => 'Garage',
			'status' => 'Status',
			'notes' => 'Notes',
			'buyReason' => 'Buy Reason',
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
		$criteria->compare('priceMin',$this->priceMin);
		$criteria->compare('priceMax',$this->priceMax);
		$criteria->compare('areas',$this->areas,true);
		$criteria->compare('towns',$this->towns,true);
		$criteria->compare('regions',$this->regions,true);
		$criteria->compare('locations',$this->locations,true);
		$criteria->compare('propertyTypes',$this->propertyTypes,true);
		$criteria->compare('bedrooms',$this->bedrooms);
		$criteria->compare('bathrooms',$this->bathrooms);
		$criteria->compare('publicRooms',$this->publicRooms);
		$criteria->compare('heating',$this->heating,true);
		$criteria->compare('garden',$this->garden,true);
		$criteria->compare('windows',$this->windows,true);
		$criteria->compare('parking',$this->parking,true);
		$criteria->compare('garage',$this->garage,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('buyReason',$this->buyReason,true);
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
	 * @return DbBuyers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
