<?php

/**
 * This is the model class for table "Hotspots".
 *
 * The followings are the available columns in table 'Hotspots':
 * @property integer $HotspotId
 * @property integer $LocationId
 * @property string $Name
 * @property string $Alturl
 * @property string $Keep
 * @property string $Devices
 * @property string $Visible
 * @property string $Enabled
 * @property string $Scale9grid
 * @property integer $Zorder
 * @property string $Capture
 * @property string $Children
 * @property string $Preload
 * @property string $Blendmode
 * @property string $Edge
 * @property string $Ox
 * @property string $Oy
 * @property string $Zoom
 * @property string $Distorted
 * @property double $Rx
 * @property double $Ry
 * @property double $Rz
 * @property string $Inverserotation
 * @property double $Flying
 * @property string $Width
 * @property string $Height
 * @property double $Scale
 * @property double $Altscale
 * @property double $Rotate
 * @property string $Smoothing
 * @property string $Accuracy
 * @property double $Alpha
 * @property string $Usecontentsize
 * @property string $Type
 * @property string $Meta
 * @property string $Url
 * @property double $Ath
 * @property double $Atv
 * @property string $Onover
 * @property string $Onout
 * @property string $Onclick
 * @property string $Crop
 * @property string $Onovercrop
 * @property string $Ondowncrop
 * @property string $Scalechildren
 * @property string $Mask
 * @property string $Effect
 * @property string $Onhover
 * @property string $Ondown
 * @property string $Onup
 * @property string $Onloaded
 * @property string $Altonloaded
 * @property string $Handcursor
 * @property string $Style
 * @property string $Effects
 */
class Hotspots extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hotspots the static model class
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
		return 'Hotspots';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LocationId, Zorder', 'numerical', 'integerOnly'=>true),
			array('Rx, Ry, Rz, Flying, Scale, Altscale, Rotate, Alpha, Ath, Atv', 'numerical'),
			array('Name, Width, Height', 'length', 'max'=>50),
			array('Alturl, Devices, Scale9grid, Ox, Oy, Url, Onover, Onout, Onclick, Crop, Onovercrop, Ondowncrop, Mask, Effect, Onhover, Ondown, Onup, Onloaded, Altonloaded, Style', 'length', 'max'=>200),
			array('Keep, Visible, Enabled, Capture, Children, Preload, Blendmode, Edge, Zoom, Distorted, Inverserotation, Smoothing, Accuracy, Usecontentsize, Type, Meta, Scalechildren, Handcursor, Effects', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('HotspotId, LocationId, Name, Alturl, Keep, Devices, Visible, Enabled, Scale9grid, Zorder, Capture, Children, Preload, Blendmode, Edge, Ox, Oy, Zoom, Distorted, Rx, Ry, Rz, Inverserotation, Flying, Width, Height, Scale, Altscale, Rotate, Smoothing, Accuracy, Alpha, Usecontentsize, Type, Meta, Url, Ath, Atv, Onover, Onout, Onclick, Crop, Onovercrop, Ondowncrop, Scalechildren, Mask, Effect, Onhover, Ondown, Onup, Onloaded, Altonloaded, Handcursor, Style, Effects', 'safe', 'on'=>'search'),
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
             'location' => array(self::BELONGS_TO, 'Locations', 'LocationId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'HotspotId' => 'Hotspot',
			'LocationId' => 'Location',
			'Name' => 'Name',
			'Alturl' => 'Alturl',
			'Keep' => 'Keep',
			'Devices' => 'Devices',
			'Visible' => 'Visible',
			'Enabled' => 'Enabled',
			'Scale9grid' => 'Scale9grid',
			'Zorder' => 'Zorder',
			'Capture' => 'Capture',
			'Children' => 'Children',
			'Preload' => 'Preload',
			'Blendmode' => 'Blendmode',
			'Edge' => 'Edge',
			'Ox' => 'Ox',
			'Oy' => 'Oy',
			'Zoom' => 'Zoom',
			'Distorted' => 'Distorted',
			'Rx' => 'Rx',
			'Ry' => 'Ry',
			'Rz' => 'Rz',
			'Inverserotation' => 'Inverserotation',
			'Flying' => 'Flying',
			'Width' => 'Width',
			'Height' => 'Height',
			'Scale' => 'Scale',
			'Altscale' => 'Altscale',
			'Rotate' => 'Rotate',
			'Smoothing' => 'Smoothing',
			'Accuracy' => 'Accuracy',
			'Alpha' => 'Alpha',
			'Usecontentsize' => 'Usecontentsize',
			'Type' => 'Type',
			'Meta' => 'Meta',
			'Url' => 'Url',
			'Ath' => 'Ath',
			'Atv' => 'Atv',
			'Onover' => 'Onover',
			'Onout' => 'Onout',
			'Onclick' => 'Onclick',
			'Crop' => 'Crop',
			'Onovercrop' => 'Onovercrop',
			'Ondowncrop' => 'Ondowncrop',
			'Scalechildren' => 'Scalechildren',
			'Mask' => 'Mask',
			'Effect' => 'Effect',
			'Onhover' => 'Onhover',
			'Ondown' => 'Ondown',
			'Onup' => 'Onup',
			'Onloaded' => 'Onloaded',
			'Altonloaded' => 'Altonloaded',
			'Handcursor' => 'Handcursor',
			'Style' => 'Style',
			'Effects' => 'Effects',
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

		$criteria->compare('HotspotId',$this->HotspotId);
		$criteria->compare('LocationId',$this->LocationId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Alturl',$this->Alturl,true);
		$criteria->compare('Keep',$this->Keep,true);
		$criteria->compare('Devices',$this->Devices,true);
		$criteria->compare('Visible',$this->Visible,true);
		$criteria->compare('Enabled',$this->Enabled,true);
		$criteria->compare('Scale9grid',$this->Scale9grid,true);
		$criteria->compare('Zorder',$this->Zorder);
		$criteria->compare('Capture',$this->Capture,true);
		$criteria->compare('Children',$this->Children,true);
		$criteria->compare('Preload',$this->Preload,true);
		$criteria->compare('Blendmode',$this->Blendmode,true);
		$criteria->compare('Edge',$this->Edge,true);
		$criteria->compare('Ox',$this->Ox,true);
		$criteria->compare('Oy',$this->Oy,true);
		$criteria->compare('Zoom',$this->Zoom,true);
		$criteria->compare('Distorted',$this->Distorted,true);
		$criteria->compare('Rx',$this->Rx);
		$criteria->compare('Ry',$this->Ry);
		$criteria->compare('Rz',$this->Rz);
		$criteria->compare('Inverserotation',$this->Inverserotation,true);
		$criteria->compare('Flying',$this->Flying);
		$criteria->compare('Width',$this->Width,true);
		$criteria->compare('Height',$this->Height,true);
		$criteria->compare('Scale',$this->Scale);
		$criteria->compare('Altscale',$this->Altscale);
		$criteria->compare('Rotate',$this->Rotate);
		$criteria->compare('Smoothing',$this->Smoothing,true);
		$criteria->compare('Accuracy',$this->Accuracy,true);
		$criteria->compare('Alpha',$this->Alpha);
		$criteria->compare('Usecontentsize',$this->Usecontentsize,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Meta',$this->Meta,true);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('Ath',$this->Ath);
		$criteria->compare('Atv',$this->Atv);
		$criteria->compare('Onover',$this->Onover,true);
		$criteria->compare('Onout',$this->Onout,true);
		$criteria->compare('Onclick',$this->Onclick,true);
		$criteria->compare('Crop',$this->Crop,true);
		$criteria->compare('Onovercrop',$this->Onovercrop,true);
		$criteria->compare('Ondowncrop',$this->Ondowncrop,true);
		$criteria->compare('Scalechildren',$this->Scalechildren,true);
		$criteria->compare('Mask',$this->Mask,true);
		$criteria->compare('Effect',$this->Effect,true);
		$criteria->compare('Onhover',$this->Onhover,true);
		$criteria->compare('Ondown',$this->Ondown,true);
		$criteria->compare('Onup',$this->Onup,true);
		$criteria->compare('Onloaded',$this->Onloaded,true);
		$criteria->compare('Altonloaded',$this->Altonloaded,true);
		$criteria->compare('Handcursor',$this->Handcursor,true);
		$criteria->compare('Style',$this->Style,true);
		$criteria->compare('Effects',$this->Effects,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}