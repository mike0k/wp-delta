<?php

/**
 * This is the model class for table "db_property_finance".
 *
 * The followings are the available columns in table 'db_property_finance':
 * @property integer $id
 * @property integer $propId
 * @property integer $price
 * @property string $priceType
 * @property integer $homeReport
 * @property integer $valuation
 * @property integer $min
 * @property integer $want
 * @property string $saleType
 * @property string $surveyor
 * @property integer $surveyDate
 * @property integer $sellBy
 * @property string $previousAgent
 * @property string $previousAgentLength
 * @property integer $previousAgentPrice
 * @property string $previousAgentState
 * @property string $sellingReason
 * @property integer $updated
 * @property integer $created
 */
class DbPropertyFinance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'db_property_finance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propId, price, homeReport, valuation, min, want, surveyDate, sellBy, previousAgentPrice, updated, created', 'numerical', 'integerOnly'=>true),
			array('priceType, saleType, surveyor, previousAgent, previousAgentLength, previousAgentState, sellingReason', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, propId, price, priceType, homeReport, valuation, min, want, saleType, surveyor, surveyDate, sellBy, previousAgent, previousAgentLength, previousAgentPrice, previousAgentState, sellingReason, updated, created', 'safe', 'on'=>'search'),
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
			'price' => 'Price',
			'priceType' => 'Price Type',
			'homeReport' => 'Home Report',
			'valuation' => 'Valuation',
			'min' => 'Min',
			'want' => 'Want',
			'saleType' => 'Sale Type',
			'surveyor' => 'Surveyor',
			'surveyDate' => 'Survey Date',
			'sellBy' => 'Sell By',
			'previousAgent' => 'Previous Agent',
			'previousAgentLength' => 'Previous Agent Length',
			'previousAgentPrice' => 'Previous Agent Price',
			'previousAgentState' => 'Previous Agent State',
			'sellingReason' => 'Selling Reason',
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
		$criteria->compare('price',$this->price);
		$criteria->compare('priceType',$this->priceType,true);
		$criteria->compare('homeReport',$this->homeReport);
		$criteria->compare('valuation',$this->valuation);
		$criteria->compare('min',$this->min);
		$criteria->compare('want',$this->want);
		$criteria->compare('saleType',$this->saleType,true);
		$criteria->compare('surveyor',$this->surveyor,true);
		$criteria->compare('surveyDate',$this->surveyDate);
		$criteria->compare('sellBy',$this->sellBy);
		$criteria->compare('previousAgent',$this->previousAgent,true);
		$criteria->compare('previousAgentLength',$this->previousAgentLength,true);
		$criteria->compare('previousAgentPrice',$this->previousAgentPrice);
		$criteria->compare('previousAgentState',$this->previousAgentState,true);
		$criteria->compare('sellingReason',$this->sellingReason,true);
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
	 * @return DbPropertyFinance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
