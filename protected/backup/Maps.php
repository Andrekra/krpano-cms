<?php

/**
 * This is the model class for table "Maps".
 *
 * The followings are the available columns in table 'Maps':
 * @property integer $MapId
 * @property integer $ProjectId
 * @property string $Path
 * @property string $Type
 */
class Maps extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Maps the static model class
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
		return 'Maps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectId', 'numerical', 'integerOnly'=>true),
			array('Path', 'length', 'max'=>150),
			array('Type', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MapId, ProjectId, Path, Type', 'safe', 'on'=>'search'),
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
           'projects'=>array(self::BELONGS_TO, 'Maps', 'ProjectId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'MapId' => 'Map',
			'ProjectId' => 'Project',
			'Path' => 'Path',
			'Type' => 'Type',
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

		$criteria->compare('MapId',$this->MapId);
		$criteria->compare('ProjectId',$this->ProjectId);
		$criteria->compare('Path',$this->Path,true);
		$criteria->compare('Type',$this->Type,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}