<?php

/**
 * This is the model class for table "Locations".
 *
 * The followings are the available columns in table 'Locations':
 * @property integer $LocationId
 * @property string $Name
 * @property integer $ProjectId
 * @property string $Thumbnail
 * @property integer $krpano_image_id
 * @property integer $krpano_preview_id
 * @property integer $krpano_view_id
 *
 * The followings are the available model relations:
 * @property Hotspots[] $hotspots
 * @property Image $image
 * @property Projects $project
 * @property Preview $preview
 * @property View $view
 */
class Locations extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Locations the static model class
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
		return 'Locations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProjectId, krpano_image_id, krpano_preview_id, krpano_view_id', 'numerical', 'integerOnly'=>true),
			array('Thumbnail', 'length', 'max'=>100),
			array('Name', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LocationId, Name, ProjectId, Thumbnail, krpano_image_id, krpano_preview_id, krpano_view_id', 'safe', 'on'=>'search'),
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
			'hotspots' => array(self::HAS_MANY, 'Hotspots', 'LocationId'),
			'image' => array(self::HAS_ONE, 'Image', 'ImageId'),
			'project' => array(self::BELONGS_TO, 'Projects', 'ProjectId'),
			'preview' => array(self::HAS_ONE, 'Preview', 'PreviewId'),
			'view' => array(self::HAS_ONE, 'View', 'ViewId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LocationId' => 'Location',
			'Name' => 'Name',
			'ProjectId' => 'Project',
			'Thumbnail' => 'Thumbnail',
			'krpano_image_id' => 'Krpano Image',
			'krpano_preview_id' => 'Krpano Preview',
			'krpano_view_id' => 'Krpano View',
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

		$criteria->compare('LocationId',$this->LocationId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('ProjectId',$this->ProjectId);
		$criteria->compare('Thumbnail',$this->Thumbnail,true);
		$criteria->compare('krpano_image_id',$this->krpano_image_id);
		$criteria->compare('krpano_preview_id',$this->krpano_preview_id);
		$criteria->compare('krpano_view_id',$this->krpano_view_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}