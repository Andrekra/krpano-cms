<?php

/**
 * This is the model class for table "Projects".
 *
 * The followings are the available columns in table 'Projects':
 * @property integer $ProjectId
 * @property string $Name
 * @property string $Description
 * @property string $Keywords
 * @property integer $UserId
 * @property integer $ThemeId
 * @property integer $DefaultLocation
 */
class Projects extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Projects the static model class
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
        return 'Projects';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('UserId, ThemeId, DefaultLocation, krpano_autorotate_id, krpano_control_id, krpano_display_id, krpano_memory_id, krpano_network_id', 'numerical', 'integerOnly'=>true),
            array('Name', 'length', 'max'=>50),
            array('Description, Keywords', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ProjectId, Name, Description, Keywords, UserId, ThemeId, DefaultLocation, krpano_autorotate_id, krpano_control_id, krpano_display_id, krpano_memory_id, krpano_network_id', 'safe', 'on'=>'search'),
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
            'autorotate' => array(self::HAS_ONE, 'Autorotate', 'AutorotateId'),
            'control' => array(self::HAS_ONE, 'Control', 'ControlId'),
            'display' => array(self::HAS_ONE, 'Display', 'DisplayId'),
            'locations' => array(self::HAS_MANY, 'Locations', 'ProjectId'),
            'maps' => array(self::HAS_MANY, 'Maps', 'ProjectId'),
            'user' => array(self::BELONGS_TO, 'Users', 'UserId'),
            'defaultlocation' => array(self::BELONGS_TO, 'Locations', 'DefaultLocation'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ProjectId' => 'Project',
            'Name' => 'Name',
            'Description' => 'Description',
            'Keywords' => 'Keywords',
            'UserId' => 'User',
            'ThemeId' => 'Theme',
            'DefaultLocation' => 'Default Location',
            'krpano_autorotate_id' => 'Krpano Autorotate',
            'krpano_control_id' => 'Krpano Control',
            'krpano_display_id' => 'Krpano Display',
            'krpano_memory_id' => 'Krpano Memory',
            'krpano_network_id' => 'Krpano Network',
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

        $criteria->compare('ProjectId',$this->ProjectId);
        $criteria->compare('Name',$this->Name,true);
        $criteria->compare('Description',$this->Description,true);
        $criteria->compare('Keywords',$this->Keywords,true);
        $criteria->compare('UserId',$this->UserId);
        $criteria->compare('ThemeId',$this->ThemeId);
        $criteria->compare('DefaultLocation',$this->DefaultLocation);
        $criteria->compare('krpano_autorotate_id',$this->krpano_autorotate_id);
        $criteria->compare('krpano_control_id',$this->krpano_control_id);
        $criteria->compare('krpano_display_id',$this->krpano_display_id);
        $criteria->compare('krpano_memory_id',$this->krpano_memory_id);
        $criteria->compare('krpano_network_id',$this->krpano_network_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }
    public function from_user($id){
        $this->getDbCriteria()->mergeWith(array(
                 'condition'=>'t.UserId=:UserId',
                 'with'=>"user",
                 'params'=>array(':UserId'=>$id)
         ));
        return $this;
    }
    public function all_locations(){
        $this->getDbCriteria()->mergeWith(array(

                 'with'=>"maps"

         ));
        return $this;
    }
}